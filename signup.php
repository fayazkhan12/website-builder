<?php
require 'db.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$sql = "SELECT * FROM users WHERE phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Phone number already registered.";
} else {
    $sql = "INSERT INTO users (name, phone, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $phone, $hashed_password);
    if ($stmt->execute()) {
        echo "Signup successful!";
    } else {
        echo "Signup failed.";
    }
}
?>
