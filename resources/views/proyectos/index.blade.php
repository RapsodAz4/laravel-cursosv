@extends('layout')

@section('content')
<h1>Lista de Proyectos</h1>
<a href="{{ route('proyectos.create') }}">Crear nuevo proyecto</a>
<table>
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Fondos</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $proyecto)
        <tr>
            <td>{{ $proyecto->id }}</td>
            <td>{{ $proyecto->NombreProyecto }}</td>
            <td>{{ $proyecto->fuenteFondos }}</td>
            <td>
                <a href="{{ route('proyectos.edit', $proyecto) }}">Editar</a>
                <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
        background-image: url('public/img/svlog.png'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center; 
        background-color: rgba(255, 255, 255, 0.5); 
    }

    h1 {
        text-align: center;
        color: #333;
    }

    a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        margin: 10px 0;
        padding: 10px;
        border-radius: 4px;

    }

    a:hover {
        text-decoration: underline;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    button {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #c82333;
    }

    .create-button {
        display: block;
        margin: 20px auto;
        padding: 10px 15px;
        background-color: #28a745;
        color: white;
        text-align: center;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    .create-button:hover {
        background-color: #218838;
    }

    
</style>

@endsection
