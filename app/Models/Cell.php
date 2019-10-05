<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    protected $guarded = [];

    /*protected $hidden = [
        'mine'
    ];*/

    public function reveal()
    {
        $this->revealed = true;
        $this->save();
        if ($this->findNeighbors() === 0) {
            $this->floodFill($this->x, $this->y);
        };
        return $this;
    }
    public function findNeighbors()
    {
        $grid = $this->game->getAGrid();
        $rows = $this->game->rows;
        $cols = $this->game->cols;
        $n = 0;
        for ($offX = -1; $offX <= 1; $offX++) {
            $x = $this->x + $offX;
            for ($offY = -1; $offY <= 1; $offY++) {
                $y = $this->y + $offY;
                if ($x >= 0 && $x < $rows && $y >= 0 && $y < $cols && $grid[$x][$y]->mine) $n++;
            }
        }
        $this->around = $n;
        $this->save();
        return $n;
    }
    public function floodFill($x, $y)
    {
        $grid = $this->game->getAGrid();
        $rows = $this->game->rows;
        $cols = $this->game->cols;
        $n = 0; //
        for ($offX = -1; $offX <= 1; $offX++) {
            $x = $this->x + $offX;
            for ($offY = -1; $offY <= 1; $offY++) {
                $y = $this->y + $offY;
                if (
                    $x >= 0 && $x < $rows && $y >= 0 && $y < $cols
                    && !$grid[$x][$y]->mine
                    && !$grid[$x][$y]->revealed
                ) {
                    $cell = Cell::find($grid[$x][$y]->id);
                    $cell->reveal();
                }
                //if ($x >= 0 && $x < $rows && $y >= 0 && $y < $cols && $grid[$x][$y]->mine) $n++;//
            }
        }
        $this->around = $n; //
        $this->save(); //
        return $n; //
    }
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
