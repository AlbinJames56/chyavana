<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurHealersController extends Controller
{
    public function index()
    {
        $healers = [
            [
                'name' => 'Dr. Priya Sharma',
                'qualification' => 'BAMS, MD (Ayurveda)',
                'specialties' => ['Panchakarma', 'Chronic Disease Management', "Women's Health"],
                'experience' => '15 years',
                'patients' => '2,500+',
                'approach' => 'I believe in treating the root cause, not just symptoms...',
                'image' => 'https://images.unsplash.com/photo-1755189118414-14c8dacdb082?...',
            ],
            [
                'name' => 'Dr. Arjun Patel',
                'qualification' => 'BAMS, MS (Ayurveda)',
                'specialties' => ['Mental Wellness', 'Stress Management', 'Digestive Disorders'],
                'experience' => '12 years',
                'patients' => '1,800+',
                'approach' => 'Combining traditional Ayurvedic wisdom with modern lifestyle...',
                'image' => 'https://images.unsplash.com/photo-1755189118414-14c8dacdb082?...',
            ],
            [
                'name' => 'Dr. Priya Sharma',
                'qualification' => 'BAMS, MD (Ayurveda)',
                'specialties' => ['Panchakarma', 'Chronic Disease Management', "Women's Health"],
                'experience' => '15 years',
                'patients' => '2,500+',
                'approach' => 'I believe in treating the root cause, not just symptoms...',
                'image' => 'https://images.unsplash.com/photo-1755189118414-14c8dacdb082?...',
            ],
            [
                'name' => 'Dr. Arjun Patel',
                'qualification' => 'BAMS, MS (Ayurveda)',
                'specialties' => ['Mental Wellness', 'Stress Management', 'Digestive Disorders'],
                'experience' => '12 years',
                'patients' => '1,800+',
                'approach' => 'Combining traditional Ayurvedic wisdom with modern lifestyle...',
                'image' => 'https://images.unsplash.com/photo-1755189118414-14c8dacdb082?...',
            ],
            // ... repeat all healers here
        ];

        return view('pages.our-healers', compact('healers'));
    }
}
