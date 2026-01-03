<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\PainTechnique;
use App\Models\Treatment;

class HomeController extends Controller
{
    public function index()
    {
        $treatments = Treatment::query()
            ->where('status', 'published')     // adjust if your column name differs
            ->orderBy('featured', 'desc')
            ->orderBy('sort_order', 'asc')
            ->limit(4)                          // only show 4 on home
            ->get();
        $painPrograms = PainTechnique::query()
            ->where('available', true)
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'asc')
            ->limit(4)
            ->get();
        $homeHealers = Doctors::query()
            ->where('available', true)
            ->orderBy('featured', 'desc')
            ->orderBy('name', 'asc')
            ->limit(3)
            ->get();

        return view('pages.home', compact('treatments', 'painPrograms', 'homeHealers'));
    }
}
