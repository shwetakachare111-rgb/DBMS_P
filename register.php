<?php
include("db.php");

$message = "";

if (isset($_POST['register'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        $check = mysqli_prepare(
            $conn,
            "SELECT id FROM users WHERE email = ?"
        );

        mysqli_stmt_bind_param($check, "s", $email);
        mysqli_stmt_execute($check);
        $result = mysqli_stmt_get_result($check);

        if (mysqli_num_rows($result) > 0) {

            $message = "This email is already registered.";

        } else {

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO users (email, password) VALUES (?, ?)"
            );

            mysqli_stmt_bind_param(
                $stmt,
                "ss",
                $email,
                $hashed_password
            );

            if (mysqli_stmt_execute($stmt)) {
                $message = "Registration successful! You can now login.";
            } else {
                $message = "Registration failed. Please try again.";
            }
        }

    } else {
        $message = "Please fill in all fields.";
    }
}
?><!DOCTYPE html><html>
<head>
    <title>Register - Seed Quality Feedback System</title>
    <link rel="stylesheet" href="style.css">
</head><body><h1>🌱 Create Account</h1>

<p>Create your account to access the Seed Quality and Performance Feedback System.</p>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<form method="POST">

    <label>Email:</label><br>
    <input
        type="email"
        name="email"
        required
    >

    <br><br>

    <label>Password:</label><br>
    <input
        type="password"
        name="password"
        required
    >

    <br><br>

    <input
        type="submit"
        name="register"
        value="Create Account"
    >

</form>

<br>

<p>
    Already have an account?
    <a href="login.php">Login here</a>
</p>

</body>
</html>