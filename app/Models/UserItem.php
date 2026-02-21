<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserItem extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'rating',
        'completed_at',
        'started_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:1',
            'completed_at' => 'date',
            'started_at' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
