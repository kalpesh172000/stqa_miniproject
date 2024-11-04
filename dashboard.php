<!-- dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Welcome to the Dashboard</h1>
    </header>
    <main>
        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<h2>Hello, " . $_SESSION['username'] . "!</h2>";
        } else {
            header("Location: login.php");
        }
        ?>
        <h3>COVID-19 Information</h3>
        <p>Here you can find reliable information regarding COVID-19.</p>

        <!-- Comment Section -->
        <form action="comment.php" method="POST">
            <label for="comment">Leave a Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 COVID-19 Information</p>
    </footer>
</body>
</html>
