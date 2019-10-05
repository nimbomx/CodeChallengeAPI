@extends('layouts.app')

@section('content')
<div class="container">



    <h1>Mineswap API Docs</h1>
    <table class="table">
        <thead>
            <tr>
                <th>
                    Method
                </th>
                <th>
                    URL
                </th>
                <th>
                    Params
                </th>
                <th>
                    Response
                </th>
                <th>
                    Description
                </th>
            </tr>
        </thead>

        <tbody>



            <tr>
                    <td>GET </td>
                    <td> /api/games</td>
                    <td></td>
                    <td>
Games: Array
                    </td>
                    <td>
Load the list of all available Games
                    </td>

</tr>
            <tr>
                    <td>GET </td>
                    <td> /api/game/{game}</td>
                    <td></td>
                    <td>
Game: Object<br>
Grid: Mulidimensional array
                    </td>
                    <td>
                        Load selected Game and grid
                     </td>
</tr>

<tr>
        <td>POST </td>
        <td> /api/game/create</td>
        <td> { mines:INT, cols:INT,rows:INT } </td>
        <td>
Game: Object
        </td>
        <td>
            Create a Game and return the Object (just Creation)
        </td>
</tr>


<tr>
        <td>POST </td>
        <td> /api/game/create-n-load</td>
        <td> { mines:INT, cols:INT,rows:INT } </td>
        <td>
                Game: Object<br>
                Grid: Mulidimensional array
        </td>
        <td>
            Create a Game and return the Object and The Grid (Create and Play)
        </td>
</tr>

              <!--


Route::get('/game/close/{game}', 'GameController@close');

Route::get('/game/reveal/{cell}', 'CellController@reveal');
Route::get('/game/flag/{cell}', 'CellController@flag');-->


<tr>
        <td>GET </td>
        <td> /api/game/close/{game}</td>
        <td></td>
        <td>
            none
        </td>
        <td>
            Stop the timer
        </td>
</tr>
<tr>
        <td>GET </td>
        <td> /api/game/reveal/{game}</td>
        <td> </td>
        <td>
                Grid: Mulidimensional array<br>
                iwin: Boolean<br>
                seconds: Int<br>
                status: String<br>
        </td>
        <td>
            Reveal the cell<br>
            If the cell has a mine, set the game es Loosed<br>
            If all the sasfecells was revealed, set the game as Winned<br>
            If Cell has no mines around, keep revealing
        </td>
</tr>
<tr>
        <td>GET </td>
        <td> /api/game/flag/{game}</td>
        <td>  </td>
        <td>
                Cell: Object
        </td>
        <td>
            Add a flag to the cell<br>
            First call set a 'flag'<br>
            Second call set a 'question'<br>
            Third call set a null

        </td>
</tr>

        </tbody>
    </table>

</div>
@endsection
