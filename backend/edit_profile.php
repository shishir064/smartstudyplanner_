<?php
session_start();
include 'db_connect.php';

$user_id = $_SESSION['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($password)) {
    // Hash new password
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users 
            SET username=?, email=?, password=? 
            WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $hashed, $user_id);
} else {
    // Update without password
    $sql = "UPDATE users 
            SET username=?, email=? 
            WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $user_id);
}

$stmt->execute();
header("Location: ../src/profile.php");
exit;
