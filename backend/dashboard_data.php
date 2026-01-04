<?php
session_start();
include 'db_connect.php';

$user_id = $_SESSION['user_id'];

// Total tasks
$totalSql = "SELECT COUNT(*) FROM tasks WHERE user_id = ?";
$stmt = $conn->prepare($totalSql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($totalTasks);
$stmt->fetch();
$stmt->close();

// Completed tasks
$completedSql = "SELECT COUNT(*) FROM tasks WHERE user_id = ? AND status = 'completed'";
$stmt = $conn->prepare($completedSql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($completedTasks);
$stmt->fetch();
$stmt->close();

// Pending tasks
$pendingSql = "SELECT COUNT(*) FROM tasks WHERE user_id = ? AND status = 'pending'";
$stmt = $conn->prepare($pendingSql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($pendingTasks);
$stmt->fetch();
$stmt->close();

// Recent tasks (latest 10)
$recentSql = "
  SELECT * FROM tasks 
  WHERE user_id = ?
  ORDER BY task_id DESC
  LIMIT 10
";
$stmt = $conn->prepare($recentSql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$tasks = $stmt->get_result();
