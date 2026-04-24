<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PendingUserController extends Controller
{
    /**
     * Display the list of unregistered users.
     */
    public function index()
    {
        $users = PendingUser::all();
        return response()->json([
            'success' => true,
            'message' => 'List of unregistered users',
            'pending_users' => $users
        ]);
    }

    /**
     * Validates a newly added account.
     */
    public function create(StoreUserRequest $request)
    {
        $existingEmails = User::select('email')->where('email', $request->email)->get();
        if (!$existingEmails->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Ezzel az e-mail címmel már van regisztrált felhasználó."
            ], 401);
        }
        if ($request->password != $request->password_again) {
            return response()->json([
                "success" => false,
                "message" => "A jelszavak nem egyeznek."
            ], 401);
        }
        $pendingUser = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status
        ];
        PendingUser::create($pendingUser);
        return response()->json([
            "success" => true,
            "message" => "Felhasználó sikeresen hozzáadva a várólistához!",
            "user" => $pendingUser
        ], 201);
    }

    /**
     * Adds a user to the regular users' table (it was accepted by one of the admins)
     */
    public function store(Request $request)
    {
        $user = null;
        try {
            $user = PendingUser::find($request->id);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Hiba: A felhasználót nem találja a rendszer. ($e)"
            ], 404);
        }
        $user->status = $request->status;
        $user->update();
        $m = "hozzáadva";
        if ($user->status == 'accepted') {
            User::create(
                [
                    "full_name" => $user->full_name,
                    "email" => $user->email,
                    "role" => $user->role,
                    "password" => Hash::make($user->password)
                ]
            );
        } else {
            $m = "elutasítva";
        }
        return response()->json([
            "success" => true,
            "message" => "Felhasználó sikeresen $m!",
            "user" => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PendingUser $pendingUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = null;
        try {
            $user = PendingUser::find($request->id);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Hiba: A felhasználót nem találja a rendszer. ($e)"
            ], 404);
        }
        $user->status = "declined";
        $user->update();
        return response()->json([
            "success" => true,
            "message" => "A felhasználó regisztrációja sikeresen el lett utasítva!",
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PendingUser $pendingUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendingUser $pendingUser)
    {
        //
    }
}
