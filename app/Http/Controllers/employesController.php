<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employe;
use App\Models\employes;

class employesController extends Controller
{

    public function fetch()
    {   
        $employe = employes::all();

        if ($employe) {
            // Client found, return JSON response
            return response()->json($employe);
        } else {
            // Client not found, return error response
            return response()->json(['error' => 'employe not found'], 404);
        }
    }

}
