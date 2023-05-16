<?php

namespace Codeat3\JokesResources\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Irkfdb extends Model
{
    use HasUlids;

    public function getConnectionName()
    {
        return config('jokes-resources.database.connection');
    }
}
