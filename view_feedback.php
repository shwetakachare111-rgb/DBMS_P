<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("db.php");

$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);
?><!DOCTYPE html><html>
<head>
    <title>View Seed Feedback</title>
    <link rel="stylesheet" href="style.css">
</head><body><h1>🌱 Seed Feedback</h1>

<table border="1" cellpadding="10">

    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Crop</th>
        <th>Seed Variety</th>
        <th>Germination</th>
        <th>Growth</th>
        <th>Rating</th>
        <th>Feedback</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['crop_name']; ?></td>
            <td><?php echo $row['seed_variety']; ?></td>
            <td><?php echo $row['germination']; ?></td>
            <td><?php echo $row['growth']; ?></td>
            <td><?php echo $row['rating']; ?></td>
            <td><?php echo $row['feedback']; ?></td>
        </tr>

    <?php } ?>

</table>

<br><br>

<a href="feedback.php">
    Give New Feedback
</a>

</body>
</html>