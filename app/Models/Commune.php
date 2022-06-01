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
 * @property mixed $commune_nom
 */

class Commune extends Model
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



    public function getAllCommune(): array
    {
        try {
            return $this->success(true, Commune::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getCommuneById($id): array
    {
        try {
            $Commune = Commune::findOrFail($id);
            return $Commune ? $this->success(true, $Commune) : $this->error(false, $Commune);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createCommune(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'commne_nom' => 'required',
            ]);
            if (!$validator->fails()){
                $Commune = new Commune();
                $Commune = $this->extend($Commune, $request);
                return $this->success(true, $Commune);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateCommuneDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'commune_id' => 'required',
                ]);
            if (!$validator->fails()){
                $Commune = Commune::findOrFail($request->input('id'));
                if ($Commune){
                    $Commune = $this->extend($Commune, $request);
                    return $this->success(true, $Commune);
                }else{
                    $result = $Commune;
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
    public function deleteCommune($id): array {
        try {
            $Commune = Commune::query()->find($id)->deleteOrFail();
            return $Commune ? $this->success(true) : $this->error(false, $Commune);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Commune $Commune, Request $request): Commune
    {
        $commune_nom = $request->input('commune_nom');
        $Commune->commune_nom = $commune_nom;
        $Commune->save();
        return $Commune;
    }
}
