<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MongoDB\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');  // Shows the registration form
    }

    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', // Ensure unique email
            'password' => 'required|string|min:8|confirmed', // Ensures the password_confirmation field matches
        ]);

        try {
            // Create a MongoDB client instance
            $client = new Client("mongodb+srv://20220024259:12345@cluster0.cuobl.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
            $database = $client->selectDatabase('walkingwdb');  // MongoDB database name
            $collection = $database->selectCollection('users');  // MongoDB collection name

            // Create the user document
            $user = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // Encrypt the password
                'created_at' => now(),
            ];

            // Insert the new user into the MongoDB collection
            $insertResult = $collection->insertOne($user);

            // Optionally, log in the user after registration
            // Not necessary for MongoDB-based login but you could handle a session management system here

            // Redirect to the home page or intended page
            return redirect()->route('home')->with('success', 'Registration successful! Please log in.');
        } catch (\Exception $e) {
            // Handle any exceptions and show the error message
            return back()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
        }
    }
}

