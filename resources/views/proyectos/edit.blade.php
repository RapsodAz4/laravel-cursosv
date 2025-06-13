@extends('layout')

@section('content')
<div class="max-w-xl mx-auto p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Editar Proyecto</h2>

    <form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-bold">Nombre del Proyecto</label>
            <input type="text" name="NombreProyecto" class="w-full border rounded px-3 py-2" value="{{ old('NombreProyecto', $proyecto->NombreProyecto) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold">Fuente de Fondos</label>
            <input type="text" name="fuenteFondos" class="w-full border rounded px-3 py-2" value="{{ old('fuenteFondos', $proyecto->fuenteFondos) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold">Monto Planificado</label>
            <input type="number" step="0.01" name="MontoPlanificado" class="w-full border rounded px-3 py-2" value="{{ old('MontoPlanificado', $proyecto->MontoPlanificado) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold">Monto Patrocinado</label>
            <input type="number" step="0.01" name="MontoPatrocinado" class="w-full border rounded px-3 py-2" value="{{ old('MontoPatrocinado', $proyecto->MontoPatrocinado) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold">Monto Fondos Propios</label>
            <input type="number" step="0.01" name="MontoFondosPropios" class="w-full border rounded px-3 py-2" value="{{ old('MontoFondosPropios', $proyecto->MontoFondosPropios) }}">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('proyectos.index') }}" class="text-blue-500">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        </div>
    </form>
</div>

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
        margin-top: 10px;
    }

    button:hover {
        background-color: #218838;

    }

    a{
        
        margin-top: 10px;
        display: inline-block;
        padding: 10px 15px;
        background-color:rgb(233, 26, 26); 
        color: white; 
        text-decoration: none; 
        border-radius: 4px; 
        transition: background-color 0.3s; 
        justify-content: center;
    }

    a:hover {
        background-color: #0056b3; 
    }
    
</style>
@endsection
