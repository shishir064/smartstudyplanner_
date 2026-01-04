<?php
session_start();
include 'db_connect.php';

$email = $_POST['email'];

$sql = "SELECT user_id, username FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {

    $stmt->bind_result($user_id, $username);
    $stmt->fetch();

    // ✅ Correct session values
    $_SESSION['user_id']  = $user_id;
    $_SESSION['username'] = $username;

    header("Location: ../src/dashboard.php");
    exit();

} else {
    echo "User does not exist";
}

$stmt->close();
$conn->close();
