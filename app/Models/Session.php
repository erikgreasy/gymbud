<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Session extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('order_by_date', function (Builder $builder) {
            $builder->orderByDesc('date');
        });

        static::creating(function (Session $session) {
            $session->user_id = auth()->id();
        });
    }

    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function lastRecord(): HasOne
    {
        return $this->hasOne(Record::class)->latestOfMany();
    }
}
