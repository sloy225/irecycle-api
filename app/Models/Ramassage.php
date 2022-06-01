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
 * @property mixed $collecteutr_id
 * @property mixed $commune_id
 * @property mixed $date_ramassage
 * @property mixed $coordonnes
 * @property mixed $total_point
 * @property mixed $status
 */

class Ramassage extends Model
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



    public function getAllRamassage(): array
    {
        try {
            return $this->success(true, Ramassage::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getRamassageById($id): array
    {
        try {
            $Ramassage = Ramassage::findOrFail($id);
            return $Ramassage ? $this->success(true, $Ramassage) : $this->error(false, $Ramassage);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createRamassage(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'collecteur_id' => 'required',
                'commune_id' => 'required',
                'date_ramassage' => 'required',
                'coordonnes' => 'required',
                'total_point' => 'required',
                'status' => 'required',
            ]);
            if (!$validator->fails()){
                $Ramassage = new Ramassage();
                $Ramassage = $this->extend($Ramassage, $request);
                return $this->success(true, $Ramassage);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateRamassageDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'collecteur_id' => 'required',
                'commune_id' => 'required',
                'date_ramassage' => 'required',
                'coordonnes' => 'required',
                'total_point' => 'required',
                'status' => 'required',
            ]);
            if (!$validator->fails()){
                $Ramassage = Ramassage::findOrFail($request->input('id'));
                if ($Ramassage){
                    $Ramassage = $this->extend($Ramassage, $request);
                    return $this->success(true, $Ramassage);
                }else{
                    $result = $Ramassage;
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
    public function deleteRamassage($id): array {
        try {
            $Ramassage = Ramassage::query()->find($id)->deleteOrFail();
            return $Ramassage ? $this->success(true) : $this->error(false, $Ramassage);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Ramassage $Ramassage, Request $request): Ramassage
    {
        $collecteutr_id = $request->input('collecteur_id');
        $commune_id = $request->input('commune_id');
        $date_ramassage = $request->input('date_ramassage');
        $coordonnes = $request->input('coordonnes');
        $total_point = $request->input('total_points');
        $status = $request->input('status');
        $Ramassage->collecteutr_id = $collecteutr_id;
        $Ramassage->commune_id = $commune_id;
        $Ramassage->date_ramassage = $date_ramassage;
        $Ramassage->coordonnes = $coordonnes;
        $Ramassage->total_point = $total_point;
        $Ramassage->status = $status;
        $Ramassage->save();
        return $Ramassage;
    }
}
