@extends('layout')

@section('title', 'Lista de Proyectos')

@section('content')
<div class="projects-container">
    <div class="header">
        <h1><i class="fas fa-project-diagram"></i> Lista de Proyectos</h1>
        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear nuevo proyecto
        </a>
    </div>

    <div class="actions-bar">
        <a href="{{ route('proyectos.pdf') }}" class="btn btn-secondary">
            <i class="fas fa-file-pdf"></i> Generar PDF General
        </a>
    </div>

    <div class="table-container">
        <table class="projects-table">
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> ID</th>
                    <th><i class="fas fa-tag"></i> Nombre del Proyecto</th>
                    <th><i class="fas fa-money-bill-wave"></i> Fuente de Fondos</th>
                    <th><i class="fas fa-dollar-sign"></i> Monto Planificado</th>
                    <th><i class="fas fa-handshake"></i> Monto Patrocinado</th>
                    <th><i class="fas fa-piggy-bank"></i> Monto Fondos Propios</th>
                    <th><i class="fas fa-cogs"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->NombreProyecto }}</td>
                    <td>{{ $proyecto->fuenteFondos }}</td>
                    <td>${{ number_format($proyecto->MontoPlanificado, 2) }}</td>
                    <td>${{ number_format($proyecto->MontoPatrocinado, 2) }}</td>
                    <td>${{ number_format($proyecto->MontoFondosPropios, 2) }}</td>
                    <td class="actions">
                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-edit" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('proyectos.pdf.proyecto', $proyecto->id) }}" class="btn btn-pdf" title="Descargar PDF">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este proyecto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>No hay proyectos registrados</p>
                        <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Crear primer proyecto</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .projects-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        background: rgba(255, 255, 255, 0.95);
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        color: #333;
        margin: 0;
        font-size: 2.5em;
        font-weight: bold;
    }

    .header h1 i {
        color: #667eea;
        margin-right: 15px;
    }

    .actions-bar {
        margin-bottom: 20px;
        text-align: right;
    }

    .table-container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .projects-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    .projects-table th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .projects-table th i {
        margin-right: 8px;
    }

    .projects-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        font-size: 14px;
    }

    .projects-table tr:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }

    .actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(240, 147, 251, 0.4);
    }

    .btn-edit {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 6px 12px;
        font-size: 12px;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
    }

    .btn-pdf {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
        padding: 6px 12px;
        font-size: 12px;
    }

    .btn-pdf:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(250, 112, 154, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: white;
        padding: 6px 12px;
        font-size: 12px;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 154, 158, 0.4);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }

    .empty-state i {
        font-size: 4em;
        color: #ddd;
        margin-bottom: 20px;
        display: block;
    }

    .empty-state p {
        font-size: 18px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .header h1 {
            font-size: 2em;
        }

        .projects-table {
            font-size: 12px;
        }

        .projects-table th,
        .projects-table td {
            padding: 8px;
        }

        .actions {
            flex-direction: column;
            gap: 4px;
        }

        .btn {
            padding: 6px 10px;
            font-size: 12px;
        }
    }
</style>
@endsection
