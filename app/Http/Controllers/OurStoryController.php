<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OurStoryController extends Controller
{
    public function index()
    {
        // Values (icons are Font Awesome class names)
        $values = [
            ['icon' => 'fa-heart', 'title' => 'Patient-First Approach', 'description' => 'Your health and wellbeing are at the center of everything we do'],
            ['icon' => 'fa-leaf', 'title' => 'Authentic Ayurveda', 'description' => 'Traditional practices rooted in ancient texts and lineage'],
            ['icon' => 'fa-award', 'title' => 'Clinical Excellence', 'description' => 'Highest standards of care with proven treatment outcomes'],
            ['icon' => 'fa-star', 'title' => 'Holistic Wellness', 'description' => 'Treating body, mind, and spirit for complete health'],
        ];

        $principles = [
            ['title' => 'Understanding Prakriti', 'description' => 'Your unique constitution (Vata, Pitta, Kapha) determines your personalized treatment approach'],
            ['title' => 'Treating Root Causes', 'description' => 'We address underlying imbalances, not just surface symptoms'],
            ['title' => 'Natural Healing', 'description' => "Harnessing the body's innate ability to heal through herbs, diet, and lifestyle"],
            ['title' => 'Preventive Care', 'description' => 'Building immunity and preventing disease through balanced living'],
        ];

        $whyChoose = [
            'Certified and experienced Ayurvedic practitioners',
            'Personalized treatment plans for every patient',
            'Authentic herbs and formulations',
            'Clean, modern clinical environment',
            'Comprehensive follow-up and support',
            'Integration with conventional medicine when needed',
            'Transparent pricing with no hidden costs',
            'Flexible appointment scheduling',
        ];

        $stats = [
            ['value' => '15+', 'label' => 'Years of Service'],
            ['value' => '5,000+', 'label' => 'Happy Patients'],
            ['value' => '92%', 'label' => 'Success Rate'],
            ['value' => '6', 'label' => 'Expert Healers'],
        ];

        return view('pages.our-story', compact('values', 'principles', 'whyChoose', 'stats'));
    }
}
