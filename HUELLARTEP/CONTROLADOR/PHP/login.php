<?php
session_start();
require_once __DIR__ . '/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "<script>alert('Completa todos los campos'); window.history.back();</script>";
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE correo = ? LIMIT 1");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificar contraseña con la columna "contraseña"
            if (password_verify($password, $usuario['contraseña'])) {
                // Login exitoso
                $_SESSION['usuario_id'] = $usuario['idUsuario'];
                $_SESSION['usuario_nombre'] = $usuario['nombres'];
                header("Location: ../../huellarte/index.html");
                exit;
            } else {
                echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Usuario no encontrado'); window.history.back();</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error en la base de datos: " . $e->getMessage() . "'); window.history.back();</script>";
    }

} else {
    echo "<script>alert('Método no permitido'); window.history.back();</script>";
}
