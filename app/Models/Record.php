<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }
}
