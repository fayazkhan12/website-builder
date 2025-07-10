
<?php
$host = "localhost";
$db = "u723378566_kachori_shop";  // Replace with your actual database name (usually prefixed)
$user = "u723378566_kachori_user"; // Replace with your DB username
$pass = "Fayaz@10"; // Replace with your DB password


$data = json_decode(file_get_contents("php://input"), true);

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, address, city, pincode, delivery_time, instructions, items, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$itemsJson = json_encode($data['items']);

$stmt->bind_param("ssssssssd",
    $data['customer']['name'],
    $data['customer']['phone'],
    $data['customer']['address'],
    $data['customer']['city'],
    $data['customer']['pincode'],
    $data['customer']['deliveryTime'],
    $data['customer']['instructions'],
    $itemsJson,
    $data['total']
);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $stmt->error]);
}

$conn->close();
?>
