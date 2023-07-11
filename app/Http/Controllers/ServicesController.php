<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function search()
    {
        $services = Services::all();

        if ($services) {
            // return JSON response
            return response()->json($services);
        } else {
            //  nothing found, return error response
            return response()->json(['error' => 'data not found'], 404);
        }
    }
}
