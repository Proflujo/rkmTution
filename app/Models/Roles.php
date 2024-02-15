<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Wrapper;
use DB;
use Spatie\Permission\Traits\HasRoles;

class Roles extends Wrapper
{
    use HasRoles;

    protected $guard_name = 'api';

    public function fetchAllPermission()
    {
        $sql = DB::select('SELECT id,name FROM permissions');

        return $sql;
    }
    public function fetchAllRoles()
    {
        $sql = DB::select('SELECT * FROM roles');

        return $sql;
    }

    public function insertRole($data)
    {        
        $dataRoleArray["name"] = $data->name;
        $dataRoleArray["guard_name"] = $data->slug_name;
        $dataRoleArray["description"] = $data->description;
        $dataRoleArray["created_at"] = now();
        $dataRoleArray["updated_at"] = null;

        $roleId = $this->dbInsert('roles', $dataRoleArray);

        foreach ($data->permissions as $key => $value) {

            $dataRoleHasPermissionArray["role_id"] = $roleId;

            $dataRoleHasPermissionArray["permission_id"] = $value;

            $this->dbInsert('role_has_permissions', $dataRoleHasPermissionArray);
        }

        return $roleId;
    }

    public function updateRole($data)
    {
        $roleId             =   isset($data["roleId"]) ? $data["roleId"] : false;

        $dataRoleArray["name"] = $data->name;
        $dataRoleArray["guard_name"] = $data->slug_name;
        $dataRoleArray["description"] = $data->description;
        $dataRoleArray["updated_at"] = now();

        $this->dbUpdate("roles",["id" => $data->roleId] ,$dataRoleArray);

        if($roleId){
            $permissionsUpdated =   $this->getUpdateRolePermissions($data["permissions"], $roleId);
            if($permissionsUpdated){
                return true;
            }
        }

        return false;
    }

    public function getUpdateRolePermissions($permissions, $roleId)
    {
        $currPermsUpdated   =   $this->dbDelete('role_has_permissions', [ "role_id" => $roleId ]);

        $dataArray          =   [
                                    "role_id" => $roleId
                                ];
        foreach($permissions as $permission){
            $dataArray["permission_id"] = $permission;
            $this->dbInsert('role_has_permissions', $dataArray);
        }

        return true;
    }

    public function fetchRoleDetails($roleId)
    {
        $sql = DB::select(' SELECT * FROM roles WHERE id="'.$roleId.'" ');

        return $sql;
    }
    public function fetchRoleHasPermissions($roleId)
    {
        $sql = DB::select(' SELECT permission_id FROM role_has_permissions WHERE role_id="'.$roleId.'" ');

        return $sql;
    }

    public function getDeleteRole($roleId)
    {
        $this->dbDelete("roles", [ "id" => $roleId ]);
        $this->dbDelete("role_has_permissions", [ "role_id" => $roleId ]);
        
        return true;
    }
    public function fetchUserDetails($userId)
    {
        $sql = DB::select('SELECT * FROM users WHERE id ="'.$userId.'" ');

        return $sql;
    }

    // public function updateUserRole($data)
    // {
    //     $dataRoleArray["role"] = $data['userId']->assignRole('Admin');

    //     $this->dbUpdate("users",["id" => $data->userId] ,$dataRoleArray);
    // }

    public function deleteExpenseData($expensesId)
    {
        $this->dbDelete("expenses", [ "id" => $expensesId ]);        
        
        return true;
    }
}