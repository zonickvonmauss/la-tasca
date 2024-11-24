<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['cliente_nombre'] ?? '';
    $email = $_POST['cliente_email'] ?? '';
    $productos = $_POST['productos'] ?? '';
    $total = $_POST['total'] ?? '';

    if (empty($nombre) || empty($email) || empty($productos) || empty($total)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
        exit;
    }

    // Guardar el pedido en un archivo o base de datos
    $pedido = "Cliente: $nombre\nEmail: $email\nProductos: $productos\nTotal: ₡$total\n\n";
    file_put_contents('pedidos.txt', $pedido, FILE_APPEND);

    echo json_encode(['status' => 'success', 'message' => 'Pedido procesado exitosamente.']);
    exit;
}

echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
?>
