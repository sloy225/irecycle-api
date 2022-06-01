<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;
use Throwable;

/**
 * @method static paginate(int $int)
 * @method static findOrFail(mixed $input)
 * @property mixed $role_id
 * @property mixed $permission_id
 */

class Role_permission extends Model
{
    use HasFactory, softDeletes;
    private function success($status = false, $object = []): array
    {
        return [
            'status' => $status,
            'object' => $object,
        ];
    }

    private function error($status = false,  $error = null): array
    {
        return [
            'status' => $status,
            'error' => $error
        ];
    }



    public function getAllRole_permission(): array
    {
        try {
            return $this->success(true, Role_permission::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getRole_permissionById($id): array
    {
        try {
            $Role_permission = Role_permission::findOrFail($id);
            return $Role_permission ? $this->success(true, $Role_permission) : $this->error(false, $Role_permission);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createRole_permission(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'role_id' => 'required',
                'permission_id' => 'required',
            ]);
            if (!$validator->fails()){
                $Role_permission = new Role_permission();
                $Role_permission = $this->extend($Role_permission, $request);
                return $this->success(true, $Role_permission);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateRole_permissionDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'role_id' => 'required',
                'permission_id' => 'required',
            ]);
            if (!$validator->fails()){
                $Role_permission = Role_permission::findOrFail($request->input('id'));
                if ($Role_permission){
                    $Role_permission = $this->extend($Role_permission, $request);
                    return $this->success(true, $Role_permission);
                }else{
                    $result = $Role_permission;
                }
            }
            return $this->error(false, $result ?? $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    /**
     * @throws Throwable
     */
    public function deleteRole_permission($id): array {
        try {
            $Role_permission = Role_permission::query()->find($id)->deleteOrFail();
            return $Role_permission ? $this->success(true) : $this->error(false, $Role_permission);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Role_permission $Role_permission, Request $request): Role_permission
    {
        $role_id = $request->input('role_id');
        $permission_id = $request->input('permision_id');
        $Role_permission->role_id = $role_id;
        $Role_permission->permission_id = $permission_id;
        $Role_permission->save();
        return $Role_permission;
    }
}
