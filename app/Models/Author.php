<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'authorId',
        'name',
        'bio',
        'create_at',
        'update_at',
        'status',
        'stories',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'authorId' => 'integer',
        'create_at' => 'timestamp',
        'update_at' => 'timestamp',
    ];

    public function authorId(): BelongsTo
    {
        return $this->belongsTo(AuthorId::class);
    }
}
