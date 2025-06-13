@extends('layout')

@section('content')
<h1>{{ isset($proyecto) ? 'Editar Proyecto' : 'Crear Proyecto' }}</h1>

<form 
    action="{{ isset($proyecto) 
        ? route('proyectos.update', $proyecto->id) 
        : route('proyectos.store') 
    }}" 
    method="POST"
>
    @csrf
    @if (isset($proyecto))
        @method('PUT')
    @endif

    <label>Nombre del Proyecto:</label>
    <input type="text" name="NombreProyecto" value="{{ old('NombreProyecto', $proyecto->NombreProyecto ?? '') }}" required>

    <label>Fuente de Fondos:</label>
    <input type="text" name="fuenteFondos" value="{{ old('fuenteFondos', $proyecto->fuenteFondos ?? '') }}" required>

    <label>Monto Planificado:</label>
    <input type="number" step="0.01" name="MontoPlanificado" value="{{ old('MontoPlanificado', $proyecto->MontoPlanificado ?? '') }}" required>

    <label>Monto Patrocinado:</label>
    <input type="number" step="0.01" name="MontoPatrocinado" value="{{ old('MontoPatrocinado', $proyecto->MontoPatrocinado ?? '') }}" required>

    <label>Monto Fondos Propios:</label>
    <input type="number" step="0.01" name="MontoFondosPropios" value="{{ old('MontoFondosPropios', $proyecto->MontoFondosPropios ?? '') }}" required>

    <button type="submit">{{ isset($proyecto) ? 'Actualizar' : 'Guardar' }}</button>
</form>
@endsection
