<?php

namespace Codeat3\JokesResources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Irkfdb extends Model
{
    use HasUlids;

    public function getConnectionName()
    {
        return config('irkfdb.database.connection');
    }
}
