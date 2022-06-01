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
 * @property mixed $nom_permission
 * @property mixed $key_name
 * @property mixed $resources
 */


class Permission extends Model
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



    public function getAllPermission(): array
    {
        try {
            return $this->success(true, Permission::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getPermissionById($id): array
    {
        try {
            $Permission = Permission::findOrFail($id);
            return $Permission ? $this->success(true, $Permission) : $this->error(false, $Permission);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createPermission(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'nom_permission' => 'required',
                'key_name' => 'required',
                'resources' => 'required',
            ]);
            if (!$validator->fails()){
                $Permission = new Permission();
                $Permission = $this->extend($Permission, $request);
                return $this->success(true, $Permission);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updatePermissionDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'nom_permission' => 'required',
                'key_name' => 'required',
                'resources' => 'required'
            ]);
            if (!$validator->fails()){
                $Permission = Permission::findOrFail($request->input('id'));
                if ($Permission){
                    $Permission = $this->extend($Permission, $request);
                    return $this->success(true, $Permission);
                }else{
                    $result = $Permission;
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
    public function deletePermission($id): array {
        try {
            $Permission = Permission::query()->find($id)->deleteOrFail();
            return $Permission ? $this->success(true) : $this->error(false, $Permission);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Permission $Permission, Request $request): Permission
    {
        $nom_permission = $request->input('mon_permission');
        $key_name = $request->input('key_name');
        $resources = $request->input('resources');
        $Permission->nom_permission = $nom_permission;
        $Permission->key_name = $key_name;
        $Permission->resources = $resources;
        $Permission->save();
        return $Permission;
    }
}
