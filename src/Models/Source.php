<?php

namespace Codeat3\JokesResources\Models;

use Codeat3\JokesResources\Database\Factories\SourceFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Source extends Irkfdb
{
    use HasFactory;

    public $guarded = [];

    protected static function newFactory(): Factory
    {
        return SourceFactory::new();
    }

    public function jokes(): BelongsToMany
    {
        return $this->belongsToMany(Joke::class);
    }
}
