<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Exercise extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope('order_by_name', function (Builder $builder) {
            $builder->orderBy('name');
        });
    }

    public function prFor(int $reps): ?Record
    {
        return $this->prs->where('reps', $reps)->first();
    }

    public function prs(): HasMany
    {
        return $this->records()->prs()->orderBy('reps');
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function lastRecord(): HasOne
    {
        return $this->hasOne(Record::class)->latest();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
