<?php

include_once '../../templates/header.php';
require_once '../../conf/function.php';

?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User</h1>

    <?php
    if (isset($_POST['simpan'])) {
        if (tambah_user($_POST) > 0) {
    ?>

            <script>
                window.location.href = './index.php?success=2';
            </script>
        <?php
        } else {
        ?>

            <div class="alert alert-danger" role="alert">
                Data gagal disimpan!
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
                <span class="text">Data User</span>

            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Nama User</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $users = query("SELECT * FROM tb_users");
                        foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['password'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td>
                                    <a href="edit-user.php?id=<?= $user['id_user'] ?>" class="btn btn-success">Ubah</a>
                                    <a href="javascript:void(0);" onclick="confirmDeletion('<?= $user['id_user'] ?>')" class="btn btn-danger">Hapus</a>
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
                                                    window.location.href = 'hapus-user.php?id=' + id;
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
$query = mysqli_query($conn, "SELECT max(id_user) as kodeTerbesar FROM tb_users");

$data = mysqli_fetch_array($query);
$kodeUser = $data['kodeTerbesar'];


//? mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan di ubah ke integer dengan menggunakan (int)
$urutan = (int) substr($kodeUser, 2, 3);

//? nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya (id)
$urutan++;

//? membuat kode barang baru
//? string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter

//? ankga yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya zt
$huruf = "zt";
$kodeUser = $huruf . sprintf("%03s", $urutan);


?>

<!-- TambahModal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" id="id_user" name="id_user" value="<?= $kodeUser ?>" />
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" id="email" name="email" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" id="username" name="username" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" id="password" name="password" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="role" id="role">

                                <option name="role" value="Super Admin">Super Admin</option>
                                <option name="role" value="Operator">Operator</option>
                            </select>
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





<?php

if ($x = (isset($_GET['success']))) {
    if ($x == 1) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Data berhasil dihapus!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
    }
    if ($x == 2) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Data berhasil dibuat!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
    }
    if ($x == 3) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Data berhasil disimpan!',
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    content: 'swal2-content',
                    confirmButton: 'swal2-confirm'
                }
            })
            </script>";
    }
}

?>

<?php include_once '../../templates/footer.php'; ?>