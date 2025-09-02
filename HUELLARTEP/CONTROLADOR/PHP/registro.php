<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . '/conexion.php';
session_start();

if ($_POST) {
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $correo = trim($_POST['correo']);
    $celular = trim($_POST['celular']);
    $contrasena = $_POST['contrasena'];
    $confirmarPassword = $_POST['confirmarPassword'];
    $idTipodoc = $_POST['idTipodoc'];
    $numeroDocumento = trim($_POST['numeroDocumento']);
    $idDepartamento = $_POST['idDepartamento'];
    $idCiudad = $_POST['idCiudad'];
    $idTipousuario = 16;

    if (empty($nombres) || empty($apellidos) || empty($correo) || empty($celular) || empty($contrasena)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos obligatorios deben ser completados']);
        exit;
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Formato de email inválido']);
        exit;
    }

    if ($contrasena !== $confirmarPassword) {
        echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden']);
        exit;
    }

    if (strlen($contrasena) < 6) {
        echo json_encode(['success' => false, 'message' => 'La contraseña debe tener al menos 6 caracteres']);
        exit;
    }

    try {
        // Verificar si el correo ya existe
        $stmt = $pdo->prepare("SELECT idUsuario FROM usuario WHERE correo = ?");
        $stmt->execute([$correo]);
        if ($stmt->fetch()) {
            echo json_encode(['success' => false, 'message' => 'El email ya está registrado']);
            exit;
        }

        // Hash de la contraseña
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

        // Insertar usuario en la tabla
        $sql = "INSERT INTO usuario (idTipousuario, idTipodoc, nombres, apellidos, celular, correo, contraseña, idCiudad, idDepartamento) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $resultado = $stmt->execute([$idTipousuario, $idTipodoc, $nombres, $apellidos, $celular, $correo, $hashedPassword, $idCiudad, $idDepartamento]);

        if ($resultado) {
            echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar usuario']);
        }

    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
