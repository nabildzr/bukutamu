<?php
include_once '../../templates/header.php';
require_once '../../conf/function.php';
?>



<!-- Begin Page Content -->
<div class="container-fluid">


    <?php

    if (isset($_GET['id'])) {
        $id_tamu = $_GET['id'];

        // ambil data tamu yang sesuai dengan id
        $data = query("SELECT * FROM tb_bukutamu WHERE id_tamu = '$id_tamu'")[0];
    }
    ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Tamu</h1>

    <?php

    // jika ada tamu di URL
    if (isset($_POST["simpan"])) {
        if (ubah_tamu($_POST) > 0) {
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
            <h6>Data Tamu</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" id="id_tamu" name="id_tamu" value="<?= $id_tamu ?>" />

                <div class="form-group row">
                    <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
                    <div class="col-sm-8">
                        <input type="text" id="nama_tamu" name="nama_tamu" class="form-control" value="<?= $data['nama_tamu'] ?>" />
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea type="text" id="alamat" name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label">No. Telp/HP</label>
                    <div class="col-sm-8">
                        <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?= $data['no_hp'] ?>" />
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="bertemu" class="col-sm-3 col-form-label">Bertemu Dengan</label>
                    <div class="col-sm-8">
                        <input type="text" id="bertemu" name="bertemu" class="form-control" value="<?= $data['bertemu'] ?>" />
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
                    <div class="col-sm-8">
                        <input type="text" id="kepentingan" name="kepentingan" class="form-control" value="<?= $data['kepentingan'] ?>" />
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