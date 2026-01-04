<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$title = $_POST['topic'];
$description = $_POST['task_des'];
$subject = $_POST['subject'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$sql = "INSERT INTO tasks (user_id, title, description, subject, start_date, end_date)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $user_id, $title, $description, $subject, $start_date, $end_date);

if ($stmt->execute()) {
    header("Location: ../src/mytask.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
