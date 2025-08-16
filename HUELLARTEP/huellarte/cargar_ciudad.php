<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// Incluir el archivo de conexión
require_once 'conexion.php';
try {
    // Verificar que se recibió el ID del departamento
    if (!isset($_GET['idDepartamento']) || empty($_GET['idDepartamento'])) {
        echo json_encode([
            'success' => false,
            'message' => 'ID de departamento no proporcionado'
        ]);
        exit;
    }
    
    $idDepartamento = intval($_GET['idDepartamento']);
    
    // Consultar las ciudades del departamento seleccionado
    $sql = "SELECT idCiudad, descripcion FROM ciudad WHERE idDepartamento = :idDepartamento ORDER BY descripcion ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idDepartamento', $idDepartamento, PDO::PARAM_INT);
    $stmt->execute();
    
    $ciudades = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Verificar si hay resultados
    if ($ciudades) {
        echo json_encode([
            'success' => true,
            'data' => $ciudades
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No se encontraron ciudades para este departamento'
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