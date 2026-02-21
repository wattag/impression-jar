<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = [
        'content_type_id',
        'title',
        'description',
        'image',
        'release_date',
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'release_date' => 'date',
            'metadata' => 'array',
        ];
    }

    public function contentType(): BelongsTo
    {
        return $this->belongsTo(ContentType::class);
    }

    public function userItems(): HasMany
    {
        return $this->hasMany(UserItem::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(ItemLink::class)->orderBy('sort_order');
    }
}
