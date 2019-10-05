<?php

namespace App\Http\Controllers;

use App\Models\Cell;
use Illuminate\Http\Request;

class CellController extends Controller
{

    public function reveal(Cell $cell)
    {

        $cell = $cell->reveal();
        $game = $cell->game;
        $data['grid'] = $game->getAGrid();
        $data['status'] = $cell->mine ? 'boom' : 'ok';
        return $data;
    }
    public function flag(Cell $cell)
    {
        if (!$cell->mark) $cell->mark = 'flag';
        elseif ($cell->mark == 'flag') $cell->mark = 'question';
        else $cell->mark = null;
        $cell->save();
        return $cell;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function show(Cell $cell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function edit(Cell $cell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cell $cell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cell  $cell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cell $cell)
    {
        //
    }
}
