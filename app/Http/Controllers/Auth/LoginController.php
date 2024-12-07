<?
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MongoDB\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Shows the login form
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Create a MongoDB client instance
            $client = new Client(env('MONGO_DB_URI'));  // Use the connection string from .env
            $database = $client->selectDatabase('walkingwdb');  // MongoDB database
            $collection = $database->selectCollection('users');  // MongoDB collection

            // Find the user by email
            $user = $collection->findOne(['email' => $validatedData['email']]);

            if (!$user) {
                // User not found
                return back()->withErrors(['email' => 'Email not found']);
            }

            // Check if the password matches the stored hash
            if (!Hash::check($validatedData['password'], $user['password'])) {
                // If the password doesn't match
                return back()->withErrors(['password' => 'Incorrect password']);
            }

            // Log in the user manually (using MongoDB _id as the identifier)
            Auth::loginUsingId((string)$user['_id']);  // MongoDB _id is the unique identifier for the user

            // Redirect to the intended page after login
            return redirect()->intended('/');  // Redirect to home or intended page

        } catch (\Exception $e) {
            // Handle any errors and show the exception message
            return back()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
        }
    }

    // Handle the logout request
    public function logout()
    {
        Auth::logout();  // Log the user out
        return redirect()->route('home');  // Redirect to the home page after logout
    }
}
