<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 COVID-19 Information</p>
    </footer>
</body>
</html>

<?php
// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
    $conn->close();
}
?>
