<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class CommentaireController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Commentaire $Commentaire
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *      path="/v1/commentaire",
     *      operationId="getAllCommentaire",
     *      tags={"Commentaire"},
     *      summary="GET Commentaire",
     *      description="GET Commentaire",
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
     *                              @OA\Property(property="publication_id", type="string"),
     *                              @OA\Property(property="full_name", type="string"),
     *                              @OA\Property(property="content", type="string"),
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
    public function index(Commentaire $Commentaire): JsonResponse
    {
        $response = $Commentaire->getAllCommentaire();
        $Commetaire =  $this->verifyStatus($response);
        return response()->json(
            $Commentaire,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Commentaire $Commentaire
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/commentaire",
     *      operationId="createCommentaire",
     *      tags={"Commentaire"},
     *      summary="CREATE Commentaire",
     *      description="CREATE Commentaire",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="publication_id", type="string"),
     *                  @OA\Property(property="full_name", type="string"),
     *                  @OA\Property(property="content", type="string"),
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
     *                              @OA\Property(property="publication_id", type="string"),
     *                              @OA\Property(property="full_name", type="string"),
     *                              @OA\Property(property="content", type="string"),
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
    public function store(Request $request,  Commentaire $Commentaire): JsonResponse
    {
        $response = $Commentaire->createCommentaire($request);
        return $this->verifyStatus($response);
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Commentaire $Commentaire
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/commentaire/{id}",
     *      operationId="getCommentaireById",
     *      tags={"Commentaire"},
     *      summary="GET Commentaire BY ID",
     *      description="GET Commentaire",
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
     *                              @OA\Property(property="publication_id", type="string"),
     *                              @OA\Property(property="full_name", type="string"),
     *                              @OA\Property(property="content", type="string"),
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
    public function show($id, Commentaire $Commentaire): JsonResponse
    {
        $response = $Commentaire->getCommentaireById($id);
        $Commetaire =  $this->verifyStatus($response);
        return response()->json(
            $Commentaire,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Commentaire $Commentaire
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/commentaire",
     *      operationId="updateCommentaire",
     *      tags={"Commentaire"},
     *      summary="UPDATE Commentaire BY ID",
     *      description="UPDATE Commentaire",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="publication_id", type="string"),
     *                  @OA\Property(property="full_name", type="string"),
     *                  @OA\Property(property="content", type="string"),
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
     *                              @OA\Property(property="publication_id", type="string"),
     *                              @OA\Property(property="full_name", type="string"),
     *                              @OA\Property(property="content", type="string"),
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
    public function update(Request $request, Commentaire $Commentaire): JsonResponse
    {
        $response = $Commentaire->updateCommentaireDetails($request);
        $Commetaire =  $this->verifyStatus($response);
        return response()->json(
            $Commentaire,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Commentaire $Commentaire
     * @return JsonResponse
     */

    /**
     * @OA\Delete(
     *      path="/v1/commentaire/{id}",
     *      operationId="deleteCommentaire",
     *      tags={"Commentaire"},
     *      summary="DELETE Commentaire BY ID",
     *      description="DELETE Commentaire BY ID",
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
    public function destroy($id,Commentaire $Commentaire): JsonResponse
    {
        $response = $Commentaire->deleteCommentaire($id);
        $Commetaire =  $this->verifyStatus($response);
        return response()->json(
            $Commentaire,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
