<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'condition',
        'improvement',
        'duration',
        'quote',
        'video_url',
        'video_file',
        'thumbnail',
        'is_published',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getVideoUrlAttribute()
    {
        $videoFile = $this->attributes['video_file'] ?? null;
        if (!empty($videoFile) && Storage::disk('public')->exists($videoFile)) {
            return Storage::url($videoFile);
        }

        return $this->attributes['video_url'] ?? null;
    }

    /**
     * Returns a thumbnail URL for display (uploaded thumbnail or fallback image).
     */
    public function getThumbnailUrlAttribute()
    {
        $thumb = $this->attributes['thumbnail'] ?? null;
        if (!empty($thumb) && Storage::disk('public')->exists($thumb)) {
            return Storage::url($thumb);
        }

        return asset('images/default-testimonial.jpg');
    }

    /**
     * Helper: convert common YouTube / Vimeo links into embed URLs for iframes.
     * Use in Blade like: $t->video_embed_url
     */
    public function getVideoEmbedUrlAttribute()
    {
        $url = $this->attributes['video_url'] ?? null;
        if (empty($url)) {
            return null;
        }

        $u = parse_url($url);
        if (!isset($u['host'])) {
            return $url;
        }

        $host = $u['host'];

        // youtu.be short link
        if (Str::contains($host, 'youtu.be')) {
            $id = ltrim($u['path'], '/');
            return 'https://www.youtube.com/embed/' . $id;
        }

        // youtube.com/watch?v=...
        if (Str::contains($host, 'youtube')) {
            parse_str($u['query'] ?? '', $q);
            if (!empty($q['v'])) {
                return 'https://www.youtube.com/embed/' . $q['v'];
            }
        }

        // vimeo
        if (Str::contains($host, 'vimeo')) {
            $id = trim($u['path'], '/');
            return 'https://player.vimeo.com/video/' . $id;
        }

        // fallback: return original
        return $url;
    }
}
