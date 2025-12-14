<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'category',
        'duration',
        'effectiveness',
        'short_description',
        'content_section_title_1',
        'content_section_1',
        'content_section_title_2',
        'content_section_2',
        'content_section_title_3',
        'content_section_3',
        'includes',
        'image',
        'image_alt',
        'status',
        'sort_order',
        'seo_title',
        'seo_description',
        'meta_keywords',
        'canonical_url',
        'meta_robots',
    ];

    protected $casts = [
        'includes' => 'array',
        'effectiveness' => 'integer',
        'meta_keywords' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function (self $treatment) {
            if (empty($treatment->slug) && !empty($treatment->title)) {
                $base = Str::slug($treatment->title);
                $slug = $base;
                $i = 1;
                while (self::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $treatment->slug = $slug;
            }
        });
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image)
            return null;

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        return Storage::url($this->image);
    }

    public function getEffectivenessTextAttribute(): ?string
    {
        return is_numeric($this->effectiveness) ? $this->effectiveness . '%' : null;
    }
}
