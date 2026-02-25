<?php

namespace App\Models;

use App\Enums\LinkTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemLink extends Model
{
    protected $fillable = [
        'item_id',
        'type',
        'title',
        'url',
    ];

    protected function casts(): array
    {
        return [
            'type' => LinkTypeEnum::class,
        ];
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
