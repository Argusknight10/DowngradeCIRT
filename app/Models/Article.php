<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'body',
        'is_published',
        'created_by',
        'updated_by',
        'published_by',
        'published_at'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_published' => false
    ];

    /**
     * Scope a query to get search by title
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeSearch(Builder $query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
