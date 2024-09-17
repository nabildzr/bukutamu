<?php
include_once('../templates/header.php');
require_once('../conf/koneksi.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan</h1>

    <!-- Form untuk memilih periode tanggal -->
    <form method="GET" action="">
        <div class="form-group row">
            <label for="start_date" class="col-sm-2 col-form-label">Tanggal Mulai</label>
            <div class="col-sm-4">
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="end_date" class="col-sm-2 col-form-label">Tanggal Akhir</label>
            <div class="col-sm-4">
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
    </form>

    <?php
    if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];

        // Query untuk mengambil data berdasarkan periode tanggal
        $query = "SELECT * FROM tb_bukutamu WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered mt-4">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>No</th>';
            echo '<th>Tanggal</th>';
            echo '<th>Nama Tamu</th>';
            echo '<th>Alamat</th>';
            echo '<th>No. Telp/HP</th>';
            echo '<th>Bertemu Dengan</th>';
            echo '<th>Kepentingan</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $no++ . '</td>';
                echo '<td>' . $row['tanggal'] . '</td>';
                echo '<td>' . $row['nama_tamu'] . '</td>';
                echo '<td>' . $row['alamat'] . '</td>';
                echo '<td>' . $row['no_hp'] . '</td>';
                echo '<td>' . $row['bertemu'] . '</td>';
                echo '<td>' . $row['kepentingan'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p class="mt-4">Tidak ada data untuk periode yang dipilih.</p>';
        }
    }
    ?>

    <!-- Button to export data to Excel -->
    <?php if (isset($start_date) && isset($end_date)): ?>
        <a href="excel.php?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-success mt-4">Export to Excel</a>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->

<?php
include_once '../templates/footer.php';
?>