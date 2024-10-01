<?php
session_start();

if (
    !isset($_SESSION['isLogin']) && $_SESSION['isLogin']
    !== true
) {
    header('Location: ../index.php');
    exit();
}

require_once('../../conf/function.php');


// jika ada id
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapus_user($id) > 0) {
        header('Location: index.php?success=1');
    } else {
    // jika data gagal dihapus maka akan muncul alert
        echo "<script>alert('Data gagal di hapus')</script>";
    }
}

require_once('redirect.php');

?>