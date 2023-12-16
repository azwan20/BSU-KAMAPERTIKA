<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['tanggal'], $_POST['nama'], $_POST['alamat'])) {
        $id = $_POST['id'];
        $tanggal = $_POST["tanggal"];
        $nama= $_POST['nama'];
        $alamat =  $_POST['alamat'];

        $queryUpdate = "UPDATE penjemputan SET 
                        tanggal = '$tanggal', 
                        nama = '$nama', 
                        alamat = '$alamat' 
                        WHERE id = $id";

        if (mysqli_query($conn, $queryUpdate)) {
            echo '<script>window.location.href = "penjemputan.php"</script';
        } else {
            echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Semua kolom harus diisi.";
    }
}

// Fetch the data for the selected ID from the database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM penjemputan WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tanggal = $row["tanggal"];
        $nama= $row["nama"];
        $alamat = $row["alamat"];
    } else {
        echo "Data tidak ditemukan.";
    }
}
?>

<?php include 'header.php' ?>


<div class="jemputAdmin">
    <div style="background-color: #fff; padding: 10px; border-radius: 20px; ">
        <form action="" method="post">
            <span>
                <p>HARI/TANGGAL</p>
                <section class="secInput">
                    <input type="text" name="id" value="<?php echo $id ?>" style="display: none;">
                    <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" style="background-color: #fff;">
                </section>
            </span>
            <span>
                <p>NAMA NASABAH</p>
                <section class="secInput">
                    <input type="text" name="nama" value="<?php echo $nama; ?>" style="background-color: #fff;">
                </section>
            </span>
            <span>
                <p>ALAMAT</p>
                <section class="secInput">
                    <input type="text" name="alamat" value="<?php echo $alamat; ?>" style="background-color: #fff;">
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
