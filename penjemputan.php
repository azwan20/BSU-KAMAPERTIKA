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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASABAH</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <!-- bostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div>
        <nav class="navbar">
            <div class="container-fluid">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 74 74" fill="none">
                        <path
                            d="M67.2783 47.545L59.57 60.8958C58.0592 63.5475 55.2533 64.935 52.4167 64.75H46.25V70.9167L38.5417 57.0417L46.25 43.1667V49.3333H54.945L48.1 37.4625L61.4508 29.7542L67.0008 39.3742C68.6042 41.7483 68.82 44.9242 67.2783 47.545ZM28.3975 9.435H43.8142C46.8358 9.435 49.4567 11.1925 50.7208 13.7208L53.8042 19.0858L59.1383 16.0025L50.9983 29.6L35.1192 29.8775L40.4533 26.7942L36.1058 19.24L29.2917 31.1108L15.91 23.4025L21.46 13.7825C22.7242 11.2233 25.345 9.435 28.3975 9.435ZM15.5708 60.9267L7.86249 47.5758C6.35166 44.955 6.56749 41.81 8.13999 39.4358L11.2233 34.1017L5.88916 31.0183L21.7375 31.265L29.9083 44.8933L24.5742 41.81L20.2267 49.3333H33.9167V64.75H22.8167C21.3721 64.8545 19.9273 64.5516 18.6463 63.8758C17.3654 63.1999 16.2999 62.1781 15.5708 60.9267Z"
                            fill="#F8F8F8" />
                    </svg>
                    <a class="navbar-brand">BSU KEMAPERTIIKA</a>
                </span>
                <span>
                    <a href="#">PENJUALAN</a>
                    <a href="#">PEMBAYARAN</a>
                    <a href="penjemputan.php">PENJEMPUTAN</a>
                    <a href="logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                        <g clip-path="url(#clip0_2_66)">
                            <path
                                d="M70 34.965C70 15.6625 54.32 0 35 0C15.68 0 0 15.6625 0 34.965C0 45.5963 4.83 55.1775 12.39 61.6087C12.46 61.6787 12.53 61.6788 12.53 61.7488C13.16 62.2388 13.79 62.7287 14.49 63.2187C14.84 63.4287 15.12 63.7044 15.47 63.9844C21.254 67.906 28.0819 70.0016 35.07 70C42.0581 70.0016 48.886 67.906 54.67 63.9844C55.02 63.7744 55.3 63.4988 55.65 63.2844C56.28 62.7988 56.98 62.3088 57.61 61.8188C57.68 61.7488 57.75 61.7487 57.75 61.6787C65.17 55.1731 70 45.5963 70 34.965ZM35 65.5944C28.42 65.5944 22.4 63.4944 17.43 59.9987C17.5 59.4387 17.64 58.8831 17.78 58.3231C18.1971 56.8055 18.8089 55.3482 19.6 53.9875C20.37 52.6575 21.28 51.4675 22.4 50.4175C23.45 49.3675 24.71 48.3919 25.97 47.6219C27.3 46.8519 28.7 46.2919 30.24 45.8719C31.792 45.4536 33.3926 45.2432 35 45.2463C39.7716 45.2125 44.3679 47.0428 47.81 50.3475C49.42 51.9575 50.68 53.8475 51.59 56.0131C52.08 57.2731 52.43 58.6031 52.64 59.9987C47.4739 63.6307 41.315 65.5844 35 65.5944ZM24.29 33.2194C23.6732 31.8072 23.3631 30.2803 23.38 28.7394C23.38 27.2037 23.66 25.6637 24.29 24.2638C24.92 22.8638 25.76 21.6081 26.81 20.5581C27.86 19.5081 29.12 18.6725 30.52 18.0425C31.92 17.4125 33.46 17.1325 35 17.1325C36.61 17.1325 38.08 17.4125 39.48 18.0425C40.88 18.6725 42.14 19.5125 43.19 20.5581C44.24 21.6081 45.08 22.8681 45.71 24.2638C46.34 25.6637 46.62 27.2037 46.62 28.7394C46.62 30.3494 46.34 31.8194 45.71 33.215C45.102 34.5943 44.2481 35.8514 43.19 36.925C42.1161 37.9815 40.8589 38.8339 39.48 39.4406C36.5874 40.6294 33.3426 40.6294 30.45 39.4406C29.0711 38.8339 27.8139 37.9815 26.74 36.925C25.6804 35.8671 24.8469 34.6092 24.29 33.2194ZM56.77 56.4331C56.77 56.2931 56.7 56.2231 56.7 56.0831C56.0115 53.8931 54.9968 51.8193 53.69 49.9319C52.382 48.0304 50.7745 46.3535 48.93 44.9662C47.5214 43.9065 45.9945 43.0139 44.38 42.3063C45.1145 41.8217 45.795 41.26 46.41 40.6306C47.4536 39.6003 48.3701 38.4488 49.14 37.2006C50.6903 34.6535 51.491 31.7209 51.45 28.7394C51.4717 26.5323 51.0429 24.3439 50.19 22.3081C49.3479 20.3465 48.1358 18.5656 46.62 17.0625C45.1064 15.5751 43.3251 14.3876 41.37 13.5625C39.3308 12.7111 37.1396 12.2839 34.93 12.3069C32.7201 12.2853 30.5288 12.714 28.49 13.5669C26.518 14.3902 24.7324 15.6029 23.24 17.1325C21.7527 18.6444 20.5651 20.4243 19.74 22.3781C18.8871 24.4139 18.4583 26.6023 18.48 28.8094C18.48 30.3494 18.69 31.8194 19.11 33.215C19.53 34.685 20.09 36.015 20.86 37.2706C21.56 38.5306 22.54 39.6506 23.59 40.7006C24.22 41.3306 24.92 41.8862 25.69 42.3762C24.0705 43.1028 22.5431 44.0192 21.14 45.1063C19.32 46.5063 17.71 48.1819 16.38 50.0019C15.0599 51.8815 14.0441 53.9574 13.37 56.1531C13.3 56.2931 13.3 56.4331 13.3 56.5031C7.77 50.9075 4.34 43.3563 4.34 34.965C4.34 18.1125 18.13 4.33562 35 4.33562C51.87 4.33562 65.66 18.1125 65.66 34.965C65.6508 43.0148 62.4545 50.7335 56.77 56.4331Z"
                                fill="#F8F8F8" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2_66">
                                <rect width="70" height="70" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    </a>
                </span>
            </div>
        </nav>
    </div>

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
                <h1>PENJEMPUTAN</h1>
                <div class="button">
                    <button onclick="(window.location.href = 'form_penjemputanAdmin.php')"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 39 39" fill="none">
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
                            <th scope="col" rowspan="2">NO</th>
                            <th scope="col" rowspan="2">HARI/TANGGAL</th>
                            <th scope="col" rowspan="2">NAMA NASABAH</th>
                            <th scope="col" rowspan="2">ALAMAT</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        $counter = 1;
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $counter; ?></th>
                                    <td><?php echo $row["tanggal"]; ?></td>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td><?php echo $row["alamat"]; ?></td>
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
<?php include 'footer.php' ?>