<?php
header('Content-Type: application/json');

$uploadDir = __DIR__ . '/../../Images/Banners/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['banner'])) {
    $file = $_FILES['banner'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'banner_' . time() . '.' . $ext; 
        $destination = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo json_encode([
                'success' => true,
                'file' => '../Images/Banners/' . $filename
            ]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to save uploaded file.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Upload error.']);
    }
    exit;
}

echo json_encode(['success' => false, 'error' => 'Invalid request.']);
