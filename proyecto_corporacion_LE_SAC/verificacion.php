<?php
/**
 * VERIFICACIÓN DEL SISTEMA DE AUTENTICACIÓN
 * Este archivo comprueba que todos los componentes están instalados correctamente
 */

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>✓ Verificación del Sistema</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .container {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
        }
        .header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            border-bottom: 3px solid #667eea;
            padding-bottom: 1rem;
        }
        .header h1 {
            font-size: 1.8rem;
            color: #333;
        }
        .emoji {
            font-size: 2.5rem;
        }
        .status {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .status.ok {
            background: #d4edda;
            border-left: 4px solid #28a745;
        }
        .status.ok .badge {
            background: #28a745;
        }
        .status.error {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
        }
        .status.error .badge {
            background: #dc3545;
        }
        .status.warning {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
        }
        .status.warning .badge {
            background: #ffc107;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .status-text {
            flex: 1;
        }
        .status-text strong {
            display: block;
            margin-bottom: 0.2rem;
        }
        .status-text small {
            color: #666;
        }
        .results {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 2px solid #e0e0e0;
        }
        .results h2 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }
        .button-group {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }
        .btn {
            flex: 1;
            min-width: 150px;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-primary:hover {
            background: #764ba2;
            transform: translateY(-2px);
        }
        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-success:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        .alert {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
            color: #0c5aa0;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <span class='emoji'>✓</span>
            <h1>Verificación del Sistema</h1>
        </div>";

// Definir archivos requeridos
$archivos = [
    'login.php' => 'Página de inicio de sesión',
    'registro.php' => 'Página de registro',
    'dashboard.php' => 'Panel de cliente',
    'index.php' => 'Página principal',
    'styles/main.css' => 'Estilos CSS',
];

$archivos_documentacion = [
    'SISTEMA_AUTENTICACION_README.md' => 'Documentación del sistema',
    'GUIA_PRUEBAS.html' => 'Guía de pruebas',
    'CAMBIOS_REALIZADOS.md' => 'Resumen de cambios',
];

$directorio = dirname(__FILE__);
$todos_ok = true;
$contador_ok = 0;
$contador_total = 0;

echo "<div class='results'>";
echo "<h2>📁 Archivos Principales</h2>";

foreach ($archivos as $archivo => $descripcion) {
    $ruta = $directorio . '/' . $archivo;
    $contador_total++;
    
    if (file_exists($ruta)) {
        $contador_ok++;
        $tamaño = filesize($ruta);
        $kb = round($tamaño / 1024, 2);
        echo "<div class='status ok'>
                <div class='badge'>✓</div>
                <div class='status-text'>
                    <strong>$archivo</strong>
                    <small>$descripcion ($kb KB)</small>
                </div>
              </div>";
    } else {
        $todos_ok = false;
        echo "<div class='status error'>
                <div class='badge'>✗</div>
                <div class='status-text'>
                    <strong>$archivo</strong>
                    <small>⚠️ No encontrado: $descripcion</small>
                </div>
              </div>";
    }
}

echo "<h2 style='margin-top: 1.5rem;'>📚 Documentación</h2>";

foreach ($archivos_documentacion as $archivo => $descripcion) {
    $ruta = $directorio . '/' . $archivo;
    $contador_total++;
    
    if (file_exists($ruta)) {
        $contador_ok++;
        echo "<div class='status ok'>
                <div class='badge'>✓</div>
                <div class='status-text'>
                    <strong>$archivo</strong>
                    <small>📖 $descripcion</small>
                </div>
              </div>";
    } else {
        echo "<div class='status warning'>
                <div class='badge'>!</div>
                <div class='status-text'>
                    <strong>$archivo</strong>
                    <small>⚠️ Documentación no encontrada (opcional)</small>
                </div>
              </div>";
    }
}

echo "</div>";

// Resumen
$porcentaje = round(($contador_ok / $contador_total) * 100);
$estado_color = $todos_ok ? 'ok' : 'warning';
$estado_icon = $todos_ok ? '✓' : '⚠️';

echo "<div class='status $estado_color' style='margin-top: 1.5rem;'>
        <div class='badge' style='font-size: 1.5rem;'>$estado_icon</div>
        <div class='status-text'>
            <strong>Estado General</strong>
            <small>$contador_ok/$contador_total archivos disponibles ($porcentaje%)</small>
        </div>
      </div>";

if ($todos_ok) {
    echo "<div class='alert'>
            <strong>✓ Sistema completamente instalado y listo para usar</strong>
          </div>";
}

// Botones de acceso rápido
echo "<div class='button-group'>
        <a href='index.php' class='btn btn-primary'>← Ir a Inicio</a>
        <a href='login.php' class='btn btn-primary'>Acceder</a>
        <a href='registro.php' class='btn btn-success'>Registrarse</a>
      </div>";

// Información de credenciales demo
echo "<div style='margin-top: 2rem; padding: 1rem; background: #f0f7ff; border-radius: 8px; border-left: 4px solid #2196F3;'>
        <strong style='color: #0c5aa0;'>🔐 Credenciales de Demostración</strong><br><br>
        <small style='color: #0c5aa0;'>
            📧 Email: <code style='background: white; padding: 2px 4px; border-radius: 3px;'>cliente1@example.com</code><br>
            🔑 Contraseña: <code style='background: white; padding: 2px 4px; border-radius: 3px;'>123456</code>
        </small>
      </div>";

echo "</div></body></html>";
?>
