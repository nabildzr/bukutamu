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


// tamu

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


// users

function tambah_user($data)
{
    global $conn;
    $id       = htmlspecialchars($data['id_user']);
    $email      = htmlspecialchars($data['email']);
    $username   = htmlspecialchars($data['username']);
    $password   = htmlspecialchars($data['password']);
    $role       = htmlspecialchars($data['role']);  

    $query = "INSERT INTO tb_users (id_user, email, username,  password, role)
              VALUES ('$id', '$email', '$username', '$password' , '$role')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah_user($data)
{
    global $conn;
    $id           = htmlspecialchars($data["id_user"]);
    $email       = htmlspecialchars($data["email"]);
    $username    = htmlspecialchars($data["username"]);
    $role        = htmlspecialchars($data["role"]);

    $query = "UPDATE tb_users SET
        email           = '$email',
        username        = '$username',
        role            = '$role'
        WHERE id_user   = '$id'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus_user($id) {

    global $conn;

    $query = "DELETE FROM tb_users WHERE id_user = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

