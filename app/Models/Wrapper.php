<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;
use \Storage;
use \File;

class Wrapper extends Model
{
    /*
     |--------------------------------------------------------------------------
     | Wrapper Model
     |--------------------------------------------------------------------------
     |
     | This model have all basic DB function and enable DB connections
     |
     */

    public $db;
    public $usersTable = "users";

    /* Constructor */
    public function __construct()
    {
    }

    /*
     |--------------------------------------------------------------------------
     |              Configure Model Getters and Setters
     |--------------------------------------------------------------------------
     */

    /**
     * Change the configure db connection string propertites
     */
    protected function setConfigDBName()
    {
        
    }

    /**
     * Set database connection DB name
     *
     * @param string $connection
     */
    public function setConnectionName( string $connection ){
        $this->connection = $connection;
    }

    /**
     * Get database connection DB name
     *
     * {@inheritDoc}
     * @see \Illuminate\Database\Eloquent\Model::getConnectionName()
     * @return $dbConnectionName
     */
    public function getConnectionName(){
        return $this->connection;
    }

    /**
     * Set database connection
     *
     * {@inheritDoc}
     * @see \Illuminate\Database\Eloquent\Model::setConnection()
     */
    public function setConnection( $conn ){
        $this->db = DB::Connection( $conn );
    }

    /**
     * Get database connection
     *
     * {@inheritDoc}
     * @see \Illuminate\Database\Eloquent\Model::getConnection()
     * @return \Illuminate\Support\Facades\DB::connection
     */
    public function getConnection(){
        if( empty($this->db) ){
            $conn  = $this->getConnectionName();
            $this->setConnection( $conn );
        }
        
        return $this->db;
    }

    /*
     |--------------------------------------------------------------------------
     |                      Basic DB functions
     |--------------------------------------------------------------------------
     */
    
     /**
     * Set the variables for mysql queries
     *
     * @param array $vars
     */
    public function setSQLFieldVariables( array $vars ){
        $sql    = "SET @one=1";
        $params = [];
        
        foreach ( $vars as $key => $var ){
            $sql           .=  ",@{$key} = :{$key}";
            $params[$key]   =   $var;
        }
        
        return $this->getConnection()->select( $sql, $params );
    }
    
    /**
     * Fetch all results based on the given query
     *
     * @param string $query
     * @return boolean|object
     */
    public function fetchAll(string $query)
    {
        $this->setSQLFieldVariables(["active" => 1, "inActive" => 2]);
        
        try {
            $query = str_replace("CHART_DATE_FORMAT", "'%d %b %y'", $query);
            $query = str_replace("APPLICATION_DATE_FORMAT", "'%d-%m-%Y'", $query);
            $query = str_replace("APPLICATION_DATETIME_FORMAT", "'%d-%m-%Y %h:%i:%s'", $query);
            $query = str_replace("APPLICATION_TIME_FORMAT", "'%H:%i:%s'", $query);
            $query = str_replace("APPLICATION_TIME_HM_FORMAT", "'%H:%i'", $query);
            $query = str_replace("APPLICATION_DATEHM_FORMAT", "'%d-%m-%Y %H:%i'", $query);
            $query = str_replace("APPLICATION_AMOUNT_FORMAT", "2, 'en_IN'", $query);
            $query = str_replace("APPLICATION_LAKHS_FORMAT", "0, 'en_IN'", $query);
            $query = str_replace("COMMON_DB", config("database.connections." . $this->commonConnDB . ".database"), $query);
            $rawSet = $this->getConnection()->raw($query); // create raw query
            return $this->getConnection()->select($rawSet); // excute raw query
        } catch (\Throwable | \Exception $e) { // handle error
            $this->writeErrorLog($e->getMessage());
        }

        return false;
    }

    /**
     * Fetch all results based on the given query and params
     *
     * @param string $query
     * @param array $param
     * @return unknown|boolean
     */
    public function fetchWithParam( string $query, array $param)
    {
        $this->setSQLFieldVariables(["active" => STATUS_ACTIVE, "inActive" => STATUS_INACTIVE]);
        
        try {
            $query = str_replace("CHART_DATE_FORMAT", "'%d %b %y'", $query);
            $query = str_replace("APPLICATION_DATE_FORMAT", "'%d-%m-%Y'", $query);
            $query = str_replace("APPLICATION_DATETIME_FORMAT", "'%d-%m-%Y %H:%i:%s'", $query);
            $query = str_replace("APPLICATION_TIME_FORMAT", "'%H:%i:%s'", $query);
            $query = str_replace("APPLICATION_TIME_HM_FORMAT", "'%H:%i'", $query);
            $query = str_replace("APPLICATION_DATEHM_FORMAT", "'%d-%m-%Y %H:%i'", $query);
            $query = str_replace("APPLICATION_AMOUNT_FORMAT", "2, 'en_IN'", $query);
            $query = str_replace("APPLICATION_LAKHS_FORMAT", "0, 'en_IN'", $query);
            $query = str_replace("COMMON_DB", config("database.connections." . $this->commonConnDB . ".database"), $query);
            return $this->getConnection()->select($query, $param);
        } catch (\Throwable | \Exception $e) { // handle error
            $this->writeErrorLog($e->getMessage());
        }

        return false;
    }

    /**
     * Fetch single column result based on the given query and column
     *
     * @param string $query
     * @param array $param
     * @return boolean|object
     */
    public function fetchOne( string $query, array $param )
    {
        $this->setSQLFieldVariables(["active" => STATUS_ACTIVE, "inActive" => STATUS_INACTIVE]);
        
        try {
            $query = str_replace("CHART_DATE_FORMAT", "'%d %b %y'", $query);
            $query = str_replace("APPLICATION_DATE_FORMAT", "'%d-%m-%Y'", $query);
            $rawSet = $this->getConnection()->raw($query);
            return $this->getConnection()->select( $rawSet, $param )->first();
        } catch (\Throwable | \Exception $e) { // handle error
            $this->writeErrorLog($e->getMessage());
        }

        return false;
    }

    /**
     * Insert given dataset to given table
     *
     * @param string $table
     * @param array $data
     * @return int|boolean
     */
    public function dbInsert( string $table, array $data )
    {
        return $this->getConnection()->table( $table )->insertGetId( $data );
    }

    /**
     * Update given dataset to given table based on the condition
     *
     * @param string $table
     * @param array $where
     * @param array $data
     * @return boolean
     */
    public function dbUpdate( string $table, array $where, array $data )
    {
      //  dd($table,$where,$data);
//         return $this->getConnection()->table($table)->where( $where )->update( $data );
        try {

            $dbObject	=	$this->getFilteredObject( $table, $where );
            
            return $dbObject->update( $data );
            
        } catch (\Exception $e) {
            
            $this->writeErrorLog($e->getMessage());
            return false;
        }
    }

    /**
     * Delete the data in connected DB based on the condition
     *
     * @param string $table
     * @param array $where
     * @return unknown
     */
    public function dbDelete( string $table, array $where )
    {
        //~ return $this->getConnection()->table( $table )->where( $where )->delete();
        
        try {
			$dbObject	=	$this->getFilteredObject($table, $where);
			return $dbObject->delete();

		} catch (\Exception $e) {

			$this->writeErrorLog($e->getMessage());
			return false;
		}
    }

    /**
     * Execute the given statement into DB
     *
     * @param string $query
     * @return boolean
     */
    public function executeRawQuery( string $query, array $dataArray = [] ){
        try {
            $this->setSQLFieldVariables(["active" => STATUS_ACTIVE, "inActive" => STATUS_INACTIVE]);

            return $this->getConnection()->statement($query, $dataArray);
        } catch (\Throwable | \Exception $e) { // handle error
            $this->writeErrorLog($e->getMessage());
        }

        return false;
    }

    /*
     |--------------------------------------------------------------------------
     |                  DB and error Log functions
     |--------------------------------------------------------------------------
     */

    /**
     * Write error into log file
     *
     * @param Unknown $message
     */
    public function writeErrorLog( $message ){
        Log::error($message);
    }

    /**
     * Enable query log
     */
    public function dbEnableQueryLog()
    {
        $this->getConnection()->enableQueryLog();
    }

    /**
     * Get all excuted queries after log enabled
     *
     * @return unknown
     */
    public function dbGetLog()
    {
        return $this->getConnection()->getQueryLog();
    }

    /**
     * Disable query log
     */
    public function dbDisableQueryLog()
    {
        $this->getConnection()->disableQueryLog();
    }

    public function createDB($dbName)
    {
        return $this->getConnection()->statement("CREATE DATABASE IF NOT EXISTS " . $dbName);
    }

    public function dbTransactionBegin()
    {
        $this->getConnection()->beginTransaction();
    }

    public function dbTransactionRollback()
    {
        $this->getConnection()->rollBack();
    }

    public function dbTransactionCommit()
    {
        $this->getConnection()->commit();
    }

   
    public function getUpladFileToServer($file, $dir)
    {
        $storedPath = Storage::putFileAs($dir, $file, $file->getClientOriginalName());
        return $storedPath;
    }

    public function getFileContents($filePath, $returnType = "array")
    {
        $content = File( realpath( $filePath ) );
        return $returnType == "array" ? $content : implode("", $content);
    }

   
    public function convertDBDateFormat($strDate)
    {
        return !empty($strDate) ? date(APP_DB_DATE_FORMAT, strtotime($strDate)) : null;
    }

    public function convertDBDateTimeFormat($strDate, $ifTimeIsNull = '')
    {
        if(preg_match('/^[0-9]{2}\-[0-9]{2}-[0-9]{4}$/', $strDate)) {
            if($ifTimeIsNull == 'eod') {
                $strDate = $strDate . ' 23:59:59';
            }
        }

        return !empty($strDate) ? date(APP_DB_DATETIME_FORMAT, strtotime($strDate)) : null;
    }

   
    public function rawNumberFormat($amount)
    {
        if( !empty($amount) ){
            return str_replace(",", "", $amount);
        }else{
            return 0;
        }
    }

    public function amountFormat($amount, $withFractionDigits = true)
    {
        $currency       =       $amount;
        $format         =       new \NumberFormatter('en_IN', \NumberFormatter::CURRENCY);

        if($withFractionDigits) {
            $format->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, 2);
            $format->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 2);
        } else {
            $format->setAttribute(\NumberFormatter::FRACTION_DIGITS, 0);
        }

        $currency       =       $format->format($amount);
        $currency       =       preg_replace("/[^0-9,'.']/", '', $currency);

        return $currency;
    }

    public function getFilteredObject($tableName, $where) {

        $tmpObj     =   $this->getConnection()->table($tableName);
        
        foreach ($where as $key => $val) {
            switch ($key) {
                case "orWhere":
                    $whereCol = $val["column"];
                    $whereVal = $val["colVal"];
                    $tmpObj = $tmpObj->orWhere($whereCol, $whereVal);
                    break;

                case "whereIn":
                    $whereCol = $val["column"];
                    $whereVal = $val["valArr"];

                    $tmpObj = $tmpObj->whereIn($whereCol, $whereVal);
                    break;

                case "whereNotIn":
                    $whereCol = $val["column"];
                    $whereVal = $val["valArr"];

                    $tmpObj = $tmpObj->whereNotIn($whereCol, $whereVal);
                    break;

                default:
                    $tmpObj = $tmpObj->where($key, "=", $val);
                    break;
            }
        }
        return $tmpObj;
    }

}

?>
