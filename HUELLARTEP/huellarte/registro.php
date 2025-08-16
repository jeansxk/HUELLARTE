<?php
header('Content-Type: application/json');
require_once 'conexion.php';

if ($_POST) {
    // Sanitize and validate input data
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $correo = trim($_POST['correo']);
    $celular = trim($_POST['celular']);
    $contrasena = $_POST['contrasena'];
    $confirmarPassword = $_POST['confirmarPassword'];
    
    // New form fields
    $idTipodoc = $_POST['idTipodoc'];
    $numeroDocumento = trim($_POST['numeroDocumento']);
    $idDepartamento = $_POST['idDepartamento'];
    $idCiudad = $_POST['idCiudad'];
    
    // Default user type (regular user)
    $idTipousuario = 1;
    
    // Validate required fields
    if (empty($nombres) || empty($apellidos) || empty($correo) || empty($celular) || empty($contrasena)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos obligatorios deben ser completados']);
        exit;
    }
    
    // Validate email format
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Formato de email inválido']);
        exit;
    }
    
    // Password confirmation check
    if ($contrasena !== $confirmarPassword) {
        echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden']);
        exit;
    }
    
    // Password strength validation (optional)
    if (strlen($contrasena) < 6) {
        echo json_encode(['success' => false, 'message' => 'La contraseña debe tener al menos 6 caracteres']);
        exit;
    }
    
    try {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT idUsuario FROM usuario WHERE correo = ?");
        $stmt->execute([$correo]);
        if ($stmt->fetch()) {
            echo json_encode(['success' => false, 'message' => 'El email ya está registrado']);
            exit;
        }
        
        // Check if document number already exists (comentado porque no está en la tabla aún)
        /*
        if (!empty($numeroDocumento)) {
            $stmt = $pdo->prepare("SELECT idUsuario FROM usuario WHERE numeroDocumento = ?");
            $stmt->execute([$numeroDocumento]);
            if ($stmt->fetch()) {
                echo json_encode(['success' => false, 'message' => 'El número de documento ya está registrado']);
                exit;
            }
        }
        */
        
        // Hash password
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
        
        // Insert new user with all form fields (sin numeroDocumento por ahora)
        $stmt = $pdo->prepare("INSERT INTO usuario (idTipousuario, idTipodoc, nombres, apellidos, celular, correo, contraseña, idCiudad, idDepartamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$idTipousuario, $idTipodoc, $nombres, $apellidos, $celular, $correo, $hashedPassword, $idCiudad, $idDepartamento])) {
            echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar usuario']);
        }
        
    } catch (PDOException $e) {
        // Log the error for debugging (don't expose to user)
        error_log("Database error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos. Intente nuevamente.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>