
<?php
$host = "localhost";
$username = "u723378566_kdfc_user"; // Use Hostinger DB username
$password = "Fayaz@10";     // Use Hostinger DB password
$dbname = "u723378566_kdfc_login"; // Change as per your DB name

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
