<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Image</th>
            <th>NIM</th>
            <th>Name</th>
            <th>Major</th>
        </tr>
        <?php $i = 1;?>
        <?php foreach ( $mahasiswa as $row) :?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="">Edit</a> |
                <a href="">Delete</a>
            </td>
            <td><img src="/img/<?= $row["gambar"]?>" width="50"></td>
            <td><?= $row["nim"]?></td>
            <td><?= $row["nama"]?></td>
            <td><?= $row["email"]?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>


    </table>
</body>
</html>