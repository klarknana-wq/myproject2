<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showRoomForm()
    {
        return view('room-form');
    }

    public function handleRoomForm(Request $request)
    {
        $room = $request->input('room');
        return view('room-result', compact('room'));
    }
    
    public function handleConferenceForm(Request $request)
    {
        $data = $request->only(['title', 'room', 'start_date', 'payment_method', 'description']);
        return view('conference-result', compact('data'));
    }
}
?>