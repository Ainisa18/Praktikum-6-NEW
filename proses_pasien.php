<?php
require_once './db_koneksi.php';

// Tangkap data form yang dikirim
if (isset($_POST['proses'])) {
    $kode = isset($_POST['kode']) ? $_POST['kode'] : '';

    switch ($_POST['proses']) {
        case 'Simpan':
            $nama = $_POST['nama'];
            $tmp_lahir = $_POST['tmp_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $gender = $_POST['gender'];
            $kelurahan_id = $_POST['kelurahan'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];

            $data = [$nama, $tmp_lahir, $tgl_lahir, $gender, $kelurahan_id, $email, $alamat, $kode];

            $insertPasienSQL = "INSERT INTO pasien (nama, tmp_lahir, tgl_lahir, gender, kelurahan_id, email, alamat, kode) VALUES(?,?,?,?,?,?,?,?)";
            $stmt = $dbh->prepare($insertPasienSQL);
            $stmt->execute($data);
            break;
        case 'Ubah':
            $nama = $_POST['nama'];
            $tmp_lahir = $_POST['tmp_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $gender = $_POST['gender'];
            $kelurahan_id = $_POST['kelurahan'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];

            $data = [$nama, $tmp_lahir, $tgl_lahir, $gender, $kelurahan_id, $email, $alamat, $kode];

            $updatePasienSQL = "UPDATE pasien SET nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, kelurahan_id=?, email=?, alamat=? WHERE kode=?";
            $stmt = $dbh->prepare($updatePasienSQL);
            $stmt->execute($data);
            break;
        case 'Hapus':
            $id_pasien = $_POST['id_pasien'];
            $deletePasienSQL = "DELETE FROM pasien WHERE id=?";
            $stmt = $dbh->prepare($deletePasienSQL);
            $stmt->execute([$id_pasien]);
            break;
        default:
            header('location: ./data_pasien.php');
    }
}

// Redirect ke halaman data pasien
header('location: ./data_pasien.php');
?>
