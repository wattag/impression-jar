<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemLink extends Model
{
    protected $fillable = [
        'item_id',
        'type',
        'title',
        'url',
        'sort_order',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
