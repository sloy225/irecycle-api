<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

/**
 * @method static paginate(int $int)
 * @method static findOrFail(mixed $input)
 * @property mixed $secteur_id
 * @property mixed $last_name
 * @property mixed $first_name
 * @property mixed $email_collecteur
 * @property mixed $contact
 * @property mixed|string $password
 */

class Collecteur extends Model
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



    public function getAllCollecteur(): array
    {
        try {
            return $this->success(true, Collecteur::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getCollecteurById($id): array
    {
        try {
            $Collecteur = Collecteur::findOrFail($id);
            return $Collecteur ? $this->success(true, $Collecteur) : $this->error(false, $Collecteur);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createCollecteur(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'secteur_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email_collecteur' => 'required|unique:collecteur,email',
                'contact' => 'required|unique:collecteur,contact',
                'password' => 'required',
            ]);
            if (!$validator->fails()){
                $Collecteur = new Collecteur();
                $Collecteur->password = Hash::make($request->input('email_collecteur'));
                $Collecteur = $this->extend($Collecteur, $request);
                return $this->success(true, $Collecteur);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateCollecteurDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'secteur_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email_collecteur' => 'required|unique:collecteur,email',
                'contact' => 'required|unique:collecteur,contact',
            ]);
            if (!$validator->fails()){
                $Collecteur = Collecteur::findOrFail($request->input('id'));
                if ($Collecteur){
                    $Collecteur = $this->extend($Collecteur, $request);
                    return $this->success(true, $Collecteur);
                }else{
                    $result = $Collecteur;
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
    public function deleteCollecteur($id): array {
        try {
            $Collecteur = Collecteur::query()->find($id)->deleteOrFail();
            return $Collecteur ? $this->success(true) : $this->error(false, $Collecteur);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Collecteur $Collecteur, Request $request): Collecteur
    {
        $secteur_id = $request->input('secteur_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $contact = $request->input('contact');
        $email_collecteur = $request->input('email_collecteur');
        $Collecteur->secteur_id = $secteur_id;
        $Collecteur->first_name = $first_name;
        $Collecteur->last_name = $last_name;
        $Collecteur->email_collecteur = $email_collecteur;
        $Collecteur->contact = $contact;
        $Collecteur->save();
        return $Collecteur;
    }
}
