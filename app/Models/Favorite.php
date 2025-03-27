<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'favoriteId',
        'create_at',
        'update_at',
        'status',
        'account_id',
        'story_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'favoriteId' => 'integer',
        'create_at' => 'timestamp',
        'update_at' => 'timestamp',
        'account_id' => 'integer',
        'story_id' => 'integer',
    ];

    public function favoriteId(): BelongsTo
    {
        return $this->belongsTo(FavoriteId::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }
}
