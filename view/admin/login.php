<?php
session_start();

if (isset($_SESSION['usuario_id'])) {
    header('Location: CMSControl.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioInput = trim($_POST['usuario'] ?? '');
    $claveInput = $_POST['password'] ?? '';

    if ($usuarioInput !== '' && $claveInput !== '') {
        try {
            $usuarios = require __DIR__ . '/../../bdd/conexion.php';

            $usuario = null;
            foreach ($usuarios as $item) {
                $nombreUsuario = trim((string) ($item['nombre_usuario'] ?? ''));
                $correoUsuario = trim((string) ($item['correo_usuario'] ?? ''));

                if ($nombreUsuario === $usuarioInput || $correoUsuario === $usuarioInput) {
                    $usuario = $item;
                    break;
                }
            }

            if ($usuario) {
                $passwordHash = (string) ($usuario['password_hash'] ?? '');
                $passwordOk = false;

                if ($passwordHash !== '') {
                    if (password_verify($claveInput, $passwordHash)) {
                        $passwordOk = true;
                    } elseif ($claveInput === $passwordHash) {
                        $passwordOk = true;
                    }
                }

                if ($passwordOk) {
                    $_SESSION['usuario_id'] = $usuario['id_usuario'];
                    $_SESSION['usuario_nombre'] = $usuario['nombre_usuario'];
                    $_SESSION['usuario_rol'] = $usuario['rol'];
                    $_SESSION['usuario_correo'] = $usuario['correo_usuario'];

                    header('Location: CMSControl.php');
                    exit;
                }
            }

            $error = 'Usuario/correo o contraseña incorrectos.';
        } catch (Exception $e) {
            $error = 'No se pudo leer el archivo de usuarios.';
        }
    } else {
        $error = 'Debes ingresar usuario o correo y contraseña.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - CMS Politécnico San Valero</title>
    <!-- Tipografía Montserrat (Página Base) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            line-height: 1.7;
            color: #484848;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Tarjeta Login */
        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            border-top: 5px solid #ea8b15;
            margin: 20px;
        }

        .login-header {
            text-align: center;
            padding: 30px 20px 10px 20px;
            background: #ffffff;
        }

        .login-logo {
            max-width: 220px;
            height: auto;
            margin-bottom: 15px;
        }

        .login-header h2 {
            font-size: 1.3rem;
            color: #3a373c;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .login-header p {
            font-size: 0.85rem;
            color: #777;
        }

        .login-body {
            padding: 20px 30px 30px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #494949;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            border: 1px solid #cacaca;
            border-radius: 4px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #ea8b15;
            background-color: #ffffff;
        }

        /* Botón Estilo Base */
        .button-primary {
            width: 100%;
            background-color: #ea8b15;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            cursor: pointer;
            border-radius: 4px;
            text-transform: uppercase;
            font-size: 14px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .button-primary:hover {
            background-color: #f08c02;
        }

        .login-footer {
            text-align: center;
            padding: 15px;
            background-color: #454545;
            color: #ffffff;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <!-- Logo oficial San Valero / Fundación -->
            <img src="../../img/logo.png" alt="Politécnico San Valero" class="login-logo" onerror="this.onerror=null; this.src='https://via.placeholder.com/250x80?text=San+Valero';">
            <h2>Gestor de Contenidos</h2>
            <p>Politécnico San Valero</p>
        </div>  
        <div class="login-body">
            <?php if ($error !== ''): ?>
                <div style="margin-bottom: 15px; padding: 10px 12px; border-radius: 4px; background: #fdecea; color: #a5342f; border: 1px solid #f5c6c5; font-size: 0.85rem;">
                    <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="usuario">Usuario o Correo Institucional</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="ejemplo@fundosva.com" required value="<?php echo htmlspecialchars($_POST['usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="button-primary">Iniciar Sesión</button>
            </form>
        </div>
        
        <div class="login-footer">
            © Fundación Dominicana San Valero. Todos los derechos reservados.
        </div>
    </div>

</body>
</html>