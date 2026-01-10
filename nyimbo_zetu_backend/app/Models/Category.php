<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Song;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name'];

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }
    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
