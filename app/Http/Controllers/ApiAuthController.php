<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;

class ApiAuthController extends Controller
{
    public function login(LoginRequest $request){

        //check apakah data user yang diinput ada
        $user = User::where('username', $request->username)->first();

        //check password
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'user atau password salah'
            ], 4811);
        }

        //generate token
        $token = $user->createToken('token')->plainTextToken;

        return new LoginResource([
            'message' => 'success login',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request){
        #hapus
        $request->user()->tokens()->delete();

        #response
        return response()->noContent();
    }
}
