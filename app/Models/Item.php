<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = [
        'content_type_id',
        'title',
        'description',
        'release_date',
    ];

    protected function casts(): array
    {
        return [
            'release_date' => 'date',
        ];
    }

    public function contentType(): BelongsTo
    {
        return $this->belongsTo(ContentType::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_items')
            ->withPivot(['rating', 'started_at', 'completed_at', 'notes']);
    }

    public function links(): HasMany
    {
        return $this->hasMany(ItemLink::class);
    }
}
