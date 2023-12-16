<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO penjemputan (tanggal, nama, alamat)
            VALUES ('$tanggal', '$nama', '$alamat')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil disimpan");</script>';
        echo '<script>window.location.href= "penjemputan.php"</script>';
        // Additional code if needed
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
?>

<?php include 'header.php' ?>

<div class="jemputAdmin">
    <div style="background-color: #fff; padding: 10px; border-radius: 20px; ">
        <form action="" method="post">
            <span>
                <p>HARI/TANGGAL</p>
                <section class="secInput">
                    <input type="date" name="tanggal" style="background-color: #fff;">
                </section>
            </span>
            <span>
                <p>NAMA NASABAH</p>
                <section class="secInput">
                    <input type="text" name="nama" style="background-color: #fff;">
                </section>
            </span>
            <span>
                <p>ALAMAT</p>
                <section class="secInput">
                    <input type="text" name="alamat" style="background-color: #fff;">
                </section>
            </span>
            <section class="d-flex" style="justify-content: center;">
                <button type="button" onclick="window.location.href= 'penjemputan.php'">BATAL</button>
                <button type="submit" name="submit">SIMPAN</button>
            </section>
        </form>
    </div>
</div>

<?php include 'footer.php' ?>