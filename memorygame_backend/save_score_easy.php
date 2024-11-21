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

    // Get the raw POST data (since we're sending JSON)
    $input = file_get_contents('php://input');

    // Decode the JSON into an associative array
    $data = json_decode($input, true);  // Decodes JSON to an array

        $user = $data['username'];
        $score = $data['score'];

        $stmt = $conn->prepare("INSERT INTO scores_easy (username, score) VALUES (?, ?)");
        $stmt->bind_param("si", $user, $score);

        $stmt->execute();

        $stmt->close();
        $conn->close();

?>
