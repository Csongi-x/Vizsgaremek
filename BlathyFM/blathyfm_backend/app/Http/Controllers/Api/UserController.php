<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request) {
        try {
            $email = $request->email;
            $isValid = null;
            $password = $request->password;
            $user = User::where("email", "=", $email)->first();
            if ($user) $isValid = Hash::check($password, $user->password);
            if ($isValid) {
                return response()->json([
                    "success" => true,
                    "message" => "{$user->full_name} sikeresen bejelentkezett",
                    "user" => $user
                ]);
            }
            else {
                return response()->json([
                    "success" => false,
                    "message" => "Bejelentkezés sikertelen"
                ], 401);
            }
        } catch (\Exception $exception) {
            return response()->json([
                "success" => false,
                "message" => $exception->getMessage()
            ]);
        }
    }
}
