<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class AuthController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]
         );
        $user = User::create($data);
        $token = $user->createToken($request->name);
        return response()->json(
            ['message' => 'Пользователь создан',
                    'data' => $token->plainTextToken], 200);
    }
    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string',
        ]
         );
        $user = User::where('email', $data['email'])->first();
        if(!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(
                ['message' => 'Нет пользователя'], 440);
        } else {
            $token = $user->createToken($user->name);
        return response()->json(
            ['message' => 'Вы авторизованы',
                    'data' => $token->plainTextToken], 200);
    }
        }

    public function logout(Request $request) {
        return 'logout';
    }
}
