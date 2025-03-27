<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoryId',
        'name',
        'description',
        'create_at',
        'update_at',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categoryId' => 'integer',
        'create_at' => 'timestamp',
        'update_at' => 'timestamp',
    ];

    public function categoryId(): BelongsTo
    {
        return $this->belongsTo(CategoryId::class);
    }
}
