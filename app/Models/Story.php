<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Story extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'storyId',
        'title',
        'description',
        'coverImage',
        'create_at',
        'update_at',
        'status',
        'author_id',
        'category_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'storyId' => 'integer',
        'create_at' => 'timestamp',
        'update_at' => 'timestamp',
        'status' => 'boolean',
        'author_id' => 'integer',
        'category_id' => 'integer',
    ];

    public function storyId(): BelongsTo
    {
        return $this->belongsTo(StoryId::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
