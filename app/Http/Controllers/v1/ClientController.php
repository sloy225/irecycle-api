<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use Throwable;

class ClientController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Client $client
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/client",
     *      operationId="getAllClient",
     *      tags={"CLIENT"},
     *      summary="GET CLIENT",
     *      description="GET CLIENT",
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
     *                      @OA\Property(property="first_name", type="string"),
     *                      @OA\Property(property="last_name", type="string"),
     *                      @OA\Property(property="email", type="integer"),
     *                      @OA\Property(property="contact", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token", type="string"),
     *                      @OA\Property(property="number_of_point", type="string"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifi√©",
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
     *      description="pas trouv√©"
     *   ),
     *  )
     */
    public function index(Client $client): JsonResponse
    {
        $response = $client->getAllClient();
        $client = $this->verifyStatus($response);
        return response()->json(
            $client,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Client $client
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/client",
     *      operationId="createClient",
     *      tags={"CLIENT"},
     *      summary="CREATE Client",
     *      description="CREATE Client",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="first_name", type="string"),
     *                  @OA\Property(property="last_name", type="string"),
     *                  @OA\Property(property="email", type="string"),
     *                  @OA\Property(property="contact", type="string"),
     *                  @OA\Property(property="password", type="string"),
     *                  @OA\Property(property="location", type="string")
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
     *                      @OA\Property(property="first_name", type="string"),
     *                      @OA\Property(property="last_name", type="string"),
     *                      @OA\Property(property="email", type="integer"),
     *                      @OA\Property(property="contact", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token", type="string"),
     *                      @OA\Property(property="number_of_point", type="string"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifi√©",
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
     *      description="pas trouv√©"
     *   ),
     *  )
     */
    public function store(Request $request,  Client $client): JsonResponse
    {
        $response = $client->createClient($request);
        $client = $this->verifyStatus($response);
        return response()->json(
            $client,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Client $client
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/client/{id}",
     *      operationId="getClientById",
     *      tags={"CLIENT"},
     *      summary="GET CLIENT BY ID",
     *      description="GET CLIENT",
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
     *                      @OA\Property(property="first_name", type="string"),
     *                      @OA\Property(property="last_name", type="string"),
     *                      @OA\Property(property="email", type="integer"),
     *                      @OA\Property(property="contact", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token", type="string"),
     *                      @OA\Property(property="number_of_point", type="string"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifi√©",
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
     *      description="pas trouv√©"
     *   ),
     *  )
     */
    public function show($id, Client $client): JsonResponse
    {
        $response = $client->getClientById($id);
        $client = $this->verifyStatus($response);
        return response()->json(
            $client,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client $client
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/client",
     *      operationId="updateClient",
     *      tags={"CLIENT"},
     *      summary="UPDATE CLIENT BY ID",
     *      description="UPDATE CLIENT",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="string"),
     *                  @OA\Property(property="first_name", type="string"),
     *                  @OA\Property(property="last_name", type="string"),
     *                  @OA\Property(property="email", type="string"),
     *                  @OA\Property(property="contact", type="string"),
     *                  @OA\Property(property="password", type="string"),
     *                  @OA\Property(property="location", type="string")
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
     *                      @OA\Property(property="first_name", type="string"),
     *                      @OA\Property(property="last_name", type="string"),
     *                      @OA\Property(property="email", type="integer"),
     *                      @OA\Property(property="contact", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token", type="string"),
     *                      @OA\Property(property="number_of_point", type="string"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="updated_at", type="string"),
     *                      @OA\Property(property="deleted_at", type="string"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifi√©",
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
     *      description="pas trouv√©"
     *   ),
     *  )
     */
    public function update(Request $request, Client $client): JsonResponse
    {
        $response = $client->updateClientDetails($request);
        $client = $this->verifyStatus($response);
        return response()->json(
            $client,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * @OA\Delete(
     *      path="/v1/client/{id}",
     *      operationId="deleteClient",
     *      tags={"CLIENT"},
     *      summary="DELETE CLIENT BY ID",
     *      description="DELETE CLIENT BY ID",
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
     *          description="Op√©ration √©ffectu√©e",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Non authentifi√©",
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
     *      description="pas trouv√©"
     *   ),
     *  )
     *
     *
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Client $client
     * @return JsonResponse
     * @throws Throwable
     */
    public function destroy($id,Client $client): JsonResponse
    {
        $response = $client->deleteClient($id);
        $client = $this->verifyStatus($response);
        return response()->json(
            $client,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
