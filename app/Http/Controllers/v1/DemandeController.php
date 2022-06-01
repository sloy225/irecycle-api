<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class DemandeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Demande $Demande
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *      path="/v1/demande",
     *      operationId="getAllDemande",
     *      tags={"Demande"},
     *      summary="GET Demande",
     *      description="GET Demande",
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
     *                              @OA\Property(property="client_id", type="string"),
     *                              @OA\Property(property="ramassage_id", type="string"),
     *                              @OA\Property(property="date_prevu", type="date"),
     *                              @OA\Property(property="periode_prevu", type="string"),
     *                              @OA\Property(property="point_recuperation", type="string"),
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
    public function index(Demande $Demande): JsonResponse
    {
        $response = $Demande->getAllDemande();
        $Demande = $this->verifyStatus($response);
        return response()->json(
            $Demande,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Demande $Demande
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/demande",
     *      operationId="createDemande",
     *      tags={"Demande"},
     *      summary="CREATE Demande",
     *      description="CREATE Demande",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="client_id", type="string"),
     *                  @OA\Property(property="ramassage_id", type="string"),
     *                  @OA\Property(property="date_prevu", type="date"),
     *                  @OA\Property(property="periode_prevu", type="string"),
     *                  @OA\Property(property="point_recuperation", type="string"),
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
     *                              @OA\Property(property="client_id", type="string"),
     *                              @OA\Property(property="ramassage_id", type="string"),
     *                              @OA\Property(property="date_prevu", type="date"),
     *                              @OA\Property(property="periode_prevu", type="string"),
     *                              @OA\Property(property="point_recuperation", type="string"),
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
    public function store(Request $request,  Demande $Demande): JsonResponse
    {
        $response = $Demande->createDemande($request);
        $Demande = $this->verifyStatus($response);
        return response()->json(
            $Demande,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Demande $Demande
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/demande/{id}",
     *      operationId="getDemandeById",
     *      tags={"Demande"},
     *      summary="GET Demande BY ID",
     *      description="GET Demande",
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
     *                              @OA\Property(property="client_id", type="string"),
     *                              @OA\Property(property="ramassage_id", type="string"),
     *                              @OA\Property(property="date_prevu", type="date"),
     *                              @OA\Property(property="periode_prevu", type="string"),
     *                              @OA\Property(property="point_recuperation", type="string"),
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
    public function show($id, Demande $Demande): JsonResponse
    {
        $response = $Demande->getDemandeById($id);
        $Demande = $this->verifyStatus($response);
        return response()->json(
            $Demande,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Demande $Demande
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/demande",
     *      operationId="updateDemande",
     *      tags={"Demande"},
     *      summary="UPDATE Demande BY ID",
     *      description="UPDATE Demande",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="client_id", type="string"),
     *                  @OA\Property(property="ramassage_id", type="string"),
     *                  @OA\Property(property="date_prevu", type="date"),
     *                  @OA\Property(property="periode_prevu", type="string"),
     *                  @OA\Property(property="point_recuperation", type="string"),
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
     *                              @OA\Property(property="client_id", type="string"),
     *                              @OA\Property(property="ramassage_id", type="string"),
     *                              @OA\Property(property="date_prevu", type="date"),
     *                              @OA\Property(property="periode_prevu", type="string"),
     *                              @OA\Property(property="point_recuperation", type="string"),
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
    public function update(Request $request, Demande $Demande): JsonResponse
    {
        $response = $Demande->updateDemandeDetails($request);
        $Demande = $this->verifyStatus($response);
        return response()->json(
            $Demande,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Demande $Demande
     * @return JsonResponse
     */

    /**
     * @OA\Delete(
     *      path="/v1/demande/{id}",
     *      operationId="deleteDemande",
     *      tags={"Demande"},
     *      summary="DELETE Demande BY ID",
     *      description="DELETE Demande BY ID",
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
    public function destroy($id,Demande $Demande): JsonResponse
    {
        $response = $Demande->deleteDemande($id);
        $Demande = $this->verifyStatus($response);
        return response()->json(
            $Demande,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
