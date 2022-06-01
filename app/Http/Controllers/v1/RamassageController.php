<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Ramassage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class RamassageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Ramassage $Ramassage
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *      path="/v1/ramassage",
     *      operationId="getAllRamassage",
     *      tags={"Ramassage"},
     *      summary="GET Ramassage",
     *      description="GET Ramassage",
     *      security={{"bearerAuth":{}}},
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(
     *                  property="object",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="data",
     *                          type="array",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="collecteur_id", type="string"),
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="date_ramassage", type="date"),
     *                              @OA\Property(property="coordonnes", type="string"),
     *                              @OA\Property(property="total_points", type="integer"),
     *                              @OA\Property(property="status", type="string"),
     *                              @OA\Property(property="created_at", type="string"),
     *                              @OA\Property(property="update_at", type="string"),
     *                              @OA\Property(property="delete_at", type="string"),
     *                          ),
     *                      ),
     *                  ),
     *              ),
     *          @OA\Property(property="error", type="string"),
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
    public function index(Ramassage $Ramassage): JsonResponse
    {
        $response = $Ramassage->getAllRamassage();
        $Ramassage = $this->verifyStatus($response);
        return response()->json(
            $Ramassage,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Ramassage $Ramassage
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/ramassage",
     *      operationId="createRamassage",
     *      tags={"Ramassage"},
     *      summary="CREATE Ramassage",
     *      description="CREATE Ramassage",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="collecteur_id", type="string"),
     *                  @OA\Property(property="commune_id", type="string"),
     *                  @OA\Property(property="date_ramassage", type="date"),
     *                  @OA\Property(property="coordonnes", type="string"),
     *                  @OA\Property(property="total_points", type="integer"),
     *                  @OA\Property(property="status", type="string"),
     *              ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(
     *                  property="object",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="data",
     *                          type="array",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="collecteur_id", type="string"),
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="date_ramassage", type="date"),
     *                              @OA\Property(property="coordonnes", type="string"),
     *                              @OA\Property(property="total_points", type="integer"),
     *                              @OA\Property(property="status", type="string"),
     *                              @OA\Property(property="created_at", type="string"),
     *                              @OA\Property(property="update_at", type="string"),
     *                              @OA\Property(property="delete_at", type="string"),
     *                          ),
     *                      ),
     *                  ),
     *              ),
     *          @OA\Property(property="error", type="string"),
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
    public function store(Request $request,  Ramassage $Ramassage): JsonResponse
    {
        $response = $Ramassage->createRamassage($request);
        $Ramassage = $this->verifyStatus($response);
        return response()->json(
            $Ramassage,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Ramassage $Ramassage
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/ramassage/{id}",
     *      operationId="getRamassageById",
     *      tags={"Ramassage"},
     *      summary="GET Ramassage BY ID",
     *      description="GET Ramassage",
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
     *                  property="object",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="data",
     *                          type="array",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="collecteur_id", type="string"),
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="date_ramassage", type="date"),
     *                              @OA\Property(property="coordonnes", type="string"),
     *                              @OA\Property(property="total_points", type="integer"),
     *                              @OA\Property(property="status", type="string"),
     *                              @OA\Property(property="created_at", type="string"),
     *                              @OA\Property(property="update_at", type="string"),
     *                              @OA\Property(property="delete_at", type="string"),
     *                          ),
     *                      ),
     *                  ),
     *              ),
     *          @OA\Property(property="error", type="string"),
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
    public function show($id, Ramassage $Ramassage): JsonResponse
    {
        $response = $Ramassage->getRamassageById($id);
        $Ramassage = $this->verifyStatus($response);
        return response()->json(
            $Ramassage,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ramassage $Ramassage
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/ramassage",
     *      operationId="updateRamassage",
     *      tags={"Ramassage"},
     *      summary="UPDATE Ramassage BY ID",
     *      description="UPDATE Ramassage",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="collecteur_id", type="string"),
     *                  @OA\Property(property="commune_id", type="string"),
     *                  @OA\Property(property="date_ramassage", type="date"),
     *                  @OA\Property(property="coordonnes", type="string"),
     *                  @OA\Property(property="total_points", type="integer"),
     *                  @OA\Property(property="status", type="string"),
     *              ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="boolean"),
     *              @OA\Property(
     *                  property="object",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="data",
     *                          type="array",
     *                          @OA\Items(
     *                              @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="collecteur_id", type="string"),
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="date_ramassage", type="date"),
     *                              @OA\Property(property="coordonnes", type="string"),
     *                              @OA\Property(property="total_points", type="integer"),
     *                              @OA\Property(property="status", type="string"),
     *                              @OA\Property(property="created_at", type="string"),
     *                              @OA\Property(property="update_at", type="string"),
     *                              @OA\Property(property="delete_at", type="string"),
     *                          ),
     *                      ),
     *                  ),
     *              ),
     *          @OA\Property(property="error", type="string"),
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
    public function update(Request $request, Ramassage $Ramassage): JsonResponse
    {
        $response = $Ramassage->updateRamassageDetails($request);
        $Ramassage = $this->verifyStatus($response);
        return response()->json(
            $Ramassage,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Ramassage $Ramassage
     * @return JsonResponse
     */

    /**
     * @OA\Delete(
     *      path="/v1/ramassage/{id}",
     *      operationId="deleteRamassage",
     *      tags={"Ramassage"},
     *      summary="DELETE Ramassage BY ID",
     *      description="DELETE Ramassage BY ID",
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
     */
    public function destroy($id,Ramassage $Ramassage): JsonResponse
    {
        $response = $Ramassage->deleteRamassage($id);
        $Ramassage = $this->verifyStatus($response);
        return response()->json(
            $Ramassage,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
