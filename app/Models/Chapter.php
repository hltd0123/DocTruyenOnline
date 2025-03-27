<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chapterId',
        'chapterTitle',
        'content',
        'chapterNumber',
        'create_at',
        'update_at',
        'status',
        'story_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chapterId' => 'integer',
        'create_at' => 'timestamp',
        'update_at' => 'timestamp',
        'story_id' => 'integer',
    ];

    public function chapterId(): BelongsTo
    {
        return $this->belongsTo(ChapterId::class);
    }

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}
