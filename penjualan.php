<?php
include 'koneksi.php';

$sql = "SELECT * FROM penjualan";
$result = mysqli_query($conn, $sql);

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<?php include 'header.php' ?>
<style>
    .table tr th {
        text-align: center;
    }
</style>

<div class="container-fluid d-flex fill">
    <div class="container">
        <span class="d-flex">
            <h1>PENJUALAN</h1>
            <div class="button">
                <button onclick="(window.location.href = 'form_penjualan.php')"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 39 39" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 19.5C3.25 10.5251 10.5251 3.25 19.5 3.25C28.4749 3.25 35.75 10.5251 35.75 19.5C35.75 28.4749 28.4749 35.75 19.5 35.75C10.5251 35.75 3.25 28.4749 3.25 19.5ZM19.5 6.5C16.0522 6.5 12.7456 7.86964 10.3076 10.3076C7.86964 12.7456 6.5 16.0522 6.5 19.5C6.5 22.9478 7.86964 26.2544 10.3076 28.6924C12.7456 31.1304 16.0522 32.5 19.5 32.5C22.9478 32.5 26.2544 31.1304 28.6924 28.6924C31.1304 26.2544 32.5 22.9478 32.5 19.5C32.5 16.0522 31.1304 12.7456 28.6924 10.3076C26.2544 7.86964 22.9478 6.5 19.5 6.5Z" fill="#F8F8F8" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.125 11.375C21.125 10.944 20.9538 10.5307 20.649 10.226C20.3443 9.92121 19.931 9.75 19.5 9.75C19.069 9.75 18.6557 9.92121 18.351 10.226C18.0462 10.5307 17.875 10.944 17.875 11.375V17.875H11.375C10.944 17.875 10.5307 18.0462 10.226 18.351C9.92121 18.6557 9.75 19.069 9.75 19.5C9.75 19.931 9.92121 20.3443 10.226 20.649C10.5307 20.9538 10.944 21.125 11.375 21.125H17.875V27.625C17.875 28.056 18.0462 28.4693 18.351 28.774C18.6557 29.0788 19.069 29.25 19.5 29.25C19.931 29.25 20.3443 29.0788 20.649 28.774C20.9538 28.4693 21.125 28.056 21.125 27.625V21.125H27.625C28.056 21.125 28.4693 20.9538 28.774 20.649C29.0788 20.3443 29.25 19.931 29.25 19.5C29.25 19.069 29.0788 18.6557 28.774 18.351C28.4693 18.0462 28.056 17.875 27.625 17.875H21.125V11.375Z" fill="#F8F8F8" />
                    </svg>
                    TAMBAH</button>
                <button onclick="window.history.back();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 39 39" fill="none">
                        <path d="M39 20.7188H4.76074L19.7476 35.7056L18.0337 37.4194L0.114258 19.5L18.0337 1.58057L19.7476 3.29443L4.76074 18.2812H39V20.7188Z" fill="#F8F8F8" />
                    </svg>
                    KEMBALI</button>
            </div>
        </span>
        <div class="pembayaranAdmin">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" rowspan="3">NO</th>
                        <th scope="col" rowspan="3">HARI/TANGGAL</th>
                        <th scope="col" colspan="8">JENIS SAMPAH</th>
                        <th scope="col" rowspan="3">AKSI</th>
                    </tr>
                    <tr>
                        <th scope="col" colspan="2">PLASTIK (P)</th>
                        <th scope="col" colspan="2">KERTAS (K)</th>
                        <th scope="col" colspan="2">LOGAM (L)</th>
                        <th scope="col" colspan="2">BOTOL/KACA (B)</th>
                    </tr>
                    <tr>
                        <th scope="col">Kg</th>
                        <th scope="col">Rp</th>
                        <th scope="col">Kg</th>
                        <th scope="col">Rp</th>
                        <th scope="col">Kg</th>
                        <th scope="col">Rp</th>
                        <th scope="col">Kg</th>
                        <th scope="col">Rp</th>
                    </tr>
                </thead>
                <?php
                if ($result->num_rows > 0) {
                    $counter = 1;
                    $total_berat_plastik = 0;
                    $total_harga_plastik = 0;
                    $total_berat_kertas = 0;
                    $total_harga_kertas = 0;
                    $total_berat_logam = 0;
                    $total_harga_logam = 0;
                    $total_berat_botol = 0;
                    $total_harga_botol = 0;
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $total_p = $row['p_kg'] * 6000;
                        $total_k = $row['k_kg'] * 3500;
                        $total_l = $row['l_kg'] * 1400;
                        $total_b = $row['b_kg'] * 1100;
                ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $counter ?></th>
                                <td><?php echo $row['tanggal'] ?></td>
                                <td><?php echo $row['p_kg'] ?></td>
                                <td><?php echo $total_p; ?></td>
                                <td><?php echo $row['k_kg'] ?></td>
                                <td><?php echo $total_k ?></td>
                                <td><?php echo $row['l_kg'] ?></td>
                                <td><?php echo $total_l ?></td>
                                <td><?php echo $row['b_kg'] ?></td>
                                <td><?php echo $total_b ?></td>
                                <td>
                                    <button onclick="deletePenjualan(<?php echo $id; ?>)" style="background: transparent; border: none;"><svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 66 66" fill="none">
                                            <path d="M26.972 46.75H29.722V22H26.972V46.75ZM36.278 46.75H39.028V22H36.278V46.75ZM16.5 55V16.5H13.75V13.75H24.75V11.6325H41.25V13.75H52.25V16.5H49.5V55H16.5Z" fill="#0FA958" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                <?php
                        $total_berat_plastik += $row['p_kg'];
                        $total_harga_plastik += $row['p_kg'];
                        $total_berat_kertas += $row['k_kg'];
                        $total_harga_kertas += $row['k_rp'];
                        $total_berat_logam += $row['l_kg'];
                        $total_harga_logam += $row['l_rp'];
                        $total_berat_botol += $row['b_kg'];
                        $total_harga_botol += $row['b_rp'];
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='12'>No data available</td></tr>";
                }
                ?>
                <tfoot>
                    <tr>
                        <?php
                        $total_plastik = $row['p_rp'] * $row['p_rp'];
                        $total_k = $row['k_rp'] * 3500;
                        $total_l = $row['l_rp'] * 1400;
                        $total_botol = $row['b_rp'] * $row['b_rp'];
                        ?>
                        <th>TOTAL</th>
                        <th></th>
                        <th><?php echo $total_berat_plastik . 'Kg'; ?></th>
                        <th><?php echo $total_harga_plastik; ?></th>
                        <th><?php echo $total_berat_kertas . 'Kg'; ?></th>
                        <th><?php echo $total_harga_kertas; ?></th>
                        <th><?php echo $total_berat_logam . 'Kg'; ?></th>
                        <th><?php echo $total_harga_logam; ?></th>
                        <th><?php echo $total_berat_botol . 'Kg'; ?></th>
                        <th><?php echo $total_harga_botol; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    function deletePenjualan(id) {
        var confirmation = confirm("Anda yakin ingin menghapus baris ini?");
        if (confirmation) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "deletePenjualan.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send("id=" + id);
        }
    }
</script>
<?php
// Close the database connection
$conn->close();
?>

<?php include 'footer.php' ?>