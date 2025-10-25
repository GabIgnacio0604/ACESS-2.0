<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "u465284186_ACESS";
$pass = "Acess12345";
$db   = "u465284186_ACESS";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}
 
$data = json_decode(file_get_contents("php://input"), true);
$email = $conn->real_escape_string($data['email']);

$query = "UPDATE users SET status='rejected' WHERE email='$email'";
if ($conn->query($query)) {
    echo json_encode(["success" => true, "message" => "User rejected successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to reject user"]);
}

$conn->close();
?>
