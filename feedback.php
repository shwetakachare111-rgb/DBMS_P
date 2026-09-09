<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("db.php");

$message = "";

if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $crop_name = trim($_POST['crop_name']);
    $seed_variety = trim($_POST['seed_variety']);
    $germination = trim($_POST['germination']);
    $growth = trim($_POST['growth']);
    $rating = (int) $_POST['rating'];
    $feedback = trim($_POST['feedback']);

    $sql = "INSERT INTO feedback
        (name, email, crop_name, seed_variety, germination, growth, rating, feedback)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "ssssssis",
            $name,
            $email,
            $crop_name,
            $seed_variety,
            $germination,
            $growth,
            $rating,
            $feedback
        );

        if (mysqli_stmt_execute($stmt)) {
            $message = "Feedback submitted successfully! 🌱";
        } else {
            $message = "Error submitting feedback.";
        }

        mysqli_stmt_close($stmt);

    } else {
        $message = "Unable to prepare the query.";
    }
}
?><!DOCTYPE html><html>
<head>
    <title>Give Seed Feedback</title>
    <link rel="stylesheet" href="style.css">
</head><body><h1>🌱 Give Seed Feedback</h1>

<?php if ($message != "") { ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php } ?>

<form method="POST">

    <label>Name:</label><br>
    <input type="text" name="name" required>
    <br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required>
    <br><br>

    <label>Crop Name:</label><br>
    <input type="text" name="crop_name" required>
    <br><br>

    <label>Seed Variety:</label><br>
    <input type="text" name="seed_variety" required>
    <br><br>

    <label>Germination:</label><br>
    <input type="text" name="germination" placeholder="Example: 85%">
    <br><br>

    <label>Growth:</label><br>
    <input type="text" name="growth" placeholder="Example: Good">
    <br><br>

    <label>Rating:</label><br>
    <input type="number" name="rating" min="1" max="5" required>
    <br><br>

    <label>Feedback:</label><br>
    <textarea name="feedback" rows="5" cols="40"></textarea>
    <br><br>

    <input type="submit" name="submit" value="Submit Feedback">

</form>

<br><br>

<a href="view_feedback.php">
    <button type="button">View Feedback</button>
</a>

</body>
</html>