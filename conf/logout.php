<?php

session_start();
session_unset();
session_destroy();

header("location: /bukutamu/index.php");

exit();


?>