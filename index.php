<?php
require_once('conf/koneksi.php');
session_start();

// check if user has logged in or not,  if not (false) then redirect to login page
if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true) {
    header('Location: app/index.php');
    exit();
}


// before use hash sha256
// if (isset($_POST['username']) && isset($_POST['password'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $query = "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'";
//     $result = mysqli_query($conn, $query);
//     $rows = mysqli_num_rows($result);

//     // if username and password has wrong, use buku-tamu.php?error=1
//     if ($rows > 0) {
//         // Login successful, redirect to buku-tamu.php
//         $_SESSION['username'] = $username;
//         $_SESSION['isLogin'] = true;
//         header("Location: app/index.php");
//         exit();
//     } else {
//         header("Location: index.php?error=1");
//         // Login failed, redirect to buku-tamu.php with error=1
//         exit();
//     }
// }


// after use hash 

if (isset($_POST['username']) && isset($_POST['password'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    // if username and password has wrong, use buku-tamu.php?error=1
    if ($rows > 0) {
        $user = mysqli_fetch_assoc($result);
            $_SESSION['role'] = $user['role'];                                  

        if (password_verify($password, $user['password'])) {
            // Login successful, redirect to buku-tamu.php
            $_SESSION['username'] = $username;
            $_SESSION['isLogin'] = true;
            header("Location: app/index.php");
            exit();
        } else {
            header("Location: index.php?error=1");
            // Login failed, redirect to buku-tamu.php with error=1
            exit();
        }
    } else {
        header("Location: index.php?error=1");
        // Login failed, redirect to buku-tamu.php with error=1
        exit();
    }
}





?>

<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>CodePen - Animated Login Form using Html &amp; CSS Only</title>

    <link rel="stylesheet" href="login.css">

    <style>
        .swal2-popup {
            background-color: #181818;
            color: #fff;
        }

        .swal2-title {
            color: #fff;
        }

        .swal2-content {
            color: #fff;
        }

        .swal2-icon.swal2-error {
            border-color: #ff0000;
        }

        .swal2-icon.swal2-error [class^='swal2-x-mark-line'] {
            background-color: #ff0000;
        }

        .swal2-confirm {
            color: #fff;
        }
    </style>
</head>
</style>
</head>

<body> <!-- partial:index.partial.html -->

    <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>

        <div class="signin">

            <div class="content">

                <h2>LogIn</h2>

                <form action="" method="post" class="form">

                    <div class="inputBox">

                        <input type="text" name="username" required><i>Username</i>

                    </div>

                    <div class="inputBox">

                        <input type="password" name="password" required> <i>Password</i>

                    </div>

          

                    <div class="inputBox">

                        <input type="submit" name="login" value="Login">

                    </div>

                </form>

            </div>

        </div>

    </section> <!-- partial -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

<?php
$x = $_GET['error'];

if ($x == 1) {
    echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Username atau Password salah!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
}

?>

</html>