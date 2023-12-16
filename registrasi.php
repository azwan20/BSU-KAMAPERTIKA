<?php
include 'koneksi.php';


if (isset($_SESSION['login'])) {
    header("Location: pembayaran.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql6 = "insert into registrasi  (fName, lName,username, password) VALUES ('$fName', '$lName', '$username', '$password')";
    if (mysqli_query($conn, $sql6)) {
        echo "<script>window.location.href='login.php'</script>";
    } else {
        echo "Error: " . $sql6 . "<br>" . mysqli_error($conn);
    }
}
$conn->close();
?>

<?php include 'header.php' ?>

<div class="register">
    <div class="registerCard">
        <div class="cardreg">
            <div class="regCard">
                <form action="" method="post">
                    <section>
                        <h1 style="text-align: center;">REGISTER</h1>
                        <div>
                            <section class="d-flex" style="justify-content: space-between;">
                                <input type="text" name="fName" id="" placeholder="Fisrt Name" style="width: 48%;" required>
                                <input type="text" name="lName" id="" placeholder="Last Name" style="width: 48%;" required>
                            </section>
                            <section>
                                <input type="text" name="username" id="" placeholder="username" required> <br>
                            </section>
                            <section>
                                <input type="password" name="password" id="" placeholder="password" required> <br>
                                <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
                            </section>
                        </div>
                        <span class="d-flex" style="justify-content: center;">
                            <button type="submit" name="submit">REGISTER</button>
                        </span>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>