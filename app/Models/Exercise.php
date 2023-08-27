<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exercise extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::addGlobalScope('order_by_name', function (Builder $builder) {
            $builder->orderBy('name');
        });
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
