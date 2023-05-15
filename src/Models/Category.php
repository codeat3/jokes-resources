<?php

namespace Codeat3\JokesResources\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Irkfdb
{
    use HasFactory;

    public $guarded = [];

    public function jokes(): BelongsToMany
    {
        return $this->belongsToMany(Joke::class);
    }
}
