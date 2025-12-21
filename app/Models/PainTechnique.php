<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PainTechnique extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',

        // Content Section 1
        'description',

        // Content Section 2
        'more_info',

        'image',
        'duration',
        'featured',
        'available',

        // JSON benefits list
        'benefits',
    ];

    protected $casts = [
        'benefits' => 'array',
        'featured' => 'boolean',
        'available' => 'boolean',
    ];
}
