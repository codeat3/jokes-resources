<?php

namespace Codeat3\JokesResources\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Joke extends Irkfdb
{
    use HasFactory;

    public $guarded = [];

    // relationships
    public function sources(): BelongsToMany
    {
        return $this->belongsToMany(Source::class)
            ->withPivot('source_orig_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    // scopes
    public function scopeRandom($query)
    {
        return $query->inRandomOrder();
    }
}
