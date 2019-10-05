<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Game extends Model
{
    protected $guarded = [];

    public function checkIfWin()
    {
        $cells = $this->cells()->count();
        $mines = $this->mines;
        $revealed = $this->cells()->where('revealed', true)->count();
        $safeCells = $cells - $mines;
        if ($revealed == $safeCells) {
            $this->winner();
            return true;
        } else {
            return false;
        }
    }
    public function close()
    {
        $this->setStopTime();
        $this->save();
    }
    public function winner()
    {
        $this->setStopTime();
        $this->endgame = date('Y-m-d H:i:s');
        $this->result = 'win';
        $this->save();
    }
    public function gameOver()
    {
        $this->setStopTime();
        $this->endgame = date('Y-m-d H:i:s');
        $this->result = 'loose';
        $this->save();
    }
    public function setStartTime()
    {
        if (!$this->endgame) {
            $this->start = date('Y-m-d H:i:s');
            $this->save();
        }
    }
    public function calculateTime()
    {
        $start = Carbon::parse($this->start);
        $stop = Carbon::parse($this->stop);
        $seconds = $this->time;
        $this->time = $seconds + $stop->diffInSeconds($start);
        //$this->time = date_diff(date_create($this->start), date_create($this->stop));
        $this->save();
    }
    public function setStopTime()
    {
        if (!$this->endgame) {
            $this->stop = date('Y-m-d H:i:s');
            $this->save();
            $this->calculateTime();
        }
    }
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
            $grid[$row] = [];
            foreach ($this->cells()->latest('y')->where('x', $row)->get() as $col) {
                $grid[$row][$col->y] = $col;
            }
        }
        return $grid;
    }

    public function rows()
    {
        return $this->cells()->select('x')->latest('x')->groupBy('x')->pluck('x');
    }

    public function cells()
    {
        return $this->hasMany(Cell::class);
    }
}
