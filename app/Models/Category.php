<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::addGlobalScope('order_by_name', function (Builder $builder) {
            $builder->orderBy('name');
        });
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }
}
