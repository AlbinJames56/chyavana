<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Home page: list all blogs
    public function index()
    {
        $blogs = [
            [
                'title' => 'The Power of Ayurveda for Modern Health',
                'slug' => 'power-of-ayurveda-modern-health',
                'excerpt' => 'Discover how ancient Ayurvedic principles create long-lasting healing...',
                'image' => 'https://images.unsplash.com/photo-1611689342707-019701c35c43',
                'date' => '2024-01-15',
                'author' => 'Dr. Kavya Nair'
            ],
            [
                'title' => 'How Panchakarma Detox Removes Deep Toxins',
                'slug' => 'panchakarma-detox-removes-toxins',
                'excerpt' => 'Panchakarma targets root-level imbalances. Here’s how it works...',
                'image' => 'https://images.unsplash.com/photo-1620912189868-1e36fcff7a3a',
                'date' => '2024-01-22',
                'author' => 'Dr. Arjun Mehta'
            ]
        ];

        return view('pages.blogs.index', compact('blogs'));
    }

    // Single blog page
    public function show($slug)
    {
        // Example static blog content — replace with DB later
        $blog = [
            'title' => 'Example Blog Title',
            'slug' => $slug,
            'image' => 'https://images.unsplash.com/photo-1611689342707-019701c35c43',
            'content' => '<p>Ayurveda is a timeless healing system that emphasizes balance...</p>
                          <p>It helps restore harmony using natural therapies...</p>',
            'date' => '2024-01-15',
            'author' => 'Dr. Kavya Nair'
        ];

        return view('blogs.show', compact('blog'));
    }
}
