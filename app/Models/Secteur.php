<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use stdClass;

/**
 * @method static paginate(int $int)
 * @method static find(mixed $input)
 * @property mixed $commune_id
 * @property mixed $name
 * @property mixed $responsable
 * @property mixed $contact
 */
class Secteur extends Model
{
    use HasFactory;
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
            return $this->success(true, Secteur::find($id));
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createSecteur(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'commune_id' => 'required',
                'name' => 'required|unique:secteurs,name',
                'responsable' => 'required',
                'contact' => 'required|unique:secteurs,contact',
            ]);
            if (!$validator->fails()){
                $commune_id = $request->input('commune_id');
                $name = $request->input('name');
                $contact = $request->input('responsable');
                $responsable = $request->input('contact');
                $secteur = new Secteur();
                $secteur->commune_id = $commune_id;
                $secteur->name = $name;
                $secteur->responsable = $responsable;
                $secteur->contact = $contact;
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
                'name' => 'required',
                'responsable' => 'required',
                'contact' => 'required'
            ]);
            if (!$validator->fails()){
                $secteur = Secteur::find($request->input('id'));
                if ($secteur){
                    $commune_id = $request->input('commune_id');
                    $name = $request->input('name');
                    $contact = $request->input('responsable');
                    $responsable = $request->input('contact');
                    $secteur->commune_id = $commune_id;
                    $secteur->name = $name;
                    $secteur->responsable = $responsable;
                    $secteur->contact = $contact;
                    $secteur->save();
                    $result = $this->success(true, Secteur::find($request->input('id')));
                }else{
                    $result = $this->error(false, "secteur does not exist");
                }
            }
            return $this->error(false, $result ?? $validator->failed());
        }catch (Exception $e){
            return $this->success(false, $e);
        }
    }

    public function deleteSecteur($id): array {
        try {
            $secteur = Secteur::query()->find($id)->delete();
            if ($secteur){
                return $this->success(true, "Opération éffectuée");
            }
            return $this->error(false, 'Action failed');
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }
}
