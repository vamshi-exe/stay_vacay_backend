<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Dotenv\Exception\ValidationException;

class AuthController extends Controller
{


    public function register(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            \Log::info('Validated data:', $validated);  // Log validated data

            // Create a new user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            // Generate a token for the user
            $token = $user->createToken('API Token')->plainTextToken;

            \Log::info('User created successfully:', ['user' => $user]);

            return response()->json([
                'status' => true,
                'message' => 'User registered successfully',
                'token' => $token,
                'token_type' => 'bearer'
            ], 201);

        } catch (\Exception $e) {
            // Log error message
            \Log::error('Registration failed: '.$e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }



    // Login a user
    public function login(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        try {
            if (Auth::attempt([
                'email' => $validated['email'],
                'password' => $validated['password']
            ])) {
                $user = Auth::user();
                $token = $user->createToken('API Token')->plainTextToken;

                return response()->json([
                    'status' => true,
                    'message' => 'User logged in successfully',
                    'token' => $token,
                    'token_type' => 'bearer'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentials'
                ], 401);
            }
        } catch (\Exception $e) {
            \Log::error('Login failed: '.$e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function get(){
        $data = user::all(); // Example: fetch all records from YourModel

        // Return the data as JSON response
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }
}
