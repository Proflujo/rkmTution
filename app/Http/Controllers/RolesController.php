<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Roles;
use Auth;
use Session;
use Lang;

use App\Models\User;
use DB;

/**
 * Roles Controller
 ----------------------

 * Controls user profile pages
 */

class RolesController extends Controller 
{
   public function __construct()
	{
		parent::__construct();
		$this->userModel 	=	new User();
      $this->roleModel  =  new Roles();
	}

   public function role()
   {
      return view('roles.roles');
   }

   public function roleForm()
   {
      $permissions  =   $this->roleModel->fetchAllPermission();

      $withArray    =   [
                           "permissions" =>  $this->convertObjectToArray($permissions, "id", "name"),
                           "roleHasPermissionsInfo" => []
                        ];

      return view('roles.role-form')->with($withArray);
   }

   public function getRoles()
   {
      $roles  = $this->roleModel->fetchAllRoles();

      $heads  =   [
                     "name"  => "Role Name",
                     "description" => "Description",
                     "id"        => "Action"
                  ];


        foreach($roles as $role){
            $role->name    = $role->name;
            $role->description = $role->description;
            $role->id       = $role->id;
        }

      return $this->getDataTableStructure($roles, $heads);

   }

   public function createRole(Request $request)
   {
      $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',            
            'slug_name'  => 'required',
            'description'  => 'required',
            'permissions'  => 'required',
      ]);
 
      if ($validator->fails()) {
         return redirect()->back()->withErrors($validator);
      }

      if(is_null($request->roleId)){         
         $role    =  $this->roleModel->insertRole($request);  

         return redirect()->route('roles.list')->with('success','Role created successfully!');
     
      }else{
         $role    =  $this->roleModel->updateRole($request);

         return redirect()->route('roles.list')->with('success','Role updated successfully!');
     
      }
   }

   public function editRole($id)
   {
      $roleId     =  base64_decode($id);

      $roleDetails  = $this->roleModel->fetchRoleDetails($roleId);

      $permissions  =   $this->roleModel->fetchAllPermission();

      $roleHasPermissions = $this->roleModel->fetchRoleHasPermissions($roleId);

      $permissionsArr = [];

      foreach ($roleHasPermissions as $key => $value) {
        $permissionsArr[] = $value->permission_id;
      }

      $withArray     =  [
                        "roleInfo" => $roleDetails[0],
                        "permissions" =>  $this->convertObjectToArray($permissions, "id", "name"),
                        "roleHasPermissionsInfo" => $permissionsArr
                     ];

      return view('roles.role-form')->with($withArray);
   }

   public function deleteRole($id)
   {
      $roleId     =  base64_decode($id);

      $isDeleted  =  $this->roleModel->getDeleteRole($roleId);

      if($isDeleted){

         return redirect()->route('roles.list')->with('success','Role deleted successfully!');

      }else{

         return redirect()->back()->with('error','Unable to delete the Role. Please try again later!');
      }
   }

   public function assignRoleView($id)
   {
      $userId     =  base64_decode($id);

      $user       =  $this->roleModel->fetchUserDetails($userId);

      $roles  =   $this->roleModel->fetchAllRoles();

      $withArray    =   [
                           "roles" =>  $this->convertObjectToArray($roles, "id", "name"),
                           "userInfo" => $user[0]
                        ];

      return view('roles.role-assign')->with($withArray);
   }

   public function assignRoleToUser(Request $request)
   {
      // $user    = $this->roleModel->updateUserRole($request);

      // return $user;

      $input = $request->all();

      $user  =  User::where('id', $request->userId)
                        ->update([
                           'role' => $request->input('role')
                  ]);

      $user = User::find($request->userId);
 
      DB::table('model_has_roles')->where('model_id',$request->userId)->delete();

      $user->assignRole($request->input('role_id'));

       return redirect()->route('users.list')->with('success','Role update successfully');
   }
}