<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Secteur;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class SecteurController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Secteur $secteur
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *      path="/v1/secteur",
     *      operationId="getAllSecteur",
     *      tags={"SECTEUR"},
     *      summary="GET SECTEUR",
     *      description="GET SECTEUR",
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
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="nom_secteur", type="string"),
     *                              @OA\Property(property="responsable", type="integer"),
     *                              @OA\Property(property="contact_secteur", type="string"),
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
     *          description="Non authentifi??",
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
     *      description="pas trouv??"
     *   ),
     *  )
     */
    public function index(Secteur $secteur): JsonResponse
    {
        $response = $secteur->getAllSecteur();
        $Secteur = $this->verifyStatus($response);
        return response()->json(
            $Secteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Secteur $secteur
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/secteur",
     *      operationId="createSecteur",
     *      tags={"SECTEUR"},
     *      summary="CREATE Secteur",
     *      description="CREATE Secteur",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="commune_id", type="string"),
     *                  @OA\Property(property="nom_secteur", type="string"),
     *                  @OA\Property(property="responsable", type="string"),
     *                  @OA\Property(property="contact_secteur", type="string")
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
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="name", type="string"),
     *                              @OA\Property(property="responsable", type="integer"),
     *                              @OA\Property(property="contact", type="string"),
     *                              @OA\Property(property="update_at", type="string"),
     *                              @OA\Property(property="delete_at", type="string"),
     *                              @OA\Property(property="commune_name", type="string"),
     *                          ),
     *                      ),
     *                  ),
     *              ),
     *          @OA\Property(property="error", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifi??",
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
     *      description="pas trouv??"
     *   ),
     *  )
     */
    public function store(Request $request,  Secteur $secteur): JsonResponse
    {
        $response = $secteur->createSecteur($request);
        $Secteur = $this->verifyStatus($response);
        return response()->json(
            $Secteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Secteur $secteur
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/secteur/{id}",
     *      operationId="getSecteurById",
     *      tags={"SECTEUR"},
     *      summary="GET SECTEUR BY ID",
     *      description="GET SECTEUR",
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
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="nom_secteur", type="string"),
     *                              @OA\Property(property="responsable", type="integer"),
     *                              @OA\Property(property="contact_secteur", type="string"),
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
     *          description="Non authentifi??",
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
     *      description="pas trouv??"
     *   ),
     *  )
     */
    public function show($id, Secteur $secteur): JsonResponse
    {
        $response = $secteur->getSecteurById($id);
        $Secteur = $this->verifyStatus($response);
        return response()->json(
            $Secteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Secteur $secteur
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/secteur",
     *      operationId="updateSecteur",
     *      tags={"SECTEUR"},
     *      summary="UPDATE SECTEUR BY ID",
     *      description="UPDATE SECTEUR",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="string"),
     *                  @OA\Property(property="commune_id", type="string"),
     *                  @OA\Property(property="nom_secteur", type="string"),
     *                  @OA\Property(property="responsable", type="string"),
     *                  @OA\Property(property="contact_secteur", type="string")
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
     *                              @OA\Property(property="commune_id", type="string"),
     *                              @OA\Property(property="nom_secteur", type="string"),
     *                              @OA\Property(property="responsable", type="integer"),
     *                              @OA\Property(property="contact_secteur", type="string"),
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
     *          description="Non authentifi??",
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
     *      description="pas trouv??"
     *   ),
     *  )
     */
    public function update(Request $request, Secteur $secteur): JsonResponse
    {
        $response = $secteur->updateSecteurDetails($request);
        $Secteur = $this->verifyStatus($response);
        return response()->json(
            $Secteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Secteur $secteur
     * @return JsonResponse
     */

    /**
     * @OA\Delete(
     *      path="/v1/secteur/{id}",
     *      operationId="deleteSecteur",
     *      tags={"SECTEUR"},
     *      summary="DELETE SECTEUR BY ID",
     *      description="DELETE SECTEUR BY ID",
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
     *          description="Op??ration ??ffectu??e",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifi??",
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
     *      description="pas trouv??"
     *   ),
     *  )
     */
    public function destroy($id,Secteur $secteur): JsonResponse
    {
        $response = $secteur->deleteSecteur($id);
        $Secteur = $this->verifyStatus($response);
        return response()->json(
            $Secteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
