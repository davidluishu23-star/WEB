<?php 
session_start();
include 'conexion.php'; // Incluir la conexión a la base de datos

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['cliente_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
$exito = '';

// Inicializar variables para evitar "undefined variable"
$nombre = $email = $telefono = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    $telefono = trim($_POST['telefono'] ?? '');
    
    // Validaciones
    if (empty($nombre) || empty($email) || empty($password) || empty($password_confirm)) {
        $error = 'Por favor complete todos los campos requeridos.';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El correo electrónico no es válido.';
    } else if (strlen($password) < 6) {
        $error = 'La contraseña debe tener al menos 6 caracteres.';
    } else if ($password !== $password_confirm) {
        $error = 'Las contraseñas no coinciden.';
    } else {
        // Encriptar la contraseña
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        // Verificar si el correo ya está registrado
        $stmt = $conn->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = 'El correo electrónico ya está registrado.';
        } else {
            // Insertar el usuario en la base de datos
            $stmt = $conn->prepare("INSERT INTO clientes (nombre, email, password, telefono) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $nombre, $email, $hashed_password, $telefono);
            
            if ($stmt->execute()) {
                // Registro exitoso
                $exito = '¡Registro exitoso! Por favor inicia sesión con tus credenciales.';
                // Limpiar formulario
                $nombre = $email = $password = $password_confirm = $telefono = '';
            } else {
                $error = 'Error al registrar el usuario. Intenta nuevamente.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Corporación L&E SAC</title>
    <link rel="icon" href="assets/logo.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="styles/main.css">
    <style>
        .registro-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(120deg, #a8edea 0%, #c4ebe8 100%);
            padding: 1rem;
        }
        
        .registro-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px #43ea7c44;
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            border: 2px solid #e0f7fa;
        }
        
        .registro-card h1 {
            color: #009688;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        
        .registro-card p {
            text-align: center;
            color: #666;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .form-row.full {
            grid-template-columns: 1fr;
        }
        
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        .form-group label {
            display: block;
            color: #009688;
            font-weight: 600;
            margin-bottom: 0.4rem;
            font-size: 0.95rem;
        }
        
        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0f7fa;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #009688;
            box-shadow: 0 0 8px #43ea7c44;
        }
        
        .btn-registro {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(120deg, #009688 0%, #43ea7c 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 0.5rem;
        }
        
        .btn-registro:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px #43ea7c66;
        }
        
        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid #c62828;
            font-size: 0.95rem;
        }
        
        .success-message {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid #2e7d32;
            font-size: 0.95rem;
        }
        
        .registro-footer {
            margin-top: 1.5rem;
            text-align: center;
            border-top: 1px solid #e0f7fa;
            padding-top: 1rem;
        }
        
        .registro-footer p {
            margin-bottom: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }
        
        .registro-footer a {
            color: #009688;
            text-decoration: none;
            font-weight: 600;
        }
        
        .registro-footer a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .registro-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="registro-container">
        <div class="registro-card">
            <h1>Crear Cuenta</h1>
            <p>Únete a la comunidad de Corporación L&E SAC</p>
            
            <?php if (!empty($error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <?php if (!empty($exito)): ?>
                <div class="success-message">
                    <?php echo htmlspecialchars($exito); ?>
                    <br><br>
                    <a href="login.php" style="color: #2e7d32; text-decoration: none; font-weight: 600;">→ Inicia sesión aquí</a>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-row full">
                    <div class="form-group">
                        <label for="nombre">Nombre Completo:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Tu nombre completo" value="<?php echo htmlspecialchars($nombre); ?>">
                    </div>
                </div>
                
                <div class="form-row full">
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required placeholder="tu@email.com" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                </div>
                
                <div class="form-row full">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="+51 123456789" value="<?php echo htmlspecialchars($telefono); ?>">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Confirmar Contraseña:</label>
                        <input type="password" id="password_confirm" name="password_confirm" required placeholder="••••••••">
                    </div>
                </div>
                
                <button type="submit" class="btn-registro">Crear Cuenta</button>
            </form>
            
            <div class="registro-footer">
                <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
                <p><a href="index.php">← Volver al inicio</a></p>
            </div>
        </div>
    </div>
</body>
</html>