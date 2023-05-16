<?php

namespace Codeat3\JokesResources\Models;

use Codeat3\JokesResources\Database\Factories\TypeFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Type extends Irkfdb
{
    use HasFactory;

    public $guarded = [];

    protected static function newFactory(): Factory
    {
        return TypeFactory::new();
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => [
                'title' => $value,
                'slug' => Str::slug($value),
            ]
        );
    }

    public function jokes(): BelongsToMany
    {
        return $this->belongsToMany(Joke::class);
    }
}
