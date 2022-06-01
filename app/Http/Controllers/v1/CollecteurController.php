<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Collecteur;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class CollecteurController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Collecteur $Collecteur
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *      path="/v1/collecteur",
     *      operationId="getAllCollecteur",
     *      tags={"Collecteur"},
     *      summary="GET Collecteur",
     *      description="GET Collecteur",
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
     *                              @OA\Property(property="secteur_id", type="string"),
     *                              @OA\Property(property="last_name", type="string"),
     *                              @OA\Property(property="first_name", type="integer"),
     *                              @OA\Property(property="contact", type="string"),
     *                              @OA\Property(property="email_collecteur", type="string"),
     *                              @OA\Property(property="password", type="string"),
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
    public function index(Collecteur $Collecteur): JsonResponse
    {
        $response = $Collecteur->getAllCollecteur();
        $Collecteur = $this->verifyStatus($response);
        return response()->json(
            $Collecteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Collecteur $Collecteur
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/collecteur",
     *      operationId="createCollecteur",
     *      tags={"Collecteur"},
     *      summary="CREATE Collecteur",
     *      description="CREATE Collecteur",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="secteur_id", type="string"),
     *                  @OA\Property(property="last_name", type="string"),
     *                  @OA\Property(property="first_name", type="integer"),
     *                  @OA\Property(property="contact", type="string"),
     *                  @OA\Property(property="email_collecteur", type="string"),
     *                  @OA\Property(property="password", type="string"),
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
     *                              @OA\Property(property="secteur_id", type="string"),
     *                              @OA\Property(property="last_name", type="string"),
     *                              @OA\Property(property="first_name", type="integer"),
     *                              @OA\Property(property="contact", type="string"),
     *                              @OA\Property(property="email_collecteur", type="string"),
     *                              @OA\Property(property="password", type="string"),
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
    public function store(Request $request,  Collecteur $Collecteur): JsonResponse
    {
        $response = $Collecteur->createCollecteur($request);
        $Collecteur = $this->verifyStatus($response);
        return response()->json(
            $Collecteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Collecteur $Collecteur
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/collecteur/{id}",
     *      operationId="getCollecteurById",
     *      tags={"Collecteur"},
     *      summary="GET Collecteur BY ID",
     *      description="GET Collecteur",
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
     *                              @OA\Property(property="secteur_id", type="string"),
     *                              @OA\Property(property="last_name", type="string"),
     *                              @OA\Property(property="first_name", type="integer"),
     *                              @OA\Property(property="contact", type="string"),
     *                              @OA\Property(property="email_collecteur", type="string"),
     *                              @OA\Property(property="password", type="string"),
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
    public function show($id, Collecteur $Collecteur): JsonResponse
    {
        $response = $Collecteur->getCollecteurById($id);
        $Collecteur = $this->verifyStatus($response);
        return response()->json(
            $Collecteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Collecteur $Collecteur
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/collecteur",
     *      operationId="updateCollecteur",
     *      tags={"Collecteur"},
     *      summary="UPDATE Collecteur BY ID",
     *      description="UPDATE Collecteur",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="secteur_id", type="string"),
     *                 @OA\Property(property="last_name", type="string"),
     *                 @OA\Property(property="first_name", type="integer"),
     *                 @OA\Property(property="contact", type="string"),
     *                 @OA\Property(property="email_collecteur", type="string"),
     *                 @OA\Property(property="password", type="string"),
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
     *                             @OA\Property(property="id", type="integer"),
     *                              @OA\Property(property="secteur_id", type="string"),
     *                              @OA\Property(property="last_name", type="string"),
     *                              @OA\Property(property="first_name", type="integer"),
     *                              @OA\Property(property="contact", type="string"),
     *                              @OA\Property(property="email_collecteur", type="string"),
     *                              @OA\Property(property="password", type="string"),
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
    public function update(Request $request, Collecteur $Collecteur): JsonResponse
    {
        $response = $Collecteur->updateCollecteurDetails($request);
        $Collecteur = $this->verifyStatus($response);
        return response()->json(
            $Collecteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Collecteur $Collecteur
     * @return JsonResponse
     */

    /**
     * @OA\Delete(
     *      path="/v1/collecteur/{id}",
     *      operationId="deleteCollecteur",
     *      tags={"Collecteur"},
     *      summary="DELETE Collecteur BY ID",
     *      description="DELETE Collecteur BY ID",
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
    public function destroy($id,Collecteur $Collecteur): JsonResponse
    {
        $response = $Collecteur->deleteCollecteur($id);
        $Collecteur = $this->verifyStatus($response);
        return response()->json(
            $Collecteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
