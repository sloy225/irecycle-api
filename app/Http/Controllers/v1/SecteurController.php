<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Secteur;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SecteurController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param Secteur $secteur
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/secteur",
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
    public function index(Secteur $secteur): JsonResponse
    {
        $secteur = $secteur->getAllSecteur();
        return response()->json(
            $secteur,
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
     *      path="/secteur",
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
     *                  @OA\Property(property="name", type="string"),
     *                  @OA\Property(property="responsable", type="string"),
     *                  @OA\Property(property="contact", type="string")
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
    public function store(Request $request,  Secteur $secteur): JsonResponse
    {
        $secteur = $secteur->createSecteur($request);
        return response()->json(
            $secteur,
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
     *      path="/secteur/{id}",
     *      operationId="getSecteurById",
     *      tags={"SECTEUR"},
     *      summary="GET SECTEUR BY ID",
     *      description="GET SECTEUR",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
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
    public function show($id, Secteur $secteur): JsonResponse
    {
        $secteur = $secteur->getSecteurById($id);
        return response()->json(
            $secteur,
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
     *      path="/secteur",
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
     *                  @OA\Property(property="name", type="string"),
     *                  @OA\Property(property="responsable", type="string"),
     *                  @OA\Property(property="contact", type="string")
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
    public function update(Request $request, Secteur $secteur): JsonResponse
    {
        $secteur = $secteur->updateSecteurDetails($request);
        return response()->json(
            $secteur,
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
     *      path="/secteur/{id}",
     *      operationId="deleteSecteur",
     *      tags={"SECTEUR"},
     *      summary="DELETE SECTEUR BY ID",
     *      description="DELETE SECTEUR BY ID",
     *      security={{"bearerAuth":{}}},
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
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
    public function destroy($id,Secteur $secteur): JsonResponse
    {
        $secteur = $secteur->updateSecteurDetails($id);
        return response()->json(
            $secteur,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
