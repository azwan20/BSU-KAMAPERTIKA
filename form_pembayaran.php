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
    $keluar = $_POST['keluar'];
    $masuk = $_POST['masuk'];
    $saldo = $_POST['saldo'];
    $ket = $_POST['ket'];

    $sql = "INSERT INTO pembayaran (tanggal, nama, alamat, keluar, masuk, saldo, ket)
            VALUES ('$tanggal', '$nama', '$alamat', '$keluar', '$masuk', '$saldo', '$ket')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil disimpan");</script>';
        echo '<script>window.location.href= "pembayaran.php"</script>';
        // Additional code if needed
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
?>


<?php include 'header.php' ?>
<style>
    .pembayar{
        height: 87vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(58, 214, 72, 0.25);
    }
    .tambahBayar{
        background-color: #3A7D77;
    }
</style>

<div class="pembayar">
<div class="tambahBayar">
    <div class="bayarCard">
        <form action="" method="post">
            <span>
                <p>HARI/TANGGAL</p>
                <section class="secInput">
                    <input type="date" name="tanggal">
                </section>
            </span>
            <span>
                <p>NAMA NASABAH</p>
                <section class="secInput">
                    <input type="text" name="nama">
                </section>
            </span>
            <span>
                <p>ALAMAT</p>
                <input type="text" name="alamat">
            </span>
            <span>
                <section>
                    <p>KEUANGAN</p>
                </section>
                <section class="d-flex inputTr" style="text-align: center;">
                    <section>
                        <p>KELUAR</p>
                        <input type="number" name="keluar">
                    </section>
                    <section>
                        <p>MASUK</p>
                        <input type="number" name="masuk">
                    </section>
                </section>
            </span>
            <span>
                <p>KET</p>
                <input type="text" name="ket">
            </span>
            <section class="d-flex" style="justify-content: center;">
                <button type="button" onclick="window.location.href= 'pembayaran.php'">BATAL</button>
                <button type="submit" name="submit" >SIMPAN</button>
            </section>
        </form>
    </div>
</div>
</div>

<?php include 'footer.php' ?>