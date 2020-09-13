<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Resources\User as ResourcesUser;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return response()->json(
            [
                'data' => ResourcesUser::collection(User::all()),
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUser $request)
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

    /**
     * Display the specified resource.
     */
    public function show(User $user) : JsonResponse
    {
        return response()->json(
            new ResourcesUser($user),
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUser $request, User $user)
    {
        $validated = $request->validated();
        $user->update([
            'fname' => $validated['fname'],
            'lname' => $validated['lname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'address' => $validated['address'],
            'postalcode' => $validated['postalcode'],
            'city' => $validated['postalcode'],
            'reset_password_token' => Str::random(80), // Change token on update.
        ]);

        return response()->json(
            new ResourcesUser($user),
            Response::HTTP_CREATED
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
