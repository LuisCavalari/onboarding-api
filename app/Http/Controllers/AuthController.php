<?php

namespace App\Http\Controllers;

use App\Events\UserLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['message' => 'Usuario ou senha incorretos'], 401);
        }
       
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        $user = auth('api')->user();
        event(new UserLogin($user));
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => $user,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function me() {
        $user =  auth('api')->user();
        if($user) {
            return response()->json(['user'=>$user]);
        }
        return response()->json(['message' => 'Erro ao encontrar usuario',404]);
    }
    public function refresh() {
        return response()->json(['access_token' => auth('api')->refresh()]);
    }
}
