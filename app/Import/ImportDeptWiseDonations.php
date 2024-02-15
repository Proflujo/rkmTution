<?php

namespace App\Import;

use Lang;
use Excel;
use DB;
use Log;
use Exception;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\User;
use App\Models\Reports;
use App\Models\Wrapper;
use App\Exceptions\ExcelImportException;

class ImportDeptWiseDonations implements ToCollection
{

    public function collection(Collection $collection) {
        $rows = $collection->toArray();

        if (empty($rows)) {
            throw new ExcelImportException('Empty excel can not be imported!');
        }

        $headingRow = array_shift($rows);

        if(!empty($rows) && !empty($headingRow)){
            
            foreach ($rows as $key => $row) {
                $importData   =   $rows[$key];
                $datas[$key]   =   array_filter($importData , fn ($value) => !is_null($value));
            }

            foreach ($datas as $key => $cellValue) {
                $users  =   User::where('username',$cellValue[0])->get('id');
                $userId[$key] = $users[0]->id; 
            }

            $data = [];
            for ($i = 0; $i < 48; $i++) {
                $data[$i] = [
                    'amount' => $datas[$i],
                    'userId' => $userId[$i],
                ];
            } 

            if(!empty($data) && isset($data)){

                foreach ($data as $key => $value) {
                   $user = $value['userId'];
                   $amount = $value['amount'];

                    $i = 0;
                    foreach ($amount as $key => $val) {
                       if(!is_string($val)){
                            $dataArray["fkuser_id"] = $user;
                            $dataArray["month"] = $key;
                            $dataArray['payment'] =  $val;  
                            $dataArray["account_holder_id"] = 1;
                            $dataArray["year"] = date('Y');
                            $dataArray["payment_status"] = 1;
                            $dataArray["active_status"] = 1;
                            $dataArray["created_at"] = date('Y-m-d H:i:s');
                            $dataArray["updated_at"] = null;

                            $result = DB::table('user_accounts')->insert($dataArray);
                            $i++;
                       }
                    }
                }
              
            }
        }   

        if (empty($rows)) {
            throw new ExcelImportException('There are no records found in the Excel!');
        }

        if (empty($headingRow)) {
            throw new ExcelImportException('First record is considered as heading and it should not be empty!');
        }

        //
    }

}
