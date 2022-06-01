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
 * @property mixed $client_id
 * @property mixed $ramassage_id
 * @property mixed $date_prevu
 * @property mixed $periode_prevu
 * @property mixed $point_recuperation
 */

class Demande extends Model
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



    public function getAllDemande(): array
    {
        try {
            return $this->success(true, Demande::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getClientById($id): array
    {
        try {
            $Demande = Demande::findOrFail($id);
            return $Demande ? $this->success(true, $Demande) : $this->error(false, $Demande);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createDemande(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'clinet_id' => 'required',
                'ramassage_id' => 'required',
                'date_prevu' => 'required|unique:clients,email',
                'periode_prevu' => 'required|unique:clients,contact',
                'point_recuperation' => 'required',
            ]);
            if (!$validator->fails()){
                $Demande = new Demande();
                $Demande = $this->extend($Demande, $request);
                return $this->success(true, $Demande);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateDemandeDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'clinet_id' => 'required',
                'ramassage_id' => 'required',
                'date_prevu' => 'required|unique:clients,email',
                'periode_prevu' => 'required|unique:clients,contact',
                'point_recuperation' => 'required',
            ]);
            if (!$validator->fails()){
                $Demande = Demande::findOrFail($request->input('id'));
                if ($Demande){
                    $Demande = $this->extend($Demande, $request);
                    return $this->success(true, $Demande);
                }else{
                    $result = $Demande;
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
    public function deleteDemande($id): array {
        try {
            $Demande = Demande::query()->find($id)->deleteOrFail();
            return $Demande ? $this->success(true) : $this->error(false, $Demande);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Demande $Demande, Request $request): Demande
    {
        $client_id = $request->input('client_id');
        $ramassage_id = $request->input('ramassage_id');
        $date_prevu = $request->input('date_prevu');
        $periode_prevu = $request->input('periode_prevu');
        $point_recuperation = $request->input('point_recuperation');
        $Demande->client_id = $client_id;
        $Demande->ramassage_id = $ramassage_id;
        $Demande->date_prevu = $date_prevu;
        $Demande->periode_prevu = $periode_prevu;
        $Demande->point_recuperation = $point_recuperation;
        $Demande->save();
        return $Demande;
    }
}
