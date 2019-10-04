<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    protected $guarded = [];

    public function reveal()
    {
        $this->revealed = true;
        $this->save();

        return $this;
    }
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
