<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:2',
            'phone' => 'required',
            'email' => 'nullable|email',
            'preferred' => 'nullable|date',
            'therapy_slug' => 'nullable', 
            'notes' => 'nullable',
            'source_page' => 'nullable',
        ]);

        Appointment::create($data);

        return back()->with('success', 'Your consultation request has been received.');
    }
}
