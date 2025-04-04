<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'bio' => 'nullable|string|max:500',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture_url' => 'nullable|url|max:255',
            'company_name' => 'nullable|string|max:255',
            'is_verified' => 'boolean',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'bio' => $request->bio,
            'phone_number' => $request->phone_number,
            'profile_picture_url' => $request->profile_picture_url ?? 'https://placehold.co/300x300',
            'company_name' => $request->company_name,
            'is_verified' => $request->is_verified ?? false,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json([
            'user' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'user' => $user,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'User not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8|confirmed',
            'bio' => 'nullable|string|max:500',
            'phone_number' => 'nullable|string|max:15',
            'profile_picture_url' => 'nullable|url|max:255',
            'company_name' => 'nullable|string|max:255',
            'is_verified' => 'boolean',
        ]);

        $user->update($request->all());

        return response()->json([
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->is_deleted = true;
        $user->save();

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }
}