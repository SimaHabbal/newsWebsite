<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "INSERT INTO news (title, content) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $title, $content);
    
    if ($stmt->execute()) {
        $response = array('success' => 'Data inserted successfully!');
        echo json_encode($response);
    } else {
        $response = array('error' => 'Failed to insert data into the database.');
        echo json_encode($response);
    }

    $stmt->close();
} else {
    $response = array('error' => 'Invalid request method!');
    echo json_encode($response);
}
?>
