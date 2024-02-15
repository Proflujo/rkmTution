<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'branch',
        'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function changeConnection()
    {
        $this->wrapper->changeConnection = "";
    }

    public function getFetchUserInfo()
    {
       $sql = DB::select('
                    SELECT 
                        A.*,
                        B.codelist_description as branch
                    FROM 
                        users as A
                    LEFT JOIN 
                        codelist_details as B
                    ON (B.codelist_value = A.branch)
                    LEFT JOIN 
                        codelist_master as C
                    ON (B.fkcodelist_id = C.codelist_id)
                    WHERE C.codelist_id = 1 ');
                    /*->select('*')
                    ->get();*/
       
       return $sql;
    }


    public function getPaymentsInfo()
    {
         $sql = DB::select('
                    SELECT 
                        (SELECT username FROM users WHERE id = A.account_holder_id ) AS account_holder ,
                        A.*,
                        B.*
                        
                    FROM 
                        user_accounts as A
                    LEFT JOIN 
                        users as B
                    ON (B.id = A.fkuser_id)
                    WHERE B.active_status = 1');
        // dd($sql);
       return $sql;
    }

    public function getBranchList()
    {
        $sql = DB::select('
                        SELECT codelist_details.codelist_value, codelist_details.codelist_description
                        FROM codelist_master
                        LEFT JOIN codelist_details
                        ON codelist_master.codelist_id = codelist_details.fkcodelist_id
                        WHERE codelist_master.codelist_id = 1
                        AND codelist_master.active_status = 1');

        return $sql;
    }

    public function fetchYearlyPaymentInfo($year)
    {
        $sql =  DB::select("
                    SELECT 
                        SUBSTRING(date_format(A.created_at,'%M') ,1,3) as monthName,
                        SUM(payment) as monthlyAmount,
                        MONTH(A.created_at) as month,
                        YEAR(A.created_at) as year
                        
                    FROM 
                        user_accounts as A
                    LEFT JOIN users as B
                    ON (B.id = A.fkuser_id)

                    WHERE B.active_status = 1

                    AND YEAR(A.created_at) = $year

                    GROUP BY MONTH(A.created_at), YEAR(A.created_at)

                    order by A.created_at
                ");

       return $sql;
    }

    public function fetchMonthlyPaymentInfo($date)
    {
        $sql =  DB::select("
                    SELECT
                        users.id,
                        users.username,
                        users.email,
                        codelist_details.codelist_description,
                        SUM(user_accounts.payment) as amount,
                        user_accounts.created_at,
                        DATE_FORMAT(user_accounts.created_at, '%Y-%m') as formatDate
                    FROM user_accounts

                    LEFT JOIN users ON 
                        user_accounts.fkuser_id = users.id
                    LEFT JOIN codelist_details on
                        users.branch = codelist_details.codelist_value
                    WHERE
                        user_accounts.active_status = 1                   

                    AND DATE_FORMAT(user_accounts.created_at, '%Y-%m') = '".$date."'

                    GROUP BY codelist_description

                    ORDER BY user_accounts.created_at
                ");

       return $sql;
    }

  

    public function getMonths()
    {
      $sql = DB::select('
                        SELECT codelist_details.codelist_value as monthId, codelist_details.codelist_description as monthName
                        FROM codelist_master
                        LEFT JOIN codelist_details
                        ON codelist_master.codelist_id = codelist_details.fkcodelist_id
                        WHERE codelist_master.codelist_id = 2
                        AND codelist_master.active_status = 1');

        return $sql;  
   } 
}

