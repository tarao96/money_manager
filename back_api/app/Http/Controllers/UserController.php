<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $result = User::all();
        return response()->json($result);
    }
}
