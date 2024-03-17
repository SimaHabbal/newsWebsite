<?php

$host = "localhost";
$user = "root";
$pass = null;
$db_name = "newsdb";

$mysqli = new mysqli($host, $user, $pass, $db_name);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}