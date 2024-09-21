<?php
require_once '../conf/koneksi.php';
require_once '../conf/function.php';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="laporan-buku-tamu.xls"');
header('Pragma: no-cache');
header('Expires: 0');

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    // Query untuk mengambil data berdasarkan periode tanggal

    $result = query("SELECT * FROM tb_bukutamu WHERE tanggal BETWEEN '$start_date' AND '$end_date'");

    ob_start();
?>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Tamu</th>
                <th>Alamat</th>
                <th>No. Telp/HP</th>
                <th>Bertemu Dengan</th>
                <th>Kepentingan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($result as $row) {
                echo '<tr align="center">';
                echo '<td>' . $no++ . '</td>';
                echo '<td>' . $row['tanggal'] . '</td>';
                echo '<td>' . $row['nama_tamu'] . '</td>';
                echo '<td>' . $row['alamat'] . '</td>';
                echo '<td>' . $row['no_hp'] . '</td>';
                echo '<td>' . $row['bertemu'] . '</td>';
                echo '<td>' . $row['kepentingan'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

<?php
    ob_end_flush();
} else {
    echo "Tanggal mulai dan akhir harus diisi.";
}
?>