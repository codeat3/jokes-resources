<?php

namespace Codeat3\JokesResources\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Irkfdb
{
    use HasFactory;

    public $guarded = [];

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
