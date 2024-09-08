<?php

define('HOST_NAME', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DB_NAME', 'db_bukutamu');

$conn = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>


