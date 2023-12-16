<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login.php");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $jenis_sampah = $_POST['jenis_sampah'];
    $berat = $_POST['berat'];
    $harga = $_POST['harga'];

    // Initialize variables for different waste types
    $berat_p = 0;
    $harga_p = 0;
    $berat_k = 0;
    $harga_k = 0;
    $berat_l = 0;
    $harga_l = 0;
    $berat_b = 0;
    $harga_b = 0;

    // Update the corresponding variable based on the selected waste type
    switch ($jenis_sampah) {
        case 'plastik':
            $berat_p = $berat;
            $harga_p = $harga;
            break;
        case 'kertas':
            $berat_k = $berat;
            $harga_k = $harga;
            break;
        case 'logam':
            $berat_l = $berat;
            $harga_l = $harga;
            break;
        case 'botol':
            $berat_b = $berat;
            $harga_b = $harga;
            break;
    }

    $sql = "INSERT INTO penjualan (tanggal, p_kg, p_rp, k_kg, k_rp, l_kg, l_rp, b_kg, b_rp)
            VALUES ('$tanggal', '$berat_p', '$harga_p', '$berat_k', '$harga_k', '$berat_l', '$harga_l', '$berat_b', '$harga_b')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data berhasil disimpan");</script>';
        echo '<script>window.location.href= "penjualan.php"</script>';
        // Additional code if needed
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$conn->close();
?>


<?php include 'header.php' ?>

<div class="tambahAdmin">
    <div>
        <form action="" method="post">
            <span>
                <p>HARI/TANGGAL</p>
                <section class="secInput">
                    <input type="date" name="tanggal" style="background-color: #fff;">
                </section>
            </span>
            <span>
                <p>JENIS SAMPAH</p>
                <section class="secInput">
                    <input name="jenis_sampah" type="radio" value="plastik">PLASTIK <br>
                    <input name="jenis_sampah" type="radio" value="kertas">KERTAS <br>
                    <input name="jenis_sampah" type="radio" value="logam">LOGAM <br>
                    <input name="jenis_sampah" type="radio" value="botol">BOTOL KACA <br>
                </section>
            </span>
            <span style="justify-content: space-between;">
                <section class="d-flex inputSec">
                    <p>BERAT</p>
                    <input name="berat" type="number">
                </section>
            </span>
            <section class="d-flex" style="justify-content: center;">
                <button type="button" onclick="window.location.href= 'penjualan.php'">BATAL</button>
                <button type="submit" name="submit">SIMPAN</button>
            </section>
        </form>
    </div>
</div>

<?php include 'footer.php' ?>