<!-- EXTEDING TEMPLATE BASE -->
@extends('layouts.app')

<!-- SECTION CONTENT ON BODY -->
@section('content')

    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;

    }

    th, td {
        padding: 15px;
    }

    table {
        border-spacing: 5px;   
    }

    ul.pagination li {
        padding: 2px 10px;
        display: inline-block;
    }
    ul.pagination li a {
        /* visual do link */
        background-color:#EDEDED;
        color: #333;
        text-decoration: none;
        border-bottom:3px solid #EDEDED;
    }

    ul.pagination li:hover {
    background-color:#D6D6D6;
    color: #6D6D6D;
    border-bottom:3px solid #EA0000;
    }

    .button {
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .btn-green {
        background-color: #4CAF50; /* Green */
    }


    .btn-red {
        background-color: #f44336; /* Red */
    }

    .btn-blue {
        background-color: #008CBA; /* Blue */
    }
}
    
    </style>
    <a class="button btn-green" href="/users/create">Novo usuário</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <!-- FOREACH OF BLADE TEMPLATE -->
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="button btn-blue" href="/users/edit/{{ $user->id }}">Editar</a>
                <a class="button btn-red" href="/users/destroy/{{ $user->id }}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </table>

    <?php
    if ($users->count() > 0) {
        echo $users->links();
    }
    ?>

@endsection