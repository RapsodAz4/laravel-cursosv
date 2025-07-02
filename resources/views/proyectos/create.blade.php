@extends('layout')

@section('title', 'Crear Proyecto')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1><i class="fas fa-plus-circle"></i> {{ isset($proyecto) ? 'Editar' : 'Crear' }} Proyecto</h1>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="form-card">
        <form action="{{ isset($proyecto) ? route('proyectos.update', $proyecto) : route('proyectos.store') }}" method="POST">
            @csrf
            @if(isset($proyecto)) @method('PUT') @endif
            
            <div class="form-group">
                <label for="NombreProyecto">
                    <i class="fas fa-tag"></i> Nombre del Proyecto
                </label>
                <input 
                    type="text" 
                    id="NombreProyecto"
                    name="NombreProyecto" 
                    placeholder="Ingrese el nombre del proyecto" 
                    value="{{ $proyecto->NombreProyecto ?? old('NombreProyecto') }}"
                    required
                >
                @error('NombreProyecto')
                    <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fuenteFondos">
                    <i class="fas fa-money-bill-wave"></i> Fuente de Fondos
                </label>
                <input 
                    type="text" 
                    id="fuenteFondos"
                    name="fuenteFondos" 
                    placeholder="Ej: Gobierno, ONG, Empresa privada" 
                    value="{{ $proyecto->fuenteFondos ?? old('fuenteFondos') }}"
                    required
                >
                @error('fuenteFondos')
                    <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="MontoPlanificado">
                        <i class="fas fa-dollar-sign"></i> Monto Planificado
                    </label>
                    <input 
                        type="number" 
                        id="MontoPlanificado"
                        name="MontoPlanificado" 
                        placeholder="0.00" 
                        step="0.01"
                        value="{{ $proyecto->MontoPlanificado ?? old('MontoPlanificado') }}"
                        required
                    >
                    @error('MontoPlanificado')
                        <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="MontoPatrocinado">
                        <i class="fas fa-handshake"></i> Monto Patrocinado
                    </label>
                    <input 
                        type="number" 
                        id="MontoPatrocinado"
                        name="MontoPatrocinado" 
                        placeholder="0.00" 
                        step="0.01"
                        value="{{ $proyecto->MontoPatrocinado ?? old('MontoPatrocinado') }}"
                        required
                    >
                    @error('MontoPatrocinado')
                        <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="MontoFondosPropios">
                        <i class="fas fa-piggy-bank"></i> Fondos Propios
                    </label>
                    <input 
                        type="number" 
                        id="MontoFondosPropios"
                        name="MontoFondosPropios" 
                        placeholder="0.00" 
                        step="0.01"
                        value="{{ $proyecto->MontoFondosPropios ?? old('MontoFondosPropios') }}"
                        required
                    >
                    @error('MontoFondosPropios')
                        <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($proyecto) ? 'Actualizar' : 'Crear' }} Proyecto
                </button>
                <a href="{{ route('proyectos.index') }}" class="btn btn-outline">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        margin: 0;
        padding: 20px;
        min-height: 100vh;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px;
        border-radius: 15px 15px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form-header h1 {
        margin: 0;
        font-size: 2.5em;
        font-weight: 300;
    }

    .form-header h1 i {
        margin-right: 15px;
        color: #ffd700;
    }

    .form-card {
        background: white;
        padding: 40px;
        border-radius: 0 0 15px 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #495057;
        font-size: 14px;
    }

    label i {
        margin-right: 8px;
        color: #667eea;
    }

    input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    input:focus {
        border-color: #667eea;
        outline: none;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    input::placeholder {
        color: #adb5bd;
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }

    .error-message i {
        margin-right: 5px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        min-width: 140px;
        justify-content: center;
    }

    .btn-primary {
        background: #28a745;
        color: white;
    }

    .btn-primary:hover {
        background: #218838;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-outline {
        background: transparent;
        color: #6c757d;
        border: 2px solid #6c757d;
    }

    .btn-outline:hover {
        background: #6c757d;
        color: white;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .form-header {
            flex-direction: column;
            text-align: center;
        }

        .form-header h1 {
            font-size: 2em;
        }

        .form-card {
            padding: 20px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>
@endsection
