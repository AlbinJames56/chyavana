<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // list paginated published blogs
    public function index()
    {
        $blogs = Blog::query()
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        // Example static tags — you can replace with real tag logic later
        $tags = ['Ayurveda', 'Panchakarma', 'Herbs', 'Detox', 'Lifestyle', 'Wellness'];

        return view('pages.blogs.index', compact('blogs', 'tags'));
    }


    // show single blog by slug
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Related: latest published blogs excluding current
        $related = Blog::query()
            ->where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('pages.blogs.show', compact('blog', 'related'));
    }

}
