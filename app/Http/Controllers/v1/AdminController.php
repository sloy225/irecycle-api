<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Admin $Admin
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/admin",
     *      operationId="getAllAdmin",
     *      tags={"Admin"},
     *      summary="GET Admin",
     *      description="GET Admin",
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
     *                      @OA\Property(property="role_id", type="string"),
     *                      @OA\Property(property="nom", type="string"),
     *                      @OA\Property(property="prenom", type="integer"),
     *                      @OA\Property(property="email", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token_admin", type="string"),
     *                      @OA\Property(property="email_verified_at", type="string"),
     *                      @OA\Property(property="password_change_at", type="string"),
     *                      @OA\Property(property="remember_token", type="string"),
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
    public function index(Admin $Admin): JsonResponse
    {
        $response = $Admin->getAllAdmin();
        $Admin = $this->verifyStatus($response);
        return response()->json(
            $Admin,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Admin $Admin
     * @return JsonResponse
     */

    /**
     * @OA\Post(
     *      path="/v1/admin",
     *      operationId="createAdmin",
     *      tags={"Admin"},
     *      summary="CREATE Admin",
     *      description="CREATE Admin",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="role_id", type="string"),
     *                  @OA\Property(property="nom", type="string"),
     *                  @OA\Property(property="prenom", type="integer"),
     *                  @OA\Property(property="email", type="string"),
     *                  @OA\Property(property="password", type="string"),
     *                  @OA\Property(property="token_admin", type="string"),
     *                  @OA\Property(property="email_verified_at", type="string"),
     *                  @OA\Property(property="password_change_at", type="string"),
     *                  @OA\Property(property="remember_token", type="string"),
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
     *                      @OA\Property(property="nom", type="string"),
     *                      @OA\Property(property="prenom", type="integer"),
     *                      @OA\Property(property="email", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token_admin", type="string"),
     *                      @OA\Property(property="email_verified_at", type="string"),
     *                      @OA\Property(property="password_change_at", type="string"),
     *                      @OA\Property(property="remember_token", type="string"),
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
    public function store(Request $request,  Admin $Admin): JsonResponse
    {
        $response = $Admin->createAdmin($request);
        $Admin = $this->verifyStatus($response);
        return response()->json(
            $Admin,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Admin $Admin
     * @return JsonResponse
     */

    /**
     * @OA\Get(
     *      path="/v1/admin/{id}",
     *      operationId="getAdminById",
     *      tags={"Admin"},
     *      summary="GET Admin BY ID",
     *      description="GET Admin",
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
     *                      @OA\Property(property="role_id", type="string"),
     *                      @OA\Property(property="nom", type="string"),
     *                      @OA\Property(property="prenom", type="integer"),
     *                      @OA\Property(property="email", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token_admin", type="string"),
     *                      @OA\Property(property="email_verified_at", type="string"),
     *                      @OA\Property(property="password_change_at", type="string"),
     *                      @OA\Property(property="remember_token", type="string"),
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
    public function show($id, Admin $Admin): JsonResponse
    {
        $response = $Admin->getAdminById($id);
        $Admin = $this->verifyStatus($response);
        return response()->json(
            $Admin,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Admin $Admin
     * @return JsonResponse
     */

    /**
     * @OA\Put (
     *      path="/v1/admin",
     *      operationId="updateAdmin",
     *      tags={"Admin"},
     *      summary="UPDATE Admin BY ID",
     *      description="UPDATE Admin",
     *      security={{"bearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Transmettre les informations",
     *              @OA\JsonContent(
     *                  @OA\Property(property="id", type="integer"),
     *                  @OA\Property(property="role_id", type="string"),
     *                  @OA\Property(property="nom", type="string"),
     *                  @OA\Property(property="prenom", type="integer"),
     *                  @OA\Property(property="email", type="string"),
     *                  @OA\Property(property="password", type="string"),
     *                  @OA\Property(property="token_admin", type="string"),
     *                  @OA\Property(property="email_verified_at", type="string"),
     *                  @OA\Property(property="password_change_at", type="string"),
     *                  @OA\Property(property="remember_token", type="string"),
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
     *                      @OA\Property(property="nom", type="string"),
     *                      @OA\Property(property="prenom", type="integer"),
     *                      @OA\Property(property="email", type="string"),
     *                      @OA\Property(property="password", type="string"),
     *                      @OA\Property(property="token_admin", type="string"),
     *                      @OA\Property(property="email_verified_at", type="string"),
     *                      @OA\Property(property="password_change_at", type="string"),
     *                      @OA\Property(property="remember_token", type="string"),
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
    public function update(Request $request, Admin $Admin): JsonResponse
    {
        $response = $Admin->updateAdminDetails($request);
        $Admin = $this->verifyStatus($response);
        return response()->json(
            $Admin,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * @OA\Delete(
     *      path="/v1/admin/{id}",
     *      operationId="deleteAdmin",
     *      tags={"Admin"},
     *      summary="DELETE Admin BY ID",
     *      description="DELETE Admin BY ID",
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
     * @param Admin $Admin
     * @return JsonResponse
     * @throws Throwable
     */
    public function destroy($id,Admin $Admin): JsonResponse
    {
        $response = $Admin->deleteAdmin($id);
        $Admin = $this->verifyStatus($response);
        return response()->json(
            $Admin,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }
}
