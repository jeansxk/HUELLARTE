<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once 'conexion.php';

// Logging para debug
error_log("=== INICIO REGISTRO ===");
error_log("POST data: " . print_r($_POST, true));

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
    $idTipousuario = 16; // Assuming 16 is the ID for regular users
    
    error_log("Datos procesados:");
    error_log("nombres: " . $nombres);
    error_log("apellidos: " . $apellidos);
    error_log("correo: " . $correo);
    error_log("celular: " . $celular);
    error_log("idTipodoc: " . $idTipodoc);
    error_log("numeroDocumento: " . $numeroDocumento);
    error_log("idDepartamento: " . $idDepartamento);
    error_log("idCiudad: " . $idCiudad);
    
    // Validate required fields
    if (empty($nombres) || empty($apellidos) || empty($correo) || empty($celular) || empty($contrasena)) {
        error_log("Error: Campos obligatorios vacíos");
        echo json_encode([
            'success' => false, 
            'message' => 'Todos los campos obligatorios deben ser completados',
            'debug' => [
                'nombres' => empty($nombres),
                'apellidos' => empty($apellidos),
                'correo' => empty($correo),
                'celular' => empty($celular),
                'contrasena' => empty($contrasena)
            ]
        ]);
        exit;
    }
    
    // Validate email format
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        error_log("Error: Email inválido - " . $correo);
        echo json_encode(['success' => false, 'message' => 'Formato de email inválido']);
        exit;
    }
    
    // Password confirmation check
    if ($contrasena !== $confirmarPassword) {
        error_log("Error: Contraseñas no coinciden");
        echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden']);
        exit;
    }
    
    // Password strength validation (optional)
    if (strlen($contrasena) < 6) {
        error_log("Error: Contraseña muy corta");
        echo json_encode(['success' => false, 'message' => 'La contraseña debe tener al menos 6 caracteres']);
        exit;
    }
    
    try {
        error_log("Iniciando verificaciones en base de datos...");
        
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT idUsuario FROM usuario WHERE correo = ?");
        $stmt->execute([$correo]);
        if ($stmt->fetch()) {
            error_log("Error: Email ya existe - " . $correo);
            echo json_encode(['success' => false, 'message' => 'El email ya está registrado']);
            exit;
        }
        
        error_log("Email disponible, continuando...");
        
        // Hash password
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
        error_log("Contraseña hasheada correctamente");
        
        // Verificar estructura de la tabla antes de insertar
        error_log("Verificando estructura de tabla usuario...");
        $stmt = $pdo->query("DESCRIBE usuario");
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        error_log("Columnas de la tabla: " . print_r($columns, true));
        
        // Insert new user with all form fields
        $sql = "INSERT INTO usuario (idTipousuario, idTipodoc, nombres, apellidos, celular, correo, contraseña, idCiudad, idDepartamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        error_log("SQL a ejecutar: " . $sql);
        
        $valores = [$idTipousuario, $idTipodoc, $nombres, $apellidos, $celular, $correo, $hashedPassword, $idCiudad, $idDepartamento];
        error_log("Valores a insertar: " . print_r($valores, true));
        
        $stmt = $pdo->prepare($sql);
        $resultado = $stmt->execute($valores);
        
        error_log("Resultado de execute(): " . ($resultado ? 'true' : 'false'));
        error_log("Filas afectadas: " . $stmt->rowCount());
        
        if ($resultado && $stmt->rowCount() > 0) {
            $ultimoId = $pdo->lastInsertId();
            error_log("Usuario insertado con ID: " . $ultimoId);
            echo json_encode([
                'success' => true, 
                'message' => 'Usuario registrado exitosamente',
                'debug' => [
                    'userId' => $ultimoId,
                    'rowsAffected' => $stmt->rowCount()
                ]
            ]);
        } else {
            error_log("Error: No se insertaron filas");
            echo json_encode([
                'success' => false, 
                'message' => 'Error al registrar usuario - No se insertaron datos',
                'debug' => [
                    'executeResult' => $resultado,
                    'rowCount' => $stmt->rowCount()
                ]
            ]);
        }
        
    } catch (PDOException $e) {
        // Log the error for debugging
        error_log("Database error: " . $e->getMessage());
        error_log("Error info: " . print_r($e->errorInfo, true));
        echo json_encode([
            'success' => false, 
            'message' => 'Error en la base de datos: ' . $e->getMessage(),
            'debug' => [
                'errorCode' => $e->getCode(),
                'errorInfo' => $e->errorInfo
            ]
        ]);
    }
} else {
    error_log("Error: No se recibieron datos POST");
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>