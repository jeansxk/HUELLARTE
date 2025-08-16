<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// Incluir el archivo de conexión
require_once 'conexion.php';
try {
    // Consultar todos los departamentos ordenados alfabéticamente
    $sql = "SELECT idDepartamento, descripcion FROM departamento ORDER BY descripcion ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Verificar si hay resultados
    if ($departamentos) {
        echo json_encode([
            'success' => true,
            'data' => $departamentos
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No se encontraron departamentos'
        ]);
    }
    
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error en la consulta: ' . $e->getMessage()
    ]);
}
// Cerrar la conexión
$pdo = null;
?>