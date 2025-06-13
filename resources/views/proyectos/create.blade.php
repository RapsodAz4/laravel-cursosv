@extends('layout')

@section('content')
<h1>{{ isset($proyecto) ? 'Editar' : 'Crear' }} Proyecto</h1>
<form action="{{ isset($proyecto) ? route('proyectos.update', $proyecto) : route('proyectos.store') }}" method="POST">
    @csrf
    @if(isset($proyecto)) @method('PUT') @endif
    <input name="NombreProyecto" placeholder="Nombre" value="{{ $proyecto->NombreProyecto ?? '' }}">
    <input name="fuenteFondos" placeholder="Fuente" value="{{ $proyecto->fuenteFondos ?? '' }}">
    <input name="MontoPlanificado" placeholder="Planificado" value="{{ $proyecto->MontoPlanificado ?? '' }}">
    <input name="MontoPatrocinado" placeholder="Patrocinado" value="{{ $proyecto->MontoPatrocinado ?? '' }}">
    <input name="MontoFondosPropios" placeholder="Fondos Propios" value="{{ $proyecto->MontoFondosPropios ?? '' }}">
    <button type="submit">Guardar</button>
</form>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 20px auto;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 4px;
        width: 100%;
    }

    button:hover {
        background-color: #218838;
    }
</style>

@endsection
