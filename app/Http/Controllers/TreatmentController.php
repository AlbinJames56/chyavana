<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index(Request $request)
    {
        // Get published treatments ordered by sort_order (then created_at)
        $treatments = Treatment::query()
            ->where('status', 'published')
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Build filters from available categories (non-empty)
        $categories = $treatments
            ->pluck('category')
            ->filter(fn($c) => !empty($c))
            ->unique()
            ->values();

        $filters = collect([['label' => 'All Programs', 'value' => 'all']])
            ->concat(
                $categories->map(fn($c) => ['label' => ucfirst($c), 'value' => $c])
            )
            ->values()
            ->toArray();

        return view('pages.treatments', compact('treatments', 'filters'));
    }

    public function show(string $slug)
    {
        $treatment = Treatment::where('slug', $slug)->firstOrFail();

        // Related by same category (exclude current)
        $related = Treatment::query()
            ->where('status', 'published')
            ->when($treatment->category, function ($q) use ($treatment) {
                $q->where('category', $treatment->category);
            })
            ->where('id', '!=', $treatment->id)
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // If less than 3 related, add latest published (excluding current and already included)
        if ($related->count() < 3) {
            $needed = 3 - $related->count();
            $extra = Treatment::query()
                ->where('status', 'published')
                ->where('id', '!=', $treatment->id)
                ->whereNotIn('id', $related->pluck('id')->all())
                ->orderBy('sort_order', 'asc')
                ->orderBy('created_at', 'desc')
                ->limit($needed)
                ->get();

            $related = $related->concat($extra)->values();
        }

        return view('pages.treatments.show', compact('treatment', 'related'));
    }
}
