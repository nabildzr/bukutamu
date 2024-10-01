


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
        <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

</head>
<body>
    



<?php 

if ($_SESSION['role'] == 'Operator') {
    echo "  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
     
    echo "
  
   <script>
    Swal.fire({
      icon: 'warning',
      title: 'Anda Tidak Memiliki Akses!',
      showConfirmButton: false,
      timer: 1000
    }).then(() => {
      window.location.href = '/bukutamu/app/';
    });
    </script>";
           exit();
}

?>


          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>


