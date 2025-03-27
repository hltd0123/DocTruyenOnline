<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acId',
        'userName',
        'email',
        'password',
        'role',
        'create_at',
        'update_at',
        'status',
        'comments',
        'favorites',
        'views',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'acId' => 'integer',
        'create_at' => 'timestamp',
        'update_at' => 'timestamp',
    ];

    public function acId(): BelongsTo
    {
        return $this->belongsTo(AcId::class);
    }
}
