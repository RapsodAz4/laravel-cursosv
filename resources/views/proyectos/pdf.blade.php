<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Proyectos - Gobierno de El Salvador</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12px;
            margin: 30px;
            line-height: 1.4;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #003366;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #003366;
            font-size: 24px;
            margin: 0 0 10px 0;
            font-weight: bold;
        }
        
        .header h2 {
            color: #666;
            font-size: 18px;
            margin: 0 0 5px 0;
            font-weight: normal;
        }
        
        .header p {
            color: #888;
            font-size: 14px;
            margin: 5px 0;
        }
        
        .report-info {
            margin-bottom: 30px;
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #003366;
        }
        
        .report-info p {
            margin: 5px 0;
            font-weight: bold;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 11px;
        }
        
        th {
            background-color: #003366;
            color: white;
            padding: 10px 8px;
            text-align: center;
            font-weight: bold;
            border: 1px solid #002244;
        }
        
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f0f0f0;
        }
        
        .currency {
            text-align: right;
            font-family: 'Courier New', monospace;
            font-weight: bold;
        }
        
        .total-row {
            background-color: #e6f3ff !important;
            font-weight: bold;
            border-top: 2px solid #003366;
        }
        
        .total-row td {
            border-top: 2px solid #003366;
        }
        
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        
        .page-number {
            text-align: center;
            margin-top: 20px;
            font-size: 10px;
            color: #999;
        }
        
        @page {
            margin: 2cm;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>REPÚBLICA DE EL SALVADOR</h1>
        <h2>Gobierno de El Salvador</h2>
        <h2>Sistema de Gestión de Proyectos</h2>
        <p>Informe de Proyectos Registrados</p>
        <p>Fecha de generación: {{ $fecha }}</p>
    </div>

    <div class="report-info">
        <p>Total de proyectos registrados: {{ $proyectos->count() }}</p>
        <p>Período: {{ $fecha }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 25%;">Nombre del Proyecto</th>
                <th style="width: 20%;">Fuente de Fondos</th>
                <th style="width: 15%;">Monto Planificado</th>
                <th style="width: 15%;">Monto Patrocinado</th>
                <th style="width: 15%;">Fondos Propios</th>
                <th style="width: 5%;">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPlanificado = 0;
                $totalPatrocinado = 0;
                $totalPropios = 0;
            @endphp
            
            @foreach($proyectos as $proyecto)
                @php
                    $totalProyecto = $proyecto->MontoPlanificado + $proyecto->MontoPatrocinado + $proyecto->MontoFondosPropios;
                    $totalPlanificado += $proyecto->MontoPlanificado;
                    $totalPatrocinado += $proyecto->MontoPatrocinado;
                    $totalPropios += $proyecto->MontoFondosPropios;
                @endphp
                <tr>
                    <td style="text-align: center;">{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->NombreProyecto }}</td>
                    <td>{{ $proyecto->fuenteFondos }}</td>
                    <td class="currency">${{ number_format($proyecto->MontoPlanificado, 2) }}</td>
                    <td class="currency">${{ number_format($proyecto->MontoPatrocinado, 2) }}</td>
                    <td class="currency">${{ number_format($proyecto->MontoFondosPropios, 2) }}</td>
                    <td class="currency">${{ number_format($totalProyecto, 2) }}</td>
                </tr>
            @endforeach
            
            <tr class="total-row">
                <td colspan="3" style="text-align: center; font-weight: bold;">TOTALES</td>
                <td class="currency">${{ number_format($totalPlanificado, 2) }}</td>
                <td class="currency">${{ number_format($totalPatrocinado, 2) }}</td>
                <td class="currency">${{ number_format($totalPropios, 2) }}</td>
                <td class="currency">${{ number_format($totalPlanificado + $totalPatrocinado + $totalPropios, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Este documento fue generado automáticamente por el Sistema de Gestión de Proyectos</p>
        <p>Gobierno de El Salvador - {{ $fecha }}</p>
    </div>

    <div class="page-number">
        Página 1 de 1
    </div>

</body>
</html>
