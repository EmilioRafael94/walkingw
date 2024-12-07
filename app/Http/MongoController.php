<?php

namespace App\Http\Controllers;

use MongoDB\Client;
use Illuminate\Http\Request;
use Exception;


class MongoController extends Controller
{
    public function testConnection()
    {
        try {
            // Create a MongoDB client instance
            $client = new Client("mongodb+srv://20220024259:12345@cluster0.cuobl.mongodb.net/?retryWrites=true&w=majority");

            // Select the database
            $database = $client->selectDatabase('walkingwdb');

            // Check if the connection is successful
            return response()->json(['status' => 'success', 'message' => 'Connection to MongoDB is successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
