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
 * @property mixed $publication_id
 * @property mixed $full_name
 * @property mixed $content
 */

class Commentaire extends Model
{
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



    public function getAllCommentaire(): array
    {
        try {
            return $this->success(true, Commentaire::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getCommentaireById($id): array
    {
        try {
            $Commentaire = Commentaire::findOrFail($id);
            return $Commentaire ? $this->success(true, $Commentaire) : $this->error(false, $Commentaire);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createCommentaire(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'publication_id' => 'required',
                'full_name' => 'required',
                'content' => 'required'
            ]);
            if (!$validator->fails()){
                $Commentaire = new Commentaire();
                $Commentaire = $this->extend($Commentaire, $request);
                return $this->success(true, $Commentaire);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateCommentaireDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'publication_id' => 'required',
                'full_name' => 'required',
                'content' => 'required'
            ]);
            if (!$validator->fails()){
                $Commentaire = Commentaire::findOrFail($request->input('id'));
                if ($Commentaire){
                    $Commentaire = $this->extend($Commentaire, $request);
                    return $this->success(true, $Commentaire);
                }else{
                    $result = $Commentaire;
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
    public function deleteCommentaire($id): array {
        try {
            $Commentaire = Commentaire::query()->find($id)->deleteOrFail();
            return $Commentaire ? $this->success(true) : $this->error(false, $Commentaire);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Commentaire $Commentaire, Request $request): Commentaire
    {
        $publication_id = $request->input('publication_id');
        $full_name = $request->input('fukk_name');
        $content = $request->input('content');
        $Commentaire->publication_id = $publication_id;
        $Commentaire->full_name = $full_name;
        $Commentaire->content = $content;
        $Commentaire->save();
        return $Commentaire;
    }
}
