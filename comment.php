<!-- comment.php -->
<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $comment = $_POST['comment'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    header("Location: login.php");
}
?>
