<?php

require "connect_db.php";

$sql = "CREATE TABLE users (
id INT(11) PRIMARY KEY AUTO_INCREMENT,
user_name VARCHAR(256) NOT NULL,
email VARCHAR(256) UNIQUE,
subject VARCHAR(256) NOT NULL,
message TEXT,
gender CHAR(1) NOT NULL,
device VARCHAR(15)  NOT NULL,
pathTOfile VARCHAR(64) NULL
)";



if (!mysqli_query($link, $sql)) {
  echo "ERROR: Problem with creating a table $sql"  . mysqli_error($link);
} else {
  echo "Таблицу создал";
}

$link->close();
