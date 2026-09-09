<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?><!DOCTYPE html><html>
<head>
    <title>Seed Quality & Performance Feedback System</title>
    <link rel="stylesheet" href="style.css">
</head><body><h1>🌱 Seed Quality & Performance Feedback System</h1>

<p>
    Welcome to the Seed Quality & Performance Feedback System.
    Share your experience and help evaluate seed quality and performance.
</p>

<br>

<a href="feedback.php">
    <button type="button">🌱 Give Feedback</button>
</a>

<br><br>

<a href="view_feedback.php">
    <button type="button">📊 View Feedback</button>
</a>

<br><br>

<a href="logout.php">
    <button type="button">Logout</button>
</a>

</body>
</html>