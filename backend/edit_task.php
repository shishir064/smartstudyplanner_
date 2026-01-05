<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../src/login.php");
    exit();
}

$user_id   = $_SESSION['user_id'];
$task_id   = $_POST['task_id'];
$title     = $_POST['task_title'];
$desc      = $_POST['task_dis'];
$subject   = $_POST['subject'];
$startDate = $_POST['start_date'];
$endDate   = $_POST['end_date'];

$sql = "UPDATE tasks 
        SET title = ?, description = ?, subject = ?, start_date = ?, end_date = ?
        WHERE task_id = ? AND user_id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

$stmt->bind_param(
    "sssssii",
    $title,
    $desc,
    $subject,
    $startDate,
    $endDate,
    $task_id,
    $user_id
);

if ($stmt->execute()) {
    header("Location: ../src/mytask.php");
} else {
    echo "Update failed";
}

$stmt->close();
$conn->close();
