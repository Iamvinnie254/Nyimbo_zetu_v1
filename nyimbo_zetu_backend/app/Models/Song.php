<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Song extends Model
{
    use HasFactory;

    protected $table = 'songs';

    protected $fillable = [
        'song_title',
        'composer',
        'artist/group',
        'lyrics',
        'midi',
        'pdf',
        'youtube_link',
        'slug',
        'subcategory_id',
        'user_id',
    ];

    /**
     * Relationship: A song belongs to a user (uploader)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: A song belongs to a subcategory
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    /* Midi and pdf accessors */
    public function getPdfAttribute($value)
    {
        if (!$value) return null;

        // Remove any accidental "public/" prefix from stored paths
        $cleanPath = preg_replace('/^public\//', '', $value);

        // Generate correct URL
        return asset('storage/' . ltrim($cleanPath, '/'));
    }

    public function getMidiAttribute($value)
    {
        if (!$value) return null;

        $cleanPath = preg_replace('/^public\//', '', $value);

        return asset('storage/' . ltrim($cleanPath, '/'));
    }
}
