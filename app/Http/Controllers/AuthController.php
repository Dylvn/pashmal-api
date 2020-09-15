<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterUser;
use App\Http\Resources\User as ResourcesUser;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(RegisterUser $request) : JsonResponse
    {
        $validated = $request->validated();
        $user = User::create([
            'fname' => $validated['fname'],
            'lname' => $validated['lname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'address' => $validated['address'],
            'postalcode' => $validated['postalcode'],
            'city' => $validated['postalcode'],
            'reset_password_token' => Str::random(80),
        ]);

        return response()->json(
            new ResourcesUser($user),
            Response::HTTP_CREATED
        );
    }

    public function login(LoginUser $request) : JsonResponse
    {
        $validated = $request->validated();
        if (! $token = auth()->attempt($validated)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    public function refresh() : JsonResponse
    {
        return $this->createNewToken(auth()->refresh());
    }

    public function profile() : JsonResponse
    {
        return response()->json(
            new ResourcesUser(auth()->user()),
            Response::HTTP_OK
        );
    }

    public function logout() : JsonResponse
    {
        auth()->logout();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    /**
     * Get the token array structure.
     */
    protected function createNewToken(string $token) : JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 3600,
        ], Response::HTTP_OK);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}
