<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'publish_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_date' => 'datetime:Y-m-d H:i:s',
        'updated_date' => 'datetime:Y-m-d H:i:s',
        'publish_date' => 'datetime:Y-m-d H:i:s'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    protected static function booted()
    {
        static::addGlobalScope('latestFirst', function ($query) {
            $query->latest();
        });
    }
}
