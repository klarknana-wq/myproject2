<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function showConferenceForm()
    {
        return view('conference-form');
    }
    
    {
        $data = $request->only(['title', 'room', 'start_date', 'payment_method', 'description']);
        
        return view('conference-result', compact('data'));
    }
}