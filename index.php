<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["search"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <a href="logout.php">logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="add.php">Add Data</a>
    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="Cari data" autocomplete="off" id="keyword">
        <button type="submit" name="search" id="tombol-cari">Search</button>
    </form>
    <br>

    <div id="container">

    <table border="1" cellpadding="10" cellspacing="0">
        
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Image</th>
            <th>NIM</th>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
        </tr>
        <?php $i = 1;?>
        <?php foreach ( $mahasiswa as $row) :?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="edit.php?id=<?= $row["id"];?>">Edit</a> |
                <a href="delete.php?id=<?= $row["id"];?>" onclick="return confirm ('yakin?');">Delete</a>
            </td>
            <td><img src="/img/<?= $row["gambar"];?>" width="50"></td>
            <td><?= $row["nim"];?></td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"];?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>


    </table>
    </div>

<script src="js/script.js"></script>
</body>
</html>