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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validar campos
    if (empty($email) || empty($password)) {
        $error = 'Por favor complete todos los campos.';
    } else {
        // Buscar al cliente en la base de datos
        $stmt = $conn->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El cliente fue encontrado
            $cliente = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $cliente['password'])) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['cliente_id'] = $cliente['id'];
                $_SESSION['cliente_nombre'] = $cliente['nombre'];
                $_SESSION['cliente_email'] = $cliente['email'];

                // Redirigir al panel de cliente
                header('Location: dashboard.php');
                exit;
            } else {
                // Contraseña incorrecta
                $error = 'Correo o contraseña incorrectos.';
            }
        } else {
            // El correo no está registrado
            $error = 'Correo o contraseña incorrectos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Corporación L&E SAC</title>
    <link rel="icon" href="assets/logo.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="styles/main.css">
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(120deg, #a8edea 0%, #c4ebe8 100%);
            padding: 1rem;
        }

        .login-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px #43ea7c44;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            border: 2px solid #e0f7fa;
        }

        .login-card h1 {
            color: #009688;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .login-card p {
            text-align: center;
            color: #666;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
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

        .btn-login {
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

        .btn-login:hover {
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

        .login-footer {
            margin-top: 1.5rem;
            text-align: center;
            border-top: 1px solid #e0f7fa;
            padding-top: 1rem;
        }

        .login-footer p {
            margin-bottom: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .login-footer a {
            color: #009688;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .demo-credentials {
            background: #e0f7fa;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.85rem;
            color: #00897b;
            border-left: 4px solid #009688;
        }

        .demo-credentials strong {
            display: block;
            margin-bottom: 0.3rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h1>Iniciar Sesión</h1>
            <p>Accede a tu cuenta de cliente</p>

            <?php if (!empty($error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <?php if (!empty($exito)): ?>
                <div class="success-message"><?php echo htmlspecialchars($exito); ?></div>
            <?php endif; ?>

            <div class="demo-credentials">
                <strong>Credenciales de Demo:</strong>
                📧 ascr2000@hotmail.com<br>
                🔐 JA2000
            </div>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required placeholder="tu@email.com">
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required placeholder="••••••••">
                </div>

                <button type="submit" class="btn-login">Iniciar Sesión</button>
            </form>

            <div class="login-footer">
                <p><a href="index.php">← Volver al inicio</a></p>
                <p><a href="registro.php">¿No tienes cuenta? Regístrate aquí</a></p>
            </div>
        </div>
    </div>
</body>
</html>
