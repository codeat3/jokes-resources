<?php

namespace Codeat3\JokesResources\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiEvent extends Model
{
    use HasFactory;

    public $guarded = [];

    public function getConnectionName()
    {
        return config('jokes-resources.database.connection');
    }
}
