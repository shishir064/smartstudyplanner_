<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Unauthorized');
}

$task_id = $_POST['task_id'];
$user_id = $_SESSION['user_id'];

/* 1️⃣ Update status to completed */
$sql = "UPDATE tasks 
        SET status = 'completed' 
        WHERE task_id = ? AND user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $task_id, $user_id);
$stmt->execute();

/* 2️⃣ Wait 2 seconds */
sleep(2);

/* 3️⃣ Delete task */
$sql = "DELETE FROM tasks 
        WHERE task_id = ? AND user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $task_id, $user_id);
$stmt->execute();

echo "done";
