<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}

include('includes/db.php'); // Pastikan ini merujuk ke file koneksi database yang sesuai.

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input (misalnya, pastikan semua field diisi)
    if (empty($username) || empty($password)) {
        $error = 'Silakan isi semua field.';
    } else {
        // Query ke database untuk mencocokkan username dan password
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $koneksi->query($sql);

        if ($result->num_rows === 1) {
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            $error = 'Username atau password salah.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="Author" content="SignUp-Form" />
    <meta name="SIP3DN" content="SignUp" />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />

    <title>Login | SIP3DN</title>
</head>

<body>
    <div class="circle"></div>
    <div class="card">
        <div class="logo">
            <i class="bx bx-bitcoin"></i>
        </div>
        <h2>Login</h2>
        <form class="form" method="POST">
            <input type="text" name="username" placeholder="Nama" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit">Login</button>
        </form>
        <footer>
            Belum punya akun?, silahkan daftar
            <a href="/index.html">Here</a>
        </footer>

        <?php if (!empty($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
    </div>
</body>

</html>