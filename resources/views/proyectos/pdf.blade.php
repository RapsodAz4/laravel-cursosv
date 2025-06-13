<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Proyectos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 40px;
        }
        h1, h2 {
            text-align: center;
        }
        .encabezado {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="encabezado">
        <h2>Gobierno de El Salvador</h2>
        <h3>Nombre de su institución</h3>
        <p>Fecha: {{ $fecha }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre Proyecto</th>
                <th>Fuente de Fondos</th>
                <th>Monto Planificado</th>
                <th>Monto Patrocinado</th>
                <th>Monto Fondos Propios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->NombreProyecto }}</td>
                    <td>{{ $proyecto->fuenteFondos }}</td>
                    <td>${{ number_format($proyecto->MontoPlanificado, 2) }}</td>
                    <td>${{ number_format($proyecto->MontoPatrocinado, 2) }}</td>
                    <td>${{ number_format($proyecto->MontoFondosPropios, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
