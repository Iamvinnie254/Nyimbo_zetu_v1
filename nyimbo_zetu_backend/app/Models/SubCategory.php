<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Song;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    protected $fillable = ['name', 'category_id'];

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
