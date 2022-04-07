<?php

require "config.php";

$link = mysqli_connect('localhost', 'root', $config['db']['db_password'], '');

$db_name = "contact_us";
$sql = "CREATE DATABASE $db_name CHARACTER SET utf8 COLLATE utf8_general_ci";

if (mysqli_query($link, $sql)) {
    echo "The database " . $db_name . " has been successfully created";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link); ?>

<a href="index.php">Вернуться к регистрации</a>