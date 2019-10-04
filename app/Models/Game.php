<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function cells()
    {
        return $this->hasMany(Cell::class);
    }
}
