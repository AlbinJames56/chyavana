<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class OurHealersController extends Controller
{
    public function index()
    {
        // Load all doctors who are available (active)
        $healers = Doctors::query()
            ->where('available', true)
            ->orderBy('featured', 'desc')   // show featured healers first
            ->orderBy('name', 'asc')       // alphabetical fallback
            ->get();

        return view('pages.our-healers', compact('healers'));
    }
    
}
