<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\BackupHelper;
use App\Models\Wrapper;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Common auth middleware for all routes
     *
     * @param array - which contains names of the functions in the controller
    */
    public function __construct()
    {
        $this->model = new Wrapper();
    }
    
    /**
     * Create json for jquery datatable structure
     * 
     * @param array|object $data
     * @param array $headers
     * @param string $returnType
     * @return unknown|number[]|array[]|unknown[][]
     */
    public function getDataTableStructure( $data, array $headers, $returnType = 'json' ) {
        if(!empty($data)){
            $data = json_decode( json_encode( $data, JSON_INVALID_UTF8_SUBSTITUTE ), true );
        }else {
            $data = array();
        }
        
        foreach( $headers as $key => $header ) {
            $columns[] = array( "data" => $key, "title" => $header );
        }
        
        $structure = array( "data" => $data, "columns" => $columns);
        
        if(empty($data)){
            $structure["recordsTotal"]  =   0;
        }
        
        if($returnType == 'json'){
            return json_encode( $structure );
        }else{
            return $structure;
        }
    }
    
    /**
     * Generic Method to build the list of values for dropdowns
     * 
     * @param array $options
     * @param unknown $displayColumn
     * @param unknown $valueColumn
     * @param unknown $currentValue
     * @param unknown $defaultOption
     * @return string
     */
    public function constructSelectOption(array $options, $displayColumn, $valueColumn, $currentValue, $defaultOption)
    {
        $htmlOptions = "";
        $optionCount = count($options);
        
        $htmlOptions = ($defaultOption == "" ? "" : "<option value=''>{$defaultOption}</option>\n");
        $selected = "";
        
        foreach ($options as $optionRow) {
            $displayVal = $optionRow[$displayColumn];
            $valueVal = $optionRow[$valueColumn];
            
            $selected = ($valueVal == $currentValue ? "Selected" : "");
            
            $htmlOptions = $htmlOptions . "<option value='{$valueVal}' {$selected}> {$displayVal}</option>\n";
        }
        
        return $htmlOptions;
    }

    public function convertObjectToArray($object, $index, $value, $custElem = array())
    {
        $array       =     [];
        $i           =     0;
        $values      =     explode(",", $value);
        foreach($object as $obj){
            $currIndex          =       ($index && isset($obj->$index)) ? $obj->$index : $i;
            $text               =       "";
            foreach($values as $vInd => $col){
                $text          .=       $obj->$col;
                if(count($values) > ($vInd + 1)){
                    $text      .=       " - ";
                }
            }
            $array[$currIndex]  =       isset($custElem[$currIndex]) ? $custElem[$currIndex] : $text;
            $i++;
        }
        return $array;
    }

    public function redirectToPage($routeName, $param = [], $withError = null, $withInput = false, $data)
    {
        $redirectObj        =       redirect()->route($routeName, $param);
        if($withError){
            $redirectObj->withErrors($withError["error"], $withError["prefix"]);
        }
        if($withInput){
            $redirectObj->withInput();
        }
        $redirectObj->with($data);
        return $redirectObj;
    }

    public function getMaxUploadSize()
    {
        $maxUploadSize      =       min(ini_get("post_max_size"), ini_get("upload_max_filesize"));

        if(strpos($maxUploadSize, "M")){
            $maxUploadSize  =       str_replace("M", "", $maxUploadSize);
            // MB to KB
            $maxUploadSize  =       $maxUploadSize * 1024;
        }elseif(strpos($maxUploadSize, "G")){
            $maxUploadSize  =       str_replace("G", "", $maxUploadSize);
            // GB to KB
            $maxUploadSize  =       $maxUploadSize * 1024 * 1024;
        }

        return $maxUploadSize;
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $success = true){
        $response = ['success' => $success, 'data' => $result, 'message' => $message];
        
        return response()->json($response, 200);
    }

    /**
     * Write a error log details
     */
    public function errorLog( \Exception $exception ){
        $file = $exception->getFile();
        $line = $exception->getLine();
        $msg  = $exception->getMessage();
        
        \Log::error("File - {$file}:{$line}; Message - {$msg}");
        \Log::error($exception);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError(\Exception $error, $message, $data = [], $code = 404){
        $this->errorLog($error);
        
        $response = ['success' => false, 'message' => $message];
        
        if(!empty($data)){
            $response['data'] = $data;
        }
        
        return response()->json($response, $code);
    }

    /**
     * Process to get back up in DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function processBackup(){
        $request = \Request();

        try{
            $this->bkpHelper = new BackupHelper();

            /*if( $request->has("destroy") ){
                $this->bkpHelper->dropBackups( $request->get("destroy") );
            }*/

            $backup = $this->bkpHelper->generateBackups();

            if( $backup ){
                info("Backup Success: " . $backup);

                return $this->sendResponse( [], "Backup done successfully");
            }
        }catch( \Exception $e ) {
            \OTSHelper::notifyBackupError($e);

            return $this->sendError($e, 'Failed', ['error' => 'Unable to process'], 400);
        }
    }

    public function DTRequestVars($request, $thead)
    {
        $vars = [];

        if(gettype($request) == "array") {
            $pageNo = isset($request["draw"]) && is_numeric($request["draw"]) ? intval($request["draw"]) : 1;
            $start = isset($request["start"]) && is_numeric($request["start"]) ? intval($request["start"]) : 0;
            $pageLength = isset($request["length"]) && is_numeric($request["length"]) ? intval($request["length"]) : 10;
            $search = isset($request["search"]) && !empty($request["search"]) ? $request["search"] : [];
            $columnOrder = isset($request["order"]) && !empty($request["order"]) ? $request["order"] : [];
        } else {
            $pageNo = isset($request->draw) && is_numeric($request->draw) ? intval($request->draw) : 1;
            $start = isset($request->start) && is_numeric($request->start) ? intval($request->start) : 0;
            $pageLength = isset($request->length) && is_numeric($request->length) ? intval($request->length) : 10;
            $search = isset($request->search) && !empty($request->search) ? $request->search : [];
            $columnOrder = isset($request->order) && !empty($request->order) ? $request->order : [];
        }

        $pageNo = $pageNo > 0 ? $pageNo : 1;

        $filter["paging"] = ["start" => $start, "length" => $pageLength];

        if(isset($search["value"]) && !empty($search["value"])) {
            $filter["search"] = $search["value"];
        }

        if(isset($columnOrder[0]) && !empty($columnOrder[0])) {
            if(isset($columnOrder[0]["column"]) && isset($columnOrder[0]["dir"])) {
                $colNames = array_keys($thead);

                $filter["order"] = [$colNames[$columnOrder[0]["column"]] => $columnOrder[0]["dir"]];
            }
        }

        return compact("pageNo", "start", "pageLength", "search", "columnOrder", "filter");
    }

    public function DTResponseData($pageNo, $currPageRecordsCount, $totalRecordsCount)
    {
        $draw = $pageNo;
        $recordsFiltered = $currPageRecordsCount;
        $iTotalDisplayRecords = $currPageRecordsCount > 0 ? $totalRecordsCount : 0;

        return compact("draw", "recordsFiltered", "iTotalDisplayRecords");
    }

}
