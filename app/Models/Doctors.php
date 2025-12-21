<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Doctors extends Model
{
    use SoftDeletes;
    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'slug',
        'qualification',
        'specialties',
        'experience',
        'patients',
        'approach',
        'image',
        'featured',
        'available',
    ];

    protected $casts = [
        'specialties' => 'array',
        'featured' => 'boolean',
        'available' => 'boolean',
    ];
    public function getImageUrlAttribute()
    {
        // If no image provided, return a placeholder asset
        if (empty($this->image)) {
            return asset('images/default-doctor.jpg'); // ensure this exists
        }

        // If already an absolute URL, return as-is
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        // If stored in the public disk (storage/app/public), use Storage::url
        if (Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }

        // Otherwise, assume it's a relative asset path
        return asset($this->image);
    }
}
