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
 * @property mixed $nome_role
 */

class Role extends Model
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



    public function getAllRole(): array
    {
        try {
            return $this->success(true, Role::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getRoleById($id): array
    {
        try {
            $Role = Role::findOrFail($id);
            return $Role ? $this->success(true, $Role) : $this->error(false, $Role);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createRole(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'nom_role' => 'required',
            ]);
            if (!$validator->fails()){
                $Role = new Role();
                $Role = $this->extend($Role, $request);
                return $this->success(true, $Role);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateRoleDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'nom_role' => 'required',
            ]);
            if (!$validator->fails()){
                $Role = Role::findOrFail($request->input('id'));
                if ($Role){
                    $Role = $this->extend($Role, $request);
                    return $this->success(true, $Role);
                }else{
                    $result = $Role;
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
    public function deleteRole($id): array {
        try {
            $Role = Role::query()->find($id)->deleteOrFail();
            return $Role ? $this->success(true) : $this->error(false, $Role);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Role $Role, Request $request): Role
    {
        $nom_role = $request->input('nom_role');
        $Role->nom_role = $nom_role;
        $Role->save();
        return $Role;
    }
}
