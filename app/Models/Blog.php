<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'author',
        'published_at',
        'image',
        'excerpt',
        'content',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
    ];

    // Auto-generate slug when setting title (optional)
    public static function booted()
    {
        static::saving(function ($model) {
            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    // Image URL helper (handles storage or external URLs)
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset('images/default-blog.jpg');
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        if (Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }

        return asset($this->image);
    }
}
