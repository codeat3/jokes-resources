<?php

namespace Codeat3\JokesResources\Models;

use Codeat3\JokesResources\Database\Factories\JokeFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Joke extends Irkfdb
{
    use HasFactory;

    public $guarded = [];

    public $with = ['categories'];

    protected static function newFactory(): Factory
    {
        return JokeFactory::new();
    }

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

    public function scopeIncludeCategories(Builder $query, array $includes)
    {
        return $query->whereHas('categories', function (Builder $query) use ($includes) {
            $query->whereIn('title', $includes);
        });
    }

    public function scopeExcludeCategories(Builder $query, array $excludes)
    {
        return $query->whereHas('categories', function (Builder $query) use ($excludes) {
            $query->whereNotIn('title', $excludes);
        });
    }

    public function scopeFilterCategories(Builder $query, $includes, $excludes)
    {
        return $query->when(
            $includes,
            fn ($builder) => $builder->includeCategories(explode(',', $includes))
        )->when(
            $excludes,
            fn ($builder) => $builder->excludeCategories(explode(',', $excludes))
        );
    }
}
