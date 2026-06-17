@extends('layouts.app')

@section('content')

<div class="container">

<div class="mb-3" style="position: relative; z-index: 9999;">
    <a href="{{ route('admin.panel') }}" class="btn btn-secondary">
        ← Volver al Panel
    </a>
</div>

<h2 style="color:white;">
    Consultas de Clientes:
</h2>

    <table class="table table-bordered">

        <thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Asunto</th>
        <th>Mensaje</th>
        <th>Fecha</th>
        <th>Estado</th>
        </tr>
    </thead>

        <tbody>

            @foreach($consultas as $consulta)

          <tr>
                <td>{{ $consulta->nombre }}</td>
                <td>{{ $consulta->email }}</td>
                <td>{{ $consulta->asunto }}</td>
                <td>{{ $consulta->mensaje }}</td>
                <td>{{ $consulta->created_at->format('d/m/Y H:i') }}</td>
          <td>
    @if($consulta->leido)

        <span class="badge bg-success">
            ✓ Leído
        </span>

    @else

        <form action="{{ route('admin.consultas.leer', $consulta->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <button type="submit" class="btn btn-sm btn-warning">
                Marcar como leído
            </button>

        </form>

    @endif
</td>
</tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection