<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commentId',
        'content',
        'create_at',
        'update_at',
        'status',
        'account_id',
        'story_id',
        'chapter_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'commentId' => 'integer',
        'create_at' => 'timestamp',
        'update_at' => 'timestamp',
        'account_id' => 'integer',
        'story_id' => 'integer',
        'chapter_id' => 'integer',
    ];

    public function commentId(): BelongsTo
    {
        return $this->belongsTo(CommentId::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class);
    }
}
