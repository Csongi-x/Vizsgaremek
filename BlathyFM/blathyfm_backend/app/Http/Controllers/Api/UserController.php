<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function login($email, $password) {
        $users = User::where("email", "LIKE", $email, "AND", "password", "=", $password)->get();
        if (count($users) > 0) {
            return response()->json([
                "success" => true,
                "message" => "List of users",
                "users" => $users
            ]);
        }
        return response()->json([
            "success" => false,
            "message" => "User not found or wrong password"
        ], 403);
    }
}
