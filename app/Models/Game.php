<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];



    public function generateGrid()
    {
        foreach (range(0, $this->rows - 1) as $row) {
            foreach (range(0, $this->cols - 1) as $col) {
                $this->cells()->create([
                    'x' => $col,
                    'y' => $row
                ]);
            }
        }
        $this->cells()->inRandomOrder()->take($this->mines)->update(['mine' => true]);
    }
    public function getAGrid()
    {
        $grid = [];
        foreach ($this->rows() as $row) {
            $grid[$row] = $this->cells()->where('x', $row)->get();
        }
        return $grid;
    }

    public function rows()
    {
        return $this->cells()->select('x')->groupBy('x')->pluck('x');
    }

    public function cells()
    {
        return $this->hasMany(Cell::class);
    }
}
