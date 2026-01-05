<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../src/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$task_id = $_POST['task_id'];

$sql = "DELETE FROM tasks WHERE task_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

$stmt->bind_param("ii", $task_id, $user_id);

if ($stmt->execute()) {
    header("Location: ../src/mytask.php");
} else {
    echo "Delete failed";
}

$stmt->close();
$conn->close();
