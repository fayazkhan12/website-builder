<?php
session_start();
require 'db.php';

$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE phone = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_phone'] = $user['phone'];
        $_SESSION['user_name'] = $user['name'];

        $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'edit.php';
        header("Location: $redirect");
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "Phone number not found.";
}
?>
