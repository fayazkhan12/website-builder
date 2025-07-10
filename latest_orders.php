
<?php
$host = "localhost";
$db = "u723378566_kachori_shop";  // Replace with your actual database name (usually prefixed)
$user = "u723378566_kachori_user"; // Replace with your DB username
$pass = "Fayaz@10"; // Replace with your DB password


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT customer_name, total_amount, order_date FROM orders ORDER BY order_date DESC LIMIT 5");

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode($orders);

$conn->close();
?>
