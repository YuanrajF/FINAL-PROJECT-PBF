<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterControll extends Controller
{
    //
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255',
            'no_hp' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|min:8'
            
        ]);

        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $payload = $validator->validated();

        User::create([
            'username'=> $payload['username'],
            'no_hp'=> $payload['no_hp'],
            'password'=> bcrypt($payload['password']),
            'email'=> $payload['email']
        ]);

        return response()->json([
            'msg' => 'Akun Berhasil Dibuat'
        ]);
    }
}
