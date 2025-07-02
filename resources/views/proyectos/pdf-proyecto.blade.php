<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Proyecto - Gobierno de El Salvador</title>
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
            font-size: 16px;
            margin: 0 0 5px 0;
            font-weight: normal;
        }
        
        .header .fecha {
            color: #999;
            font-size: 12px;
            margin: 0;
        }
        
        .project-info {
            margin-bottom: 30px;
        }
        
        .project-info h3 {
            color: #003366;
            font-size: 18px;
            margin: 0 0 15px 0;
            border-bottom: 2px solid #003366;
            padding-bottom: 5px;
        }
        
        .info-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        .info-row {
            display: table-row;
        }
        
        .info-label {
            display: table-cell;
            width: 30%;
            font-weight: bold;
            color: #003366;
            padding: 8px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
        
        .info-value {
            display: table-cell;
            width: 70%;
            padding: 8px;
            border: 1px solid #ddd;
        }
        
        .financial-summary {
            margin-top: 30px;
            border: 2px solid #003366;
            padding: 20px;
            background-color: #f8f9fa;
        }
        
        .financial-summary h4 {
            color: #003366;
            font-size: 16px;
            margin: 0 0 15px 0;
            text-align: center;
        }
        
        .financial-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }
        
        .financial-row {
            display: table-row;
        }
        
        .financial-label {
            display: table-cell;
            width: 50%;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #003366;
            background-color: #e3f2fd;
        }
        
        .financial-value {
            display: table-cell;
            width: 50%;
            padding: 10px;
            border: 1px solid #003366;
            text-align: right;
            font-weight: bold;
            color: #003366;
        }
        
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        
        .page-number {
            position: fixed;
            bottom: 20px;
            right: 30px;
            font-size: 10px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPÚBLICA DE EL SALVADOR</h1>
        <h2>GOBIERNO DE EL SALVADOR</h2>
        <h2>Sistema de Gestión de Proyectos</h2>
        <p class="fecha">Fecha de generación: {{ $fecha }}</p>
    </div>

    <div class="project-info">
        <h3>INFORMACIÓN DEL PROYECTO</h3>
        
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">ID del Proyecto:</div>
                <div class="info-value">{{ $proyecto->id }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Nombre del Proyecto:</div>
                <div class="info-value">{{ $proyecto->NombreProyecto }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Fuente de Fondos:</div>
                <div class="info-value">{{ $proyecto->fuenteFondos }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Fecha de Creación:</div>
                <div class="info-value">{{ $proyecto->created_at->format('d/m/Y H:i:s') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Última Actualización:</div>
                <div class="info-value">{{ $proyecto->updated_at->format('d/m/Y H:i:s') }}</div>
            </div>
        </div>
    </div>

    <div class="financial-summary">
        <h4>RESUMEN FINANCIERO</h4>
        
        <div class="financial-grid">
            <div class="financial-row">
                <div class="financial-label">Monto Planificado:</div>
                <div class="financial-value">${{ number_format($proyecto->MontoPlanificado, 2) }}</div>
            </div>
            <div class="financial-row">
                <div class="financial-label">Monto Patrocinado:</div>
                <div class="financial-value">${{ number_format($proyecto->MontoPatrocinado, 2) }}</div>
            </div>
            <div class="financial-row">
                <div class="financial-label">Monto Fondos Propios:</div>
                <div class="financial-value">${{ number_format($proyecto->MontoFondosPropios, 2) }}</div>
            </div>
            <div class="financial-row">
                <div class="financial-label">Total del Proyecto:</div>
                <div class="financial-value">${{ number_format($proyecto->MontoPlanificado + $proyecto->MontoPatrocinado + $proyecto->MontoFondosPropios, 2) }}</div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Este documento fue generado automáticamente por el Sistema de Gestión de Proyectos del Gobierno de El Salvador.</p>
        <p>Para más información, contacte a la administración del sistema.</p>
    </div>

    <div class="page-number">Página 1</div>
</body>
</html> 