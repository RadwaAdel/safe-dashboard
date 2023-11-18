<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    $validated = auth()->attempt([
        'email' => $request->email,
        'password' => $request->password,
    ]);
    if ($validated) {
        return response()->json([
            'status' => 200,
            'message' => 'you are login'
        ]);
        return 'please sign up';
    }
}
}
