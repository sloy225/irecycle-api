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
 * @property mixed $nom_type
 * @property mixed $desc_type
 * @property mixed $point
 */

class Type_dechet extends Model
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



    public function getAllType_dechet(): array
    {
        try {
            return $this->success(true, Type_dechet::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getType_dechetById($id): array
    {
        try {
            $Type_dechet = Type_dechet::findOrFail($id);
            return $Type_dechet ? $this->success(true, $Type_dechet) : $this->error(false, $Type_dechet);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createType_dechet(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'nom_type' => 'required',
                'desc_type' => 'required',
                'point' => 'required',
            ]);
            if (!$validator->fails()){
                $Type_dechet = new Type_dechet();
                $Type_dechet = $this->extend($Type_dechet, $request);
                return $this->success(true, $Type_dechet);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateType_dechetDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'nom_type' => 'required',
                'desc_type' => 'required',
                'point' => 'required',
            ]);
            if (!$validator->fails()){
                $Type_dechet = Type_dechet::findOrFail($request->input('id'));
                if ($Type_dechet){
                    $Type_dechet = $this->extend($Type_dechet, $request);
                    return $this->success(true, $Type_dechet);
                }else{
                    $result = $Type_dechet;
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
    public function deleteType_dechet($id): array {
        try {
            $Type_dechet = Type_dechet::query()->find($id)->deleteOrFail();
            return $Type_dechet ? $this->success(true) : $this->error(false, $Type_dechet);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Type_dechet $Type_dechet, Request $request): Type_dechet
    {
        $nom_type = $request->input('nom_type');
        $desc_type = $request->input('desc_type');
        $point = $request->input('point');
        $Type_dechet->nom_type = $nom_type;
        $Type_dechet->desc_type = $desc_type;
        $Type_dechet->point = $point;
        $Type_dechet->save();
        return $Type_dechet;
    }
}
