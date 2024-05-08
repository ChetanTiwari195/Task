<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "task";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT userId FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["userId"] = $row["userId"];
        $updateSql = "UPDATE user SET Status = 1 WHERE UserID = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $_SESSION['userID']);
        $updateStmt->execute();

        header("Location: index.php");
    } else {
        echo "invalid username or password";
    }
}

$stmt->close();
$updateStmt->close();
$conn->close();
