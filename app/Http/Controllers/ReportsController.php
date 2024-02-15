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

use App\Models\User;
use App\Models\Reports;
use DB;

/**
 * Roles Controller
 ----------------------

 * Controls user profile pages
 */

class ReportsController extends Controller 
{
  
    public function __construct()
	{
		parent::__construct();
		$this->userModel 	=	new User();
        $this->reportsModel    =   new Reports();
	}

    public function viewReport()
    {    
        $months = $this->userModel->getMonths();

        return view('Reports.reports',compact('months'));
    }

    public function getReports(Request $request)
    {
        $year = $request->get('year');
        $month = $request->get('month');

        $reportsList = $this->reportsModel->getReportsList($year,$month);
        
        $heads  =   [
                        "username"          => "User Name",
                        "branch"            => "User Branch",
                        "account_holder"    => "Account Holder",
                        "payment"           => "Payment",
                    ];

        foreach($reportsList as $userRow){
            $sender                 = User::find($userRow->account_holder_id);
            $account_holder         = User::find($userRow->fkuser_id);
            $userRow->username      = $account_holder->username;
            $userRow->branch        = $userRow->branch;
            $userRow->account_holder= $sender->username;
            $userRow->payment       = $userRow->payment;
        }

        return $this->getDataTableStructure($reportsList, $heads);
    }

    public function getYearlyReports(Request $request)
    {
        return view('Reports.yearlyReports');
    }

    public function getYearlyList(Request $request)
    {
        $year = $request->get('year');

        $yearReportsList = $this->reportsModel->getYearsReportsList($year);
        
        $heads  =   [
                        "username"          => "User Name",
                        "branch"            => "User Branch",
                        "account_holder"    => "Account Holder",
                        "payment"           => "Payment",
                    ];

        foreach($yearReportsList as $userRow){
            $sender                 = User::find($userRow->account_holder_id);
            $account_holder         = User::find($userRow->fkuser_id);
            $userRow->username      = $account_holder->username;
            $userRow->branch        = $userRow->branch;
            $userRow->account_holder= $sender->username;
            $userRow->payment       = $userRow->payment;
        }
        
        return $this->getDataTableStructure($yearReportsList, $heads);
    }
}