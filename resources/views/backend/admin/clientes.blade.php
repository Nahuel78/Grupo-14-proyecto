@extends('layouts.app')

@section('content')

<div class="container">

    <h2 style="color:white;">
        Clientes Registrados
    </h2>

    <table class="table table-bordered bg-white">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>

        <tbody>

            @foreach($clientes as $cliente)

            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->name }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->created_at->format('d/m/Y') }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection