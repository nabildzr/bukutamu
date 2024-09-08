<?php
require_once('koneksi.php');

function query($query)
{
    global $conn;   // menggunakan var $conn yang didefinisikan secara global untuk koneksi database
    $result = mysqli_query($conn, $query);
    $rows = []; // initialisasi var $rows sebagai array yang kosong agar bisa menyimpan hasil query

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; // setiap hasil query akan disimpan dalam var $rows
    }
    return $rows; // megembalikan nilai var $rows
}


function tambah_tamu($data)
{
    global $conn;
    $kode           = htmlspecialchars($data['id_tamu']);
    $tanggal        = date("Y-m-d");
    $nama_tamu      = htmlspecialchars($data['nama_tamu']);
    $alamat         = htmlspecialchars($data['alamat']);
    $no_hp          = htmlspecialchars($data['no_hp']);
    $bertemu        = htmlspecialchars($data['bertemu']);
    $kepentingan    = htmlspecialchars($data['kepentingan']);

    $query = "INSERT INTO tb_bukutamu (id_tamu, tanggal, nama_tamu, alamat, no_hp, bertemu, kepentingan)
              VALUES ('$kode', '$tanggal', '$nama_tamu', '$alamat', '$no_hp', '$bertemu', '$kepentingan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah_tamu($data)
{
    global $conn;
    $id           = htmlspecialchars($data["id_tamu"]);
    $nama_tamu    = htmlspecialchars($data["nama_tamu"]);
    $alamat       = htmlspecialchars($data["alamat"]);
    $no_hp        = htmlspecialchars($data["no_hp"]);
    $bertemu      = htmlspecialchars($data["bertemu"]);
    $kepentingan  = htmlspecialchars($data["kepentingan"]);

    $query = "UPDATE tb_bukutamu SET
        nama_tamu       = '$nama_tamu',
        alamat          = '$alamat',
        no_hp           = '$no_hp',
        bertemu         = '$bertemu',
        kepentingan     = '$kepentingan'
        WHERE id_tamu   = '$id'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus_tamu($id) {

    global $conn;

    $query = "DELETE FROM tb_bukutamu WHERE id_tamu = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}