<?php

namespace App\Http\Controllers;

use App\Models\PainTechnique;
use Illuminate\Http\Request;

class PainReliefController extends Controller
{
    public function index()
    {
        // Conditions data (moved from Blade)
        $conditions = [
            [
                'icon' => 'fa-bone',
                'title' => 'Arthritis & Joint Pain',
                'description' => 'Natural treatment for osteoarthritis and joint inflammation.',
                'improvement' => 85,
                'duration' => '10–14 weeks',
                'features' => [
                    'Herbal anti-inflammatory formulas',
                    'Therapeutic oil massages (Abhyanga)',
                    'Strengthening exercises',
                    'Dietary modifications',
                ]
            ],
            [
                'icon' => 'fa-person-running',
                'title' => 'Sciatica & Lower Back Pain',
                'description' => 'Targeting nerve compression and muscular tension for lasting relief.',
                'improvement' => 78,
                'duration' => '8–12 weeks',
                'features' => [
                    'Kati Vasti therapy',
                    'Warm medicated oil treatments',
                    'Postural corrections',
                    'Lifestyle changes',
                ]
            ],
            [
                'icon' => 'fa-head-side-virus',
                'title' => 'Migraine & Neck Pain',
                'description' => 'Holistic treatment to reduce migraine intensity and frequency.',
                'improvement' => 90,
                'duration' => '6–10 weeks',
                'features' => [
                    'Shirodhara therapy',
                    'Nasyam herbal nasal detox',
                    'Stress balancing routines',
                    'Dietary adjustments',
                ]
            ],
            [
                'icon' => 'fa-hand-dots',
                'title' => 'Muscle Pain & Fibromyalgia',
                'description' => 'Deep tissue rejuvenation to relieve widespread body ache.',
                'improvement' => 82,
                'duration' => '10–12 weeks',
                'features' => [
                    'Herbal steam therapy',
                    'Marma massage',
                    'Nerve-strengthening herbs',
                    'Yoga-based healing',
                ]
            ],
        ];

        // Testimonials already handled
        $testimonials = [
            [
                'name' => 'Rajesh Kumar',
                'condition' => 'Chronic Back Pain',
                'improvement' => '80%',
                'duration' => '10 weeks',
                'quote' => 'After years of relying on painkillers, I found lasting relief through Ayurvedic treatment. My mobility has improved dramatically.',
            ],
            [
                'name' => 'Meera Patel',
                'condition' => 'Arthritis',
                'improvement' => '75%',
                'duration' => '12 weeks',
                'quote' => 'The personalized herbal treatments and therapeutic massages have given me my life back. I can now do daily activities without pain.',
            ],
            [
                'name' => 'Anil Sharma',
                'condition' => 'Migraines',
                'improvement' => '90%',
                'duration' => '8 weeks',
                'quote' => 'My migraine frequency reduced from weekly to once a month. The Shirodhara therapy was truly transformative.',
            ],
        ];
        $techniques = PainTechnique::query()
            ->where('available', true)     // updated field
            ->orderBy('featured', 'desc')  // featured items first
            ->orderBy('title', 'asc')      // alphabetical fallback
            ->get();

        return view('pages.PainRelief', compact('conditions', 'testimonials', 'techniques'));
    }
    public function show($slug)
    {
        $technique = PainTechnique::where('slug', $slug)
            ->where('available', true)
            ->firstOrFail();

        // related techniques (exclude current)
        $related = PainTechnique::where('available', true)
            ->where('id', '!=', $technique->id)
            ->orderBy('featured', 'desc')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('pages.pain-techniques.show', compact('technique', 'related'));
    }
}
