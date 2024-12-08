<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Create the user document and save it to MongoDB using Eloquent
            $user = new User([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'created_at' => now(),
            ]);
            $user->save();

            // Log in the user after registration
            // Check if the password matches the hashed version in the database
            if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
                return redirect()->route('home')->with('success', 'Registration successful! Welcome!');
            }

            // If not logged in, redirect to the login page
            return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
        } catch (\Exception $e) {
            // Handle errors and return the error message
            return back()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
