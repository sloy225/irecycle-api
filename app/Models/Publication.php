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
 * @property mixed $titre
 * @property mixed $content
 * @property mixed $media
 */

class Publication extends Model
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



    public function getAllPublication(): array
    {
        try {
            return $this->success(true, Publication::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getPublicationById($id): array
    {
        try {
            $Publication = Publication::findOrFail($id);
            return $Publication ? $this->success(true, $Publication) : $this->error(false, $Publication);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createPublication(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'tite' => 'required',
                'content' => 'required',
                'media' => 'required',
            ]);
            if (!$validator->fails()){
                $Publication = new Publication();
                $Publication = $this->extend($Publication, $request);
                return $this->success(true, $Publication);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updatePublicationDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'tite' => 'required',
                'content' => 'required',
                'media' => 'required',
            ]);
            if (!$validator->fails()){
                $Publication = Publication::findOrFail($request->input('id'));
                if ($Publication){
                    $Publication = $this->extend($Publication, $request);
                    return $this->success(true, $Publication);
                }else{
                    $result = $Publication;
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
    public function deletePublication($id): array {
        try {
            $Publication = Publication::query()->find($id)->deleteOrFail();
            return $Publication ? $this->success(true) : $this->error(false, $Publication);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Publication $Publication, Request $request): Publication
    {
        $titre = $request->input('titre');
        $content = $request->input('content');
        $media = $request->input('media');
        $titre->first_name = $titre;
        $content->last_name = $content;
        $media->email = $media;
        $Publication->save();
        return $Publication;
    }
}
