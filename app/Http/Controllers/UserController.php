<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserAccounts;
use Illuminate\Support\Facades\View;
use Mail;
use Auth;
use Session;
use Lang;
use PDF;

use App\Models\User;
use DB;

/**
 * User Controller
 ----------------------

 * Controls user profile pages
 */

class UserController extends Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->userModel 	=	new User();
	}

	public function getUsers()
	{
		$users  = $this->userModel->getFetchUserInfo();

		$heads  =   [
                        "username"		=> "User Name",
                        "branch"		=> "Branch",
                        "mobile"   	 	=> "Mobile Number",
                        "email"      	=> "Email",
                        "id"         	=> "Action",
                    ];


        foreach($users as $userRow){
            $userRow->username    = $userRow->username;
            $userRow->branch     	= $userRow->branch;
            $userRow->email      	= $userRow->email;
            $userRow->mobile     	= $userRow->mobile;
        }


		return $this->getDataTableStructure($users, $heads);

	}

	public function listUsers()
	{
		return view('users');
	}

	public function addUser()
	{
		$branches  = $this->userModel->getBranchList();

		$withArray	=	[
							"branches" =>	$this->convertObjectToArray($branches, "codelist_value", "codelist_description"),
						];

		return view('user-form')->with($withArray);
	}

	public function addUserPayments()
	{
		$users = User::where('active_status',1)->get();
		$branchs = DB::select("
								SELECT
      								A.codelist_value AS value,
      								A.codelist_description AS branch
								FROM 
									codelist_details AS A
								WHERE 
									fkcodelist_id =1 
								AND 
									active_status = 1
							");
		return view('payments.add',compact('users','branchs'));
	}

	public function editUserPayments($id)
	{
		$users = User::where('active_status',1)->get();
		$branchs = DB::select("
								SELECT
      								A.codelist_value AS value,
      								A.codelist_description AS branch
								FROM 
									codelist_details AS A
								WHERE 
									fkcodelist_id =1 
								AND 
									active_status = 1
							");

		$paymentDetails = DB::select("
										SELECT
   											C.fkuser_id,
										   	C.account_id,
										   	C.account_holder_id,
										   	C.payment,
										   	B.codelist_value AS branchValue,
										   	B.codelist_description AS branch,
										   	A.*
										FROM users AS A
										LEFT JOIN codelist_details AS B 
  											ON (A.branch = B.codelist_value)
										LEFT JOIN user_accounts AS C
  											ON (C.fkuser_id = A.id)
										WHERE B.fkcodelist_id =1 
										AND C.account_id =$id
									");

		$paymentDetails = $paymentDetails[0];
		
		return view('payments.edit',compact('users','branchs','paymentDetails'));

	}

	public function store(Request $request)
	{
		

		if($request->account_id == null)
		{
			$account_holder_id = auth()->user()->id;
			$userAccounts = new UserAccounts();
			$userAccounts->fkuser_id = $request->username;
			$userAccounts->payment = $request->ammount;
			$userAccounts->account_holder_id = $account_holder_id;
			$userAccounts->month = date('m');
			$userAccounts->year = date('Y');
			$userAccounts->created_at = now();
			$userAccounts->updated_at = null;
			$userAccounts->save();
			$this->html_email($userAccounts->account_id);
			// dd($userAccounts->account_id);

			return redirect()->route('payments.list')->with('message', 'User payment added sucessfully!');
		}
		else{
			$account_holder_id = auth()->user()->id;
			$userAccounts = UserAccounts::find($request->account_id);
			$userAccounts->fkuser_id = $request->username;
			$userAccounts->payment = $request->ammount;
			$userAccounts->account_holder_id = $account_holder_id;
			$userAccounts->updated_at = now();
			$userAccounts->save();
			// dd($userAccounts->account_id);
			$this->html_email($userAccounts->account_id);
			return redirect()->route('payments.list')->with('message', 'User payment updated sucessfully!');
		}		
	}


	public function getPayments()
	{
		$payments  = $this->userModel->getPaymentsInfo();

		$heads  =   [
                        "username"    		=> "User Name",
                        "account_holder"	=> "Account Holder",
                        "payment"			=> "Payment",
                        "payment_id"        => "Action",
                    ];

        foreach($payments as $userRow){
            $userRow->username    		= $userRow->username;
            $userRow->account_holder 	= $userRow->account_holder;
            $userRow->payment     		= $userRow->payment;
            $userRow->account_id 		= $userRow->account_id;
        }

		return $this->getDataTableStructure($payments, $heads);

	}

	public function listPayments()
	{
		return view('payments.paymentList');
	}

	public function createUser(Request $request)
	{
		
	  	$validator = Validator::make($request->all(), [
            'username' => 'required', 'string', 'max:255',            
            'branch'  => 'required',
            'mobile' => 'required', 'string', 'max:10','min:10','unique',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if(is_null($request['userId'])){

	        $result = User::create([
			            'username' => $request['username'],            
			            'branch' => $request['branch'],
			            'mobile' => $request['mobile'],
			            'email' => $request['email'],
			            'password' => Hash::make($request['password']),
	        ]);

	        if ($result) {

	        	return redirect()->route('users.list')->with('success','User created successfully!');
	        }
        }else{

        	$result 	=	User::where('id', $request['userId'])
			       			->update([
	           					'username' => $request['username'],            
					            'branch' => $request['branch'],
					            'mobile' => $request['mobile'],
					            'email' => $request['email'],
					            'password' => Hash::make($request['password']),
			        	]);

			if ($result) {

	        	return redirect()->route('users.list')->with('success','User updated successfully!');
	        }
        }
	}

	public function editUser($userId)
	{
		$userId         =   base64_decode($userId);

		$userDetails    =	User::where('id',$userId)->get();

		$branches  		= 	$this->userModel->getBranchList();

		$withArray		=	[
								"userInfo" => $userDetails,
								"branches" =>	$this->convertObjectToArray($branches, "codelist_value", "codelist_description")
							];

		return view('user-form')->with($withArray);
	}

	public function getYearlyPaymentInfo(Request $request)
	{
		$reqYear =	$request->year;
		
		$payments  = $this->userModel->fetchYearlyPaymentInfo($reqYear);

		return json_encode($payments);
	}

	public function getMonthlyPaymentInfo(Request $request)
	{
		$reqDate =	$request->date;
		
		$payments  = $this->userModel->fetchMonthlyPaymentInfo($reqDate);

		return json_encode($payments);
	}

	public function events()
	{
		return view('events');
	}

	public function profile()
	{			
		$userDetails	=	Auth::user();
		$branches  		= 	$this->userModel->getBranchList();

		$withArray		=	[
								"userInfo" => $userDetails[0],
								"branches" =>	$this->convertObjectToArray($branches, "codelist_value", "codelist_description")
							];
							
		return view('profile',compact('userDetails','branches'));;
	}
	public function html_email($pamentId) {
		// $data =array("title"=>"Sample Template");
		$userAccounts 	= UserAccounts::find($pamentId);
		$senderDetails  = User::find($userAccounts->fkuser_id);
		$receiverDetails= User::find($userAccounts->account_holder_id);
		$senderEmail = $senderDetails->email;
		
		$paymentDetails = [
            'title' 	=> 'Annai sarathai tuition center By RKMSH 2019 Alumni',
            'date' 		=> date('d/m/Y'),
            'sender' 	=> $senderDetails->username,
            'receiver'	=> $receiverDetails->username,
            'amount'  	=> $userAccounts->payment
        ];
        $html = view("email.email")->with($paymentDetails)->render();
         // return $html;
        $sender = $senderDetails->email;
      	Mail::html($html, function($message) use ($sender) {
        $message->to($sender, 'Tutorials Point')->subject('Tution Center');
        $message->from('xyz@gmail.com','RKMS TC');
      });
      // echo "HTML Email Sent. Check your inbox.";
      return redirect()->route('payments.list')->with('message', 'User payment Receipt send sucessfully!');
   }

}
