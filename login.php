<?php
session_start();
include("db.php");

$message = "";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, email, password FROM users WHERE email = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: index.php");
            exit();

        } else {
            $message = "Incorrect password.";
        }

    } else {
        $message = "Email is not registered.";
    }
}
?><!DOCTYPE html><html>
<head>
    <title>Login - Seed Quality Feedback System</title>
    <link rel="stylesheet" href="style.css">
</head><body><h1>🌱 Login</h1>

<p>Login to access the Seed Quality and Performance Feedback System.</p>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<form method="POST">

    <label>Email:</label><br>
    <input type="email" name="email" required>

    <br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required>

    <br><br>

    <input type="submit" name="login" value="Login">

</form>

<br>

<p>
    New user?
    <a href="register.php">Create an account</a>
</p>

</body>
</html>