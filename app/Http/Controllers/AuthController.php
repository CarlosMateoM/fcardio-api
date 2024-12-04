<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw new ModelNotFoundException('Usuario no encontrado');
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'email o contraseña incorrectos'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return response()->json([
            'message' => 'Usuario creado'
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Tokens Revocados'
        ]);
    }

    public function getUser(Request $request)
    {
        $user = $request->user();

        $user->load('medicalProfile');

        $lastActivity = $user->activityTrackings()->latest()->first();

        return response()->json([
            'data' => [
                'user' => new UserResource($user),
                'last_activity' => $lastActivity,
            ]
        ]);
    }

    public function updateUser(UpdateUserRequest $request)
    {
        $user = $request->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = $request->input('password');
        }

        $user->save();

        return response()->json([
            'message' => 'Usuario actualizado'
        ]);
    }
}
