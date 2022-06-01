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
 * @property mixed $publiation_id
 * @property mixed $titre
 * @property mixed $type
 * @property mixed $path
 */

class Media extends Model
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



    public function getAllMedia(): array
    {
        try {
            return $this->success(true, Media::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getMediaById($id): array
    {
        try {
            $Media = Media::findOrFail($id);
            return $Media ? $this->success(true, $Media) : $this->error(false, $Media);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createMedia(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'publication_id' => 'required',
                'titre' => 'required',
                'type' => 'required',
                'path' => 'required',
            ]);
            if (!$validator->fails()){
                $Media = new Media();
                $Media = $this->extend($Media, $request);
                return $this->success(true, $Media);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateMediaDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'publication_id' => 'required',
                'titre' => 'required',
                'type' => 'required',
                'path' => 'required',
            ]);
            if (!$validator->fails()){
                $Media = Media::findOrFail($request->input('id'));
                if ($Media){
                    $Media = $this->extend($Media, $request);
                    return $this->success(true, $Media);
                }else{
                    $result = $Media;
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
    public function deleteMedia($id): array {
        try {
            $Media = Media::query()->find($id)->deleteOrFail();
            return $Media ? $this->success(true) : $this->error(false, $Media);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Media $Media, Request $request): Media
    {
        $publiation_id = $request->input('publication_id');
        $titre = $request->input('titre');
        $type = $request->input('type');
        $path = $request->input('path');
        $Media->publiation_id = $publiation_id;
        $Media->titre = $titre;
        $Media->type = $type;
        $Media->path = $path;
        $Media->save();
        return $Media;
    }
}
