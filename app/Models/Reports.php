<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Wrapper;
use DB;

class Reports extends Wrapper
{
	use HasApiTokens, HasFactory, Notifiable;

	public function getReportsList($year,$month)
	{
		$condition = "";
		
		if($year != ''){
			$condition .= " AND userAccount.year = '".$year."'";
		}

		if($month != ''){
			$condition .= "AND userAccount.month  = '".$month."'";
		}

		$sql = DB::select("	SELECT 
							 	userAccount.*,
							 	max(codelist_details.codelist_description) as branch
							FROM 
							 	user_accounts as userAccount
							LEFT JOIN 
							 	users ON users.id = userAccount.fkuser_id
							LEFT JOIN 
							 	codelist_details ON codelist_details.fkcodelist_id = 1
							 	AND codelist_details.codelist_value = users.branch
							WHERE 
							 	userAccount.active_status = 1
							$condition
							GROUP BY userAccount.account_id"
						);
		return $sql;
	}

	public function getYearsReportsList($year)
	{
		$condition = "";
		
		if($year != ''){
			$condition .= "AND YEAR(userAccount.created_at) = '".$year."'";
		}

		$sql = DB::select("	SELECT 
							 	userAccount.*,
							 	max(codelist_details.codelist_description) as branch
							FROM 
							 	user_accounts as userAccount
							LEFT JOIN 
							 	users ON users.id = userAccount.fkuser_id
							LEFT JOIN 
							 	codelist_details ON codelist_details.fkcodelist_id = 1
							 	AND codelist_details.codelist_value = users.branch
							WHERE 
							 	userAccount.active_status = 1
							$condition
							GROUP BY userAccount.account_id"
						);
		return $sql;
	}
}