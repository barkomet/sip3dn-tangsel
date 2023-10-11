<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css" />
    <title>Dashboard</title>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxl-dropbox'></i>
            <span class="logo-name">SIP3DN</span>
        </div>
        <ul class="nav-link">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-collection'></i>
                    <span class="link-name">Rekap PDN</span>
                </a>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bxs-plus-circle'></i>
                        <span class="link-name">Input PDN</span>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#">Tambah</a></li>
                        <li><a href="#">Edit</a></li>
                        <li><a href="#">Hapus</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-book-open'></i>
                    <span class="link-name">Panduan</span>
                </a>
            </li>
        </ul>
        <div class="profile-detail">
            <div class="profile content">
                <img src="" alt="">
            </div>
        </div>
    </div>
</body>

</html>