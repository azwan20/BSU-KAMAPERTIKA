<?php
include 'koneksi.php';

$sql = "SELECT * FROM penjemputan";
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$conn->close();
?>

<?php include 'header.php' ?>

<style>
    .jemputan{
        height: fit-content;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 30px 0;
    }
</style>

<div class="jemputan">
    <div class="container-fluid d-flex fill">
        <div class="container">
            <span class="d-flex">
                <h1 style="text-align: center;">PENJEMPUTAN</h1>
            </span>
            <div class="pembayaranAdmin">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2">NO</th>
                            <th scope="col" rowspan="2">HARI/TANGGAL</th>
                            <th scope="col" rowspan="2">NAMA NASABAH</th>
                            <th scope="col" rowspan="2">ALAMAT</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        $counter = 1;
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $counter; ?></th>
                                    <td><?php echo $row["tanggal"]; ?></td>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["alamat"]; ?></td>
                                    <td><button onclick="editRow(<?php echo $id; ?>)" style="background: transparent; border: none; margin: auto;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
                                                <path d="M39.5583 4.19168L45.8083 10.4417L41.0437 15.2083L34.7937 8.95835L39.5583 4.19168ZM16.6666 33.3333H22.9166L38.0979 18.1521L31.8479 11.9021L16.6666 27.0833V33.3333Z" fill="#0FA958" />
                                                <path d="M39.5833 39.5833H16.9958C16.9417 39.5833 16.8854 39.6042 16.8313 39.6042C16.7625 39.6042 16.6937 39.5854 16.6229 39.5833H10.4167V10.4167H24.6812L28.8479 6.25H10.4167C8.11875 6.25 6.25 8.11667 6.25 10.4167V39.5833C6.25 41.8833 8.11875 43.75 10.4167 43.75H39.5833C40.6884 43.75 41.7482 43.311 42.5296 42.5296C43.311 41.7482 43.75 40.6884 43.75 39.5833V21.525L39.5833 25.6917V39.5833Z" fill="#0FA958" />
                                            </svg>
                                        </button></td>
                                </tr>
                            </tbody>
                    <?php
                            $counter++;
                        }
                    } else {
                        echo "<tr><td colspan='12'>No data available</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function editRow(id) {

        window.location.href = 'edit_page.php?id=' + id;
    }
</script>

<?php include 'footer.php' ?>