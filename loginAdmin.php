<?php

include 'koneksi.php';

session_start();

if (isset($_SESSION['login'])) {
    header("Location: penjualan.php");
    exit;
}

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
?>
        <script>
            location.reload();
        </script>
<?php
        exit;
    } else {
        $error = true;
    }
}
?>

<?php include 'header.php' ?>

<div class="register">
    <div class="registerCard">
        <div class="cardreg">
            <div class="regCard">
                <form action="" method="post">
                    <section>
                        <h1 style="text-align: center; color: red">LOGIN ADMIN</h1>
                        <div>
                            <section>
                                <input type="text" name="username" id="" placeholder="username"> <br>
                            </section>
                            <section>
                                <input type="password" name="password" id="" placeholder="password"> <br>
                                <p>Belum punya akun? <a href="registrasi.php">Daftar disini</a></p>
                                <p style="text-align: center;"><a href="login.php" style="color: red; text-decoration: none;">Login nasabah</a></p>
                            </section>
                        </div>
                        <span class="d-flex" style="justify-content: center;">
                            <button type="submit" name="submit">LOGIN</button>
                        </span>
                        <?php if (isset($error)) { ?>
                        <p style="color: red; text-align: center;">Login gagal. Periksa kembali username dan password.</p>
                    <?php } ?>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>