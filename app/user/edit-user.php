<?php

include_once '../../templates/header.php';
require_once '../../conf/function.php';
require_once 'redirect.php';

?>



<!-- Begin Page Content -->
<div class="container-fluid">


    <?php

    if (isset($_GET['id'])) {
        $id_user = $_GET['id'];

        // ambil data tamu yang sesuai dengan id
        $data = query("SELECT * FROM tb_users WHERE id_user = '$id_user'")[0];
    }
    ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Tamu</h1>

    <?php

    // jika ada tamu di URL
    if (isset($_POST["simpan"])) {
        if (ubah_user($_POST) > 0) {
    ?>

            <script>
                window.location.href = './index.php?success=3';
            </script>
        <?php  } else { ?>
            <div role="alert" class="alert alert-danger">
                Data gagal diubah!
            </div>
    <?php
        }
    }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py3">
            <h6>Data User</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" id="id_user" name="id_user" value="<?= $id_user ?>" />

                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Nama User</label>
                    <div class="col-sm-8">
                        <input type="text" id="username" name="username" class="form-control" value="<?= $data['username'] ?>" />
                    </div>
                </div>



                <div class=" form-group row">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="role" id="role">
                            <option <?= $data['role'] == 'Super Admin' ? 'selected' : '' ?> value="Super Admin">Super Admin</option>
                            <option <?= $data['role'] == 'Operator' ? 'selected' : '' ?> value="Operator">Operator</option>
                        </select>
                    </div>
                </div>

                <div class="from-group row">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8 d-flex mx-2  justify-content-end">
                        <a type="button" class=" mr-2 btn btn-danger btn-icon-split " href="./index.php">
                            <span class="icon text-white-50">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include_once '../../templates/footer.php'; ?>