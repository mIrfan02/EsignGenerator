<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function showForm()
    {
        return view('signature.form');
    }

    public function generateSignature(Request $request)
    {
        $name = $request->input('name');
        // Generate signature logic here
        $signature = "This is a signature for $name"; // Dummy signature for demonstration
        return view('signature.result', compact('signature'));
    }
}
