<?php
include_once('../templates/header.php');
require_once('../conf/koneksi.php');
require_once '../conf/function.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4  text-gray-800">Laporan</h1>

    <!-- Form untuk memilih periode tanggal -->
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card border-left-primary">
                    <div class="card-header  text-primary">
                        <h4 class="mb-0">Periode</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group row">
                                <label for="start_date" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-9">
                                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_date" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                                <div class="col-sm-9">
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" name="show" class="btn btn-primary">Tampilkan Laporan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span class="text">Tabel Histori Tamu</span>
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
                        if (isset($_POST['show'])) {
                            $start_date = $_POST['start_date'];
                            $end_date = $_POST['end_date'];

                            $no = 1;

                            $buku_tamu = query("SELECT * FROM tb_bukutamu WHERE tanggal BETWEEN '$start_date' AND '$end_date'");
                            foreach ($buku_tamu as $tamu): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $tamu['tanggal'] ?></td>
                                    <td><?= $tamu['nama_tamu'] ?></td>
                                    <td><?= $tamu['alamat'] ?></td>
                                    <td><?= $tamu['no_hp'] ?></td>
                                    <td><?= $tamu['bertemu'] ?></td>
                                    <td><?= $tamu['kepentingan'] ?></td>
                                    <td>
                                        <a href="../app/bukutamu/edit-tamu.php?id=<?= $tamu['id_tamu'] ?>" class="btn btn-success">Ubah</a>
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
                                                        window.location.href = '../app/bukutamu/hapus-tamu.php?id=' + id;
                                                    }
                                                })
                                            }
                                        </script>
                                    </td>
                                </tr>
                        <?php endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- old code -->
    <?php
    // if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    //     $start_date = $_GET['start_date'];
    //     $end_date = $_GET['end_date'];

    //     // Query untuk mengambil data berdasarkan periode tanggal
    //     $query = "SELECT * FROM tb_bukutamu WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
    //     $result = mysqli_query($conn, $query);

    //     if (mysqli_num_rows($result) > 0) {
    //         echo '
    //         ';

    //         $no = 1;
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             echo '<tr>';
    //             echo '<td>' . $no++ . '</td>';
    //             echo '<td>' . $row['tanggal'] . '</td>';
    //             echo '<td>' . $row['nama_tamu'] . '</td>';
    //             echo '<td>' . $row['alamat'] . '</td>';
    //             echo '<td>' . $row['no_hp'] . '</td>';
    //             echo '<td>' . $row['bertemu'] . '</td>';
    //             echo '<td>' . $row['kepentingan'] . '</td>';
    //             echo '</tr>';
    //         }

    //         echo '</tbody>';
    //         echo '</table>';
    //     } else {
    //         echo '<p class="mt-4">Tidak ada data untuk periode yang dipilih.</p>';
    //     }
    // }
    ?>

    <!-- Button to export data to Excel -->
    <?php if (isset($start_date) && isset($end_date)): ?>
        <a href="excel.php?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-success mt-4">Export to Excel</a>
    <?php endif; ?>

    <!-- Button to export data to word -->
</div>
<!-- /.container-fluid -->

<?php
include_once '../templates/footer.php';
?>