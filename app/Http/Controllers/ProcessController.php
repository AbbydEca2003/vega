<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function processAction(Request $request)
    {
        // Handle your processing logic here
        
        return redirect('/new')->with('success', 'Data processed successfully!');
    }
}