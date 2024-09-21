<?php

include_once '../../templates/header.php';
require_once '../../conf/function.php';

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buku Tamu</h1>

    <?php
    if (isset($_POST['simpan'])) {
        if (tambah_tamu($_POST) > 0) {
    ?>

            <script>
                window.location.href = './index.php?success=2';
            </script>
        <?php
        } else {
        ?>

            <div class="alert alert-danger" role="alert">
                Data gagal dibuat!
            </div>
    <?php
        }
    }
    ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahModal">
                <span class="icon text-white-50 d-flex justify-content-center align-items-center">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Data Tamu</span>

            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                            <th>No. Telp/HP</th>
                            <th>Bertemu Dengan</th>
                            <th>Kepentingan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $buku_tamu = query("SELECT * FROM tb_bukutamu");
                        foreach ($buku_tamu as $tamu) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $tamu['tanggal'] ?></td>
                                <td><?= $tamu['nama_tamu'] ?></td>
                                <td><?= $tamu['alamat'] ?></td>
                                <td><?= $tamu['no_hp'] ?></td>
                                <td><?= $tamu['bertemu'] ?></td>
                                <td><?= $tamu['kepentingan'] ?></td>
                                <td>
                                    <a href="edit-tamu.php?id=<?= $tamu['id_tamu'] ?>" class="btn btn-success">Ubah</a>
                                    <a href="javascript:void(0);" onclick="confirmDeletion('<?= $tamu['id_tamu'] ?>')" class="btn btn-danger">Hapus</a>
                                    <script>
                                        function confirmDeletion(id) {
                                            Swal.fire({
                                                title: 'Apakah anda yakin?',
                                                text: "Anda tidak akan bisa mengembalikan data ini!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, hapus!',
                                                cancelButtonText: 'Batal'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = 'hapus-tamu.php?id=' + id;
                                                }
                                            })
                                        }
                                    </script>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php

//? mengambil data barang dari tabel dengan kode terbesar 
$query = mysqli_query($conn, "SELECT max(id_tamu) as kodeTerbesar FROM tb_bukutamu");

$data = mysqli_fetch_array($query);
$kodeTamu = $data['kodeTerbesar'];


//? mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan di ubah ke integer dengan menggunakan (int)
$urutan = (int) substr($kodeTamu, 2, 3);

//? nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya (id)
$urutan++;

//? membuat kode barang baru
//? string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter

//? ankga yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya zt
$huruf = "zt";
$kodeTamu = $huruf . sprintf("%03s", $urutan);


?>

<!-- TambahModal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" id="id_tamu" name="id_tamu" value="<?= $kodeTamu ?>" />

                    <div class="form-group row">
                        <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
                        <div class="col-sm-8">
                            <input type="text" id="nama_tamu" name="nama_tamu" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea type="text" id="alamat" name="alamat" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-3 col-form-label">No. Telp/HP</label>
                        <div class="col-sm-8">
                            <input type="text" id="no_hp" name="no_hp" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bertemu" class="col-sm-3 col-form-label">Bertemu Dengan</label>
                        <div class="col-sm-8">
                            <input type="text" id="bertemu" name="bertemu" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
                        <div class="col-sm-8">
                            <input type="text" id="kepentingan" name="kepentingan" class="form-control" />
                        </div>
                    </div>
                    <div class="from-group row">
                        <label for="" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-8 d-flex justify-content-end">
                            <a type="button" class="btn btn-danger btn-icon-split" href="./index.php">
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
</div>




<?php include_once '../../templates/footer.php'; ?>
