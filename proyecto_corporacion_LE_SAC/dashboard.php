<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['cliente_id'])) {
    header('Location: login.php');
    exit;
}

// Simular datos de compras del cliente (en producción buscar en BD)
$cliente_id = $_SESSION['cliente_id'];
$cliente_nombre = $_SESSION['cliente_nombre'];
$cliente_email = $_SESSION['cliente_email'];

// Datos de ejemplo de compras y pedidos
$compras_historial = [
    [
        'id' => 'PED001',
        'fecha' => '2024-11-05',
        'estado' => 'Entregado',
        'total' => 110.00,
        'productos' => [
            ['nombre' => 'Agua Fresh - 20L', 'cantidad' => 2, 'precio' => 35.00],
            ['nombre' => 'San Gregorio - 15L', 'cantidad' => 1, 'precio' => 40.00]
        ]
    ],
    [
        'id' => 'PED002',
        'fecha' => '2024-10-28',
        'estado' => 'Entregado',
        'total' => 85.50,
        'productos' => [
            ['nombre' => 'Agua Crush - 20L', 'cantidad' => 3, 'precio' => 28.50]
        ]
    ],
    [
        'id' => 'PED003',
        'fecha' => '2024-11-10',
        'estado' => 'En proceso',
        'total' => 197.00,
        'productos' => [
            ['nombre' => 'Agua Fresh - 20L', 'cantidad' => 4, 'precio' => 35.00],
            ['nombre' => 'Agua Crush - 20L', 'cantidad' => 2, 'precio' => 28.50]
        ]
    ]
];

// Estadísticas
$total_compras = count($compras_historial);
$total_gastado = array_sum(array_column($compras_historial, 'total'));
$entregados = count(array_filter($compras_historial, fn($c) => $c['estado'] === 'Entregado'));
$en_proceso = count(array_filter($compras_historial, fn($c) => $c['estado'] === 'En proceso'));

// Función para mostrar estado con color
function get_estado_color($estado) {
    return $estado === 'Entregado' ? 'green' : 'orange';
}

// Cerrar sesión
if ($_POST['accion'] ?? '' === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Cliente - Corporación L&E SAC</title>
    <link rel="icon" href="assets/logo.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="styles/main.css">
    <style>
        .dashboard-container {
            background: linear-gradient(120deg, #a8edea 0%, #c4ebe8 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
        }
        
        .dashboard-header {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px #43ea7c22;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid #e0f7fa;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .dashboard-header h1 {
            color: #009688;
            font-size: 1.8rem;
            margin: 0;
        }
        
        .dashboard-header p {
            color: #666;
            margin: 0;
            font-size: 0.95rem;
        }
        
        .user-info {
            text-align: left;
        }
        
        .user-info .email {
            color: #009688;
            font-weight: 600;
            margin-top: 0.3rem;
        }
        
        .logout-btn {
            background: linear-gradient(120deg, #e53935 0%, #d32f2f 100%);
            color: #fff;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            font-size: 0.95rem;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px #e5393544;
        }
        
        .dashboard-content {
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 16px #43ea7c22;
            border-left: 5px solid;
            text-align: center;
            animation: fadeInUp 0.8s cubic-bezier(.68,-0.55,.27,1.55);
        }
        
        .stat-card.compras {
            border-left-color: #009688;
        }
        
        .stat-card.gastado {
            border-left-color: #43ea7c;
        }
        
        .stat-card.entregados {
            border-left-color: #4caf50;
        }
        
        .stat-card.proceso {
            border-left-color: #ff9800;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #009688;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.95rem;
            font-weight: 600;
        }
        
        .historial-section {
            background: #fff;
            border-radius: 18px;
            padding: 2rem;
            box-shadow: 0 4px 24px #43ea7c22;
            border: 2px solid #e0f7fa;
            animation: fadeInUp 0.8s cubic-bezier(.68,-0.55,.27,1.55);
        }
        
        .historial-section h2 {
            color: #009688;
            font-size: 1.6rem;
            margin-top: 0;
            margin-bottom: 1.5rem;
        }
        
        .historial-section h2::after {
            content: "";
            display: block;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #43ea7c 0%, #009688 100%);
            margin-top: 0.5rem;
        }
        
        .pedido-item {
            border: 2px solid #e0f7fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: box-shadow 0.3s;
        }
        
        .pedido-item:hover {
            box-shadow: 0 4px 12px #43ea7c44;
        }
        
        .pedido-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .pedido-id {
            font-weight: 700;
            color: #009688;
            font-size: 1.1rem;
        }
        
        .pedido-fecha {
            color: #666;
            font-size: 0.9rem;
        }
        
        .estado-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }
        
        .estado-badge.green {
            background: #e8f5e9;
            color: #2e7d32;
            border: 2px solid #4caf50;
        }
        
        .estado-badge.orange {
            background: #fff3e0;
            color: #e65100;
            border: 2px solid #ff9800;
        }
        
        .productos-lista {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        
        .producto-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e0e0e0;
            font-size: 0.95rem;
        }
        
        .producto-item:last-child {
            border-bottom: none;
        }
        
        .pedido-total {
            text-align: right;
            font-weight: 700;
            color: #009688;
            font-size: 1.1rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid #e0f7fa;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #999;
        }
        
        .empty-state svg {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .pedido-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Encabezado del Dashboard -->
        <div class="dashboard-header">
            <div class="user-info">
                <h1>👤 Bienvenido, <?php echo htmlspecialchars($cliente_nombre); ?></h1>
                <p class="email"><?php echo htmlspecialchars($cliente_email); ?></p>
            </div>
            <form method="POST" style="margin: 0;">
                <input type="hidden" name="accion" value="logout">
                <button type="submit" class="logout-btn">Cerrar Sesión</button>
            </form>
        </div>
        
        <!-- Contenido del Dashboard -->
        <div class="dashboard-content">
            <!-- Tarjetas de Estadísticas -->
            <div class="stats-container">
                <div class="stat-card compras">
                    <div class="stat-number"><?php echo $total_compras; ?></div>
                    <div class="stat-label">Compras Realizadas</div>
                </div>
                <div class="stat-card gastado">
                    <div class="stat-number">S/. <?php echo number_format($total_gastado, 2); ?></div>
                    <div class="stat-label">Total Gastado</div>
                </div>
                <div class="stat-card entregados">
                    <div class="stat-number"><?php echo $entregados; ?></div>
                    <div class="stat-label">Pedidos Entregados</div>
                </div>
                <div class="stat-card proceso">
                    <div class="stat-number"><?php echo $en_proceso; ?></div>
                    <div class="stat-label">En Proceso</div>
                </div>
            </div>
            
            <!-- Historial de Compras -->
            <div class="historial-section">
                <h2>📦 Historial de Compras y Pedidos</h2>
                
                <?php if (empty($compras_historial)): ?>
                    <div class="empty-state">
                        <p>No tienes pedidos aún</p>
                        <p><a href="index.php" style="color: #009688; text-decoration: none; font-weight: 600;">Realiza tu primera compra →</a></p>
                    </div>
                <?php else: ?>
                    <?php foreach ($compras_historial as $pedido): ?>
                        <div class="pedido-item">
                            <div class="pedido-header">
                                <div>
                                    <div class="pedido-id">Pedido: <?php echo $pedido['id']; ?></div>
                                    <div class="pedido-fecha">📅 <?php echo date('d/m/Y', strtotime($pedido['fecha'])); ?></div>
                                </div>
                                <span class="estado-badge <?php echo get_estado_color($pedido['estado']); ?>">
                                    <?php echo $pedido['estado']; ?>
                                </span>
                            </div>
                            
                            <div class="productos-lista">
                                <?php foreach ($pedido['productos'] as $producto): ?>
                                    <div class="producto-item">
                                        <span><?php echo htmlspecialchars($producto['nombre']); ?> x<?php echo $producto['cantidad']; ?></span>
                                        <span>S/. <?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="pedido-total">
                                Total: S/. <?php echo number_format($pedido['total'], 2); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Opciones adicionales -->
            <div style="text-align: center; margin-top: 2rem; padding-bottom: 2rem;">
                <p><a href="index.php" style="color: #009688; text-decoration: none; font-weight: 600; font-size: 1rem;">← Volver al inicio</a></p>
            </div>
        </div>
    </div>
</body>
</html>
