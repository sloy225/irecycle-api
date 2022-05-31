<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

/**
 * @method static paginate(int $int)
 * @method static find(mixed $input)
 * @method static findOrFail($id)
 * @property mixed $commune_id
 * @property mixed $nom_secteur
 * @property mixed $responsable
 * @property mixed $contact_secteur
 */
class Secteur extends Model
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



    public function getAllSecteur(): array
    {
        try {
            return $this->success(true, Secteur::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getSecteurById($id): array
    {
        try {
            $secteur = Secteur::findOrFail($id);
            return $secteur ? $this->success(true, $secteur) : $this->error(false, $secteur);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createSecteur(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'commune_id' => 'required',
                'nom_secteur' => 'required|unique:secteurs,nom_secteur',
                'responsable' => 'required',
                'contact_secteur' => 'required|unique:secteurs,contact_secteur',
            ]);
            if (!$validator->fails()){
                $commune_id = $request->input('commune_id');
                $nom_secteur = $request->input('nom_secteur');
                $contact_secteur = $request->input('responsable');
                $responsable = $request->input('contact_secteur');
                $secteur = new Secteur();
                $secteur->commune_id = $commune_id;
                $secteur->nom_secteur = $nom_secteur;
                $secteur->responsable = $responsable;
                $secteur->contact_secteur = $contact_secteur;
                $secteur->save();
                return $this->success(true, $secteur);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateSecteurDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'commune_id' => 'required',
                'nom_secteur' => 'required',
                'responsable' => 'required',
                'contact_secteur' => 'required'
            ]);
            if (!$validator->fails()){
                $secteur = Secteur::find($request->input('id'));
                if ($secteur){
                    $commune_id = $request->input('commune_id');
                    $nom_secteur = $request->input('nom_secteur');
                    $contact_secteur = $request->input('responsable');
                    $responsable = $request->input('contact_secteur');
                    $secteur->commune_id = $commune_id;
                    $secteur->nom_secteur = $nom_secteur;
                    $secteur->responsable = $responsable;
                    $secteur->contact_secteur = $contact_secteur;
                    $secteur->save();
                    $result = $this->success(true, Secteur::find($request->input('id')));
                }else{
                    $result = $this->error(false, "secteur does not exist");
                }
            }
            return $this->error(false, $result ?? $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function deleteSecteur($id): array {
        try {
            try {
                Secteur::query()->find($id)->deleteOrFail();
                return $this->success(true, "success");
            } catch (Throwable $e) {
                return $this->error(false, $e);
            }
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }
}
