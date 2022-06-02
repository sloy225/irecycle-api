<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Role_permission;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Throwable;

class Role_permissionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Role_permission $Role_permission
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *      path="/v1/role_permission",
     *      operationId="getAllRole_permission",
     *      tags={"Role_permission"},
     *      summary="GET Role_permission",
     *      description="GET Role_permission",
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
     *                              @OA\Property(property="role_id", type="string"),
     *                              @OA\Property(property="permission", type="string"),
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
    public function index(Role_permission $Role_permission): JsonResponse
    {
        $response = $Role_permission->getAllRole_permission();
        $Role_permission = $this->verifyStatus($response);
        return response()->json(
            $Role_permission,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Role_permission
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/role_permission",
     *      operationId="createRole_permission",
     *      tags={"Role_permission"},
     *      summary="CREATE Role_permission",
     *      description="CREATE Role_permission",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *          @OA\JsonContent(
     *              @OA\Property(property="role_id", type="string"),
     *              @OA\Property(property="permission", type="string"),
     *          ),
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
     *                      @OA\Property(property="id", type="integer"),
     *                      @OA\Property(property="role_id", type="string"),
     *                      @OA\Property(property="permission", type="string"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="update_at", type="string"),
     *                      @OA\Property(property="delete_at", type="string"),
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
    public function store(Request $request,  Role_permission $Role_permission): JsonResponse
    {
        $response = $Role_permission->createRole_permission($request);
        $Role_permission = $this->verifyStatus($response);
        return response()->json(
            $Role_permission,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Role_permission $Role_permission
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/Role_permission/{id}",
     *      operationId="getRole_permissionById",
     *      tags={"Role_permission"},
     *      summary="GET Role_permission BY ID",
     *      description="GET Role_permission",
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
     *                              @OA\Property(property="role_id", type="string"),
     *                              @OA\Property(property="permission", type="string"),
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
    public function show($id, Role_permission $Role_permission): JsonResponse
    {
        $response = $Role_permission->getRole_permissionById($id);
        $Role_permission = $this->verifyStatus($response);
        return response()->json(
            $Role_permission,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role_permission $Role_permission
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/role_permission",
     *      operationId="updateRole_permission",
     *      tags={"Role_permission"},
     *      summary="UPDATE Role_permission BY ID",
     *      description="UPDATE Role_permission",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="role_id", type="string"),
     *                  @OA\Property(property="permission", type="string"),
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
     *                      @OA\Property(property="role_id", type="string"),
     *                      @OA\Property(property="permission", type="string"),
     *                      @OA\Property(property="created_at", type="string"),
     *                      @OA\Property(property="update_at", type="string"),
     *                      @OA\Property(property="delete_at", type="string"),
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
     *      @OA\Response(
     *          response=400,
     *          description="Mauvaise demande"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="pas trouvé"
     *      ),
     *  )
     */
    public function update(Request $request, Role_permission $Role_permission): JsonResponse
    {
        $response = $Role_permission->updateRole_permissionDetails($request);
        $Role_permission = $this->verifyStatus($response);
        return response()->json(
            $Role_permission,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param Role_permission   $Role_permission
     * @return JsonResponse
     */

    /**
     * @OA\Delete(
     *      path="/v1/role_permission/{id}",
     *      operationId="deleteRole_permission",
     *      tags={"Role_permission"},
     *      summary="DELETE Role_permission BY ID",
     *      description="DELETE Role_permission BY ID",
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
     *      @OA\Response(
     *          response=400,
     *          description="Mauvaise demande"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="pas trouvé"
     *      ),
     *  )
     */
    public function destroy($id,Role_permission $Role_permission): JsonResponse
    {
        $response = $Role_permission->deleteRole_permission($id);
        $Role_permission = $this->verifyStatus($response);
        return response()->json(
            $Role_permission,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
