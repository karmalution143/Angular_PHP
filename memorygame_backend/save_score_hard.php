<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

// Add CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "memory_game";

// Establish a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

        $user = $_POST['username'];
        $score = $_POST['score'];

        $stmt = $conn->prepare("INSERT INTO scores_hard (username, score) VALUES (?, ?)");
        $stmt->bind_param("si", $user, $score);

        $stmt->execute();

        $stmt->close();
        $conn->close();
    

?>
