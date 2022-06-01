<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;

use App\Models\Collect;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class CollectController extends Controller
{
   /**
     * Show the form for creating a new resource.
     *
     * @param Collect $Collect
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/collect",
     *      operationId="getAllCollect",
     *      tags={"Collect"},
     *      summary="GET Collect",
     *      description="GET Collect",
     *      security={{"bearerAuth":{}}},
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="ramassage_id", type="string"),
     *                      @OA\Property(property="type_dechet_id", type="string"),
     *                      @OA\Property(property="poids", type="integer"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifié",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Interdit"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Mauvaise demande"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="pas trouvé"
     *   ),
     *  )
     */
    public function index(Collect $Collect): JsonResponse
    {
        $response = $Collect->getAllCollect();
        $Collect = $this->verifyStatus($response);
        return response()->json(
            $Collect,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Collect $Collect
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/collect",
     *      operationId="createCollect",
     *      tags={"Collect"},
     *      summary="CREATE Collect",
     *      description="CREATE Collect",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="ramassage_id", type="string"),
     *                  @OA\Property(property="type_dechet_id", type="string"),
     *                  @OA\Property(property="poids", type="integer"),
     *              ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="ramassage_id", type="string"),
     *                      @OA\Property(property="type_dechet_id", type="string"),
     *                      @OA\Property(property="poids", type="integer"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifié",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Interdit"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Mauvaise demande"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="pas trouvé"
     *   ),
     *  )
     */
    public function store(Request $request,  Collect $Collect): JsonResponse
    {
        $response = $Collect->createCollect($request);
        $Collect = $this->verifyStatus($response);
        return response()->json(
            $Collect,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Collect $Collect
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/collect/{id}",
     *      operationId="getCollectById",
     *      tags={"Collect"},
     *      summary="GET Collect BY ID",
     *      description="GET Collect",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="ramassage_id", type="string"),
     *                      @OA\Property(property="type_dechet_id", type="string"),
     *                      @OA\Property(property="poids", type="integer"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifié",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Interdit"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Mauvaise demande"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="pas trouvé"
     *   ),
     *  )
     */
    public function show($id, Collect $Collect): JsonResponse
    {
        $response = $Collect->getCollectById($id);
        $Collect = $this->verifyStatus($response);
        return response()->json(
            $Collect,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Collect $Collect
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/collect",
     *      operationId="updateCollect",
     *      tags={"Collect"},
     *      summary="UPDATE Collect BY ID",
     *      description="UPDATE Collect",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="ramassage_id", type="string"),
     *                  @OA\Property(property="type_dechet_id", type="string"),
     *                  @OA\Property(property="poids", type="integer"),
     *              ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="ramassage_id", type="string"),
     *                      @OA\Property(property="type_dechet_id", type="string"),
     *                      @OA\Property(property="poids", type="integer"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifié",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Interdit"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Mauvaise demande"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="pas trouvé"
     *   ),
     *  )
     */
    public function update(Request $request, Collect $Collect): JsonResponse
    {
        $response = $Collect->updateCollectDetails($request);
        $Collect = $this->verifyStatus($response);
        return response()->json(
            $Collect,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * @OA\Delete(
     *      path="/v1/collect/{id}",
     *      operationId="deleteCollect",
     *      tags={"Collect"},
     *      summary="DELETE Collect BY ID",
     *      description="DELETE Collect BY ID",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Opération éffectuée",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifié",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Interdit"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Mauvaise demande"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="pas trouvé"
     *   ),
     *  )
     *
     *
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Collect $Collect
     * @return JsonResponse
     * @throws Throwable
     */
    public function destroy($id,Collect $Collect): JsonResponse
    {
        $response = $Collect->deleteCollect($id);
        $Collect = $this->verifyStatus($response);
        return response()->json(
            $Collect,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
