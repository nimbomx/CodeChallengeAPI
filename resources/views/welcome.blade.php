@extends('layouts.app')

@section('content')
<div class="container">

    <h1>GAME</h1>
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
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    POST
                </td>
                <td>
                    /api/game/create
                </td>
                <td>
                    { mines:INT, cols:INT,rows:INT }
                </td>
                <td>
<pre>
{
    game: {
        id:Int,
        cols:Int,
        rows:Int,
        mines:Int,
    },
    grid:[
        [{Cell},{Cell}]
    ]
}
</pre>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection
