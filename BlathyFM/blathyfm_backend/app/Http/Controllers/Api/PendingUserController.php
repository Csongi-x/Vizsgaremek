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
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Validates a newly added account.
     */
    public function create(StoreUserRequest $request)
    {
        $existingEmails = User::select('email')->where('email', '=', $request->email)->get();
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
            "message" => "User added successfully.",
            "user" => $pendingUser
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(PendingUser $pendingUser)
    {
        //
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
