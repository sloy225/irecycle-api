<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Documentation des APIs d'I-Recycle",
 *      description="Implementation avec Swagger par #DEV_PEOPLE",
 *      @OA\Contact(
 *          email="mianahissan@protonmail.com"
 *      ),
 *      @OA\License(
 *          name="I-Recycle Protected",
 *          url="https://www.devpeopleci.com"
 *      )
 * )
 *  @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="I-Recycle Service Server"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $format = JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE;

    /**
     * success response method.
     *
     * @param $result
     * @return JsonResponse
     */
    public function sendResponse($result): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
        ];

        return response()->json(
            $response,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * return error response.
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($error, array $errorMessages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json(
            $response,
            $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            $this->format
        );
    }

    /**
     * success response method.
     *
     */

    public function verifyStatus($response): JsonResponse
    {
        return $response['status'] ? $this->sendResponse($response['object']) : $this->sendError($response['error']);
    }

    /**
     * @OA\Post(
     * path="/v1/authenticate",
     * operationId="loginApi",
     * tags={"OAuth"},
     * summary="Authentification",
     * description="OAuthLogin",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *          @OA\Property(property="email", example="email"),
     *          @OA\Property(property="password", example="password"),
     *     ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Connexion Réussie",
     *       ),
     * )
     */
    public function authenticate(Request $request): JsonResponse
    {
        if ( !Auth::attempt( ['email' => $request->input('email'), 'password' => $request->input('password')] , true)){
            $this->sendError('Invalid Login Credentials.');
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        Session::flush();
        Auth::logout();
        return $this->sendResponse(["token"=>$accessToken]);
    }

    /**
     * @OA\Post(
     *     path="/v1/register",
     *     operationId="Inscription",
     *     tags={"OAuth"},
     *     summary="Inscription de l'utilisateur",
     *     description="Informations de l'utilisateurs",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *               @OA\Property(property="name"),
     *               @OA\Property(property="email"),
     *               @OA\Property(property="password"),
     *            ),
     *       ),
     *      @OA\Response(
     *          response=201,
     *          description="Opération Réussie",
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Inscription réussie",
     *       ),
     * )
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', (array)$validator->errors());
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $accessToken =$user->createToken('authToken')->accessToken;

        return $this->sendResponse(
            ["user"=>$user,"access_token"=>$accessToken]
        );
    }
}
