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
 * @property mixed $ramassage_id
 * @property mixed $type_dechet_id
 * @property mixed $poids
 */

class Collect extends Model
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



    public function getAllCollect(): array
    {
        try {
            return $this->success(true, Collecteur::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getCollectById($id): array
    {
        try {
            $Collect = Collect::findOrFail($id);
            return $Collect ? $this->success(true, $Collect) : $this->error(false, $Collect);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createCollect(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'ramassage_id' => 'required',
                'type_dechet_id' => 'required',
                'poids' => 'required'
            ]);
            if (!$validator->fails()){
                $Collect = new Collect();
                $Collect = $this->extend($Collect, $request);
                return $this->success(true, $Collect);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateCollectDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'ramassage_id' => 'required',
                'type_dechet_id' => 'required',
                'poids' => 'required'
            ]);
            if (!$validator->fails()){
                $Collect = Collect::findOrFail($request->input('id'));
                if ($Collect){
                    $Collect = $this->extend($Collect, $request);
                    return $this->success(true, $Collect);
                }else{
                    $result = $Collect;
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
    public function deleteCollect($id): array {
        try {
            $Collect = Collect::query()->find($id)->deleteOrFail();
            return $Collect ? $this->success(true) : $this->error(false, $Collect);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Collect $Collect, Request $request): Collect
    {
        $ramassage_id = $request->input('ramassage_id');
        $type_dechet_id = $request->input('last_name');
        $poids = $request->input('contact');
        $Collect->ramassage_id = $ramassage_id;
        $Collect->type_dechet_id = $type_dechet_id;
        $Collect->poids = $poids;
        $Collect->save();
        return $Collect;
    }
}
