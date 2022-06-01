<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Type_dechet;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class Type_dechetController extends Controller
{
   /**
     * Show the form for creating a new resource.
     *
     * @param Type_dechet $Type_dechet
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *      path="/v1/type_dechet",
     *      operationId="getAllType_dechet",
     *      tags={"Type_dechet"},
     *      summary="GET Type_dechet",
     *      description="GET Type_dechet",
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
     *                              @OA\Property(property="nom_type", type="string"),
     *                              @OA\Property(property="desc_type", type="string"),
     *                              @OA\Property(property="point", type="integer"),
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
    public function index(Type_dechet $Type_dechet): JsonResponse
    {
        $response = $Type_dechet->getAllType_dechet();
        $Type_dechet = $this->verifyStatus($response);
        return response()->json(
            $Type_dechet,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Type_dechet $Type_dechet
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/type_dechet",
     *      operationId="createType_dechet",
     *      tags={"Type_dechet"},
     *      summary="CREATE Type_dechet",
     *      description="CREATE Type_dechet",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="nom_type", type="string"),
     *                  @OA\Property(property="desc_type", type="string"),
     *                  @OA\Property(property="point", type="integer"),
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
     *                              @OA\Property(property="nom_type", type="string"),
     *                              @OA\Property(property="desc_type", type="string"),
     *                              @OA\Property(property="point", type="integer"),
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
    public function store(Request $request,  Type_dechet $Type_dechet): JsonResponse
    {
        $response = $Type_dechet->createType_dechet($request);
        $Type_dechet = $this->verifyStatus($response);
        return response()->json(
            $Type_dechet,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Type_dechet $Type_dechet
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/type_dechet/{id}",
     *      operationId="getType_dechetById",
     *      tags={"Type_dechet"},
     *      summary="GET Type_dechet BY ID",
     *      description="GET Type_dechet",
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
     *                              @OA\Property(property="nom_type", type="string"),
     *                              @OA\Property(property="desc_type", type="string"),
     *                              @OA\Property(property="point", type="integer"),
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
    public function show($id, Type_dechet $Type_dechet): JsonResponse
    {
        $response = $Type_dechet->getType_dechetById($id);
        $Type_dechet = $this->verifyStatus($response);
        return response()->json(
            $Type_dechet,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Type_dechet $Type_dechet
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/type_dechet",
     *      operationId="updateType_dechet",
     *      tags={"Type_dechet"},
     *      summary="UPDATE Type_dechet BY ID",
     *      description="UPDATE Type_dechet",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="nom_type", type="string"),
     *                  @OA\Property(property="desc_type", type="string"),
     *                  @OA\Property(property="point", type="integer"),
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
     *                              @OA\Property(property="nom_type", type="string"),
     *                              @OA\Property(property="desc_type", type="string"),
     *                              @OA\Property(property="point", type="integer"),
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
    public function update(Request $request, Type_dechet $Type_dechet): JsonResponse
    {
        $response = $Type_dechet->updateType_dechetDetails($request);
        $Type_dechet = $this->verifyStatus($response);
        return response()->json(
            $Type_dechet,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Type_dechet $Type_dechet
     * @return JsonResponse
     */

    /**
     * @OA\Delete(
     *      path="/v1/type_dechet/{id}",
     *      operationId="deleteType_dechet",
     *      tags={"Type_dechet"},
     *      summary="DELETE Type_dechet BY ID",
     *      description="DELETE Type_dechet BY ID",
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
    public function destroy($id,Type_dechet $Type_dechet): JsonResponse
    {
        $response = $Type_dechet->deleteType_dechet($id);
        $Type_dechet = $this->verifyStatus($response);
        return response()->json(
            $Type_dechet,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
