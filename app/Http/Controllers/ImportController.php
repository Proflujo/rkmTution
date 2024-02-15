<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserAccounts;
use Auth;
use Session;
use Lang;
use DB;

use Excel;

use App\Models\User;
use App\Models\Reports;
use App\Import\ImportDeptWiseDonations;

/**
 * Roles Controller
 ----------------------

 * Controls user profile pages
 */

class ImportController extends Controller 
{
  
    public function __construct()
    {
        parent::__construct();
    }

    public function importScreen()
    {    
        return view('Reports.Import');
    }

    public function importData(Request $request)
    {
       
       $alert = null;
       $validationMessages = [];

       try {
               $importFile = $request->file('importFile');

               $result = Excel::import(new ImportDeptWiseDonations, $importFile);
               
               return redirect()->route('import')->with('success','Payments Imported successfully!');
       
       } catch(Exception $e) {
               if ($e instanceof ExcelImportException) {
                       $alert = $e->getMessage();
                       $validationMessages = $e->getValidationMessages();
               } else {
                       $alert = 'Error occurred!';
                       Log::error($e);
               }

               return redirect('/import')->with(compact('alert', 'validationMessages'));
       }
    }
}