<?php
require "config.php";

$link = mysqli_connect(
    $config['db']['servername'],
    $config['db']['username'],
    $config['db']['db_password'],
    $config['db']['db'] 
);
mysqli_set_charset($link, "utf8mb4");

if (!$link) {
    die("ERROR: Connection failed: " . mysqli_connect_error());
}
