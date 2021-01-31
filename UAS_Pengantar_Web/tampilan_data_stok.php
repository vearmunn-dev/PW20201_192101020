<!DOCTYPE html>
<head>
<title>Riwayat Input Stok LKS</title>
</head>

<body>
<!-- <?php
include "tambah_barang.php";
?> -->
<a href="tambah_barang.php">Tambah Stok</a>
|   
<a href="tambah_distribusi.php">Lihat Distribusi</a>
<center>
<table width="519" border="1">
  <caption align="top">
  <h2>Riwayat Input Stok LKS</h2>
  </caption>
  <tr>
    <th width="25" scope="col">No</th>
    <th width="103" scope="col">Kode </th>
    <th width="128" scope="col">Kelas </th>
    <th width="60" scope="col">Jumlah</th>
    <th width="81" scope="col">Nilai Persediaan</th>
    <th width="82" scope="col">Action Edit</th>
     <th width="82" scope="col">Action Delete</th>
  </tr>
<?php

include "koneksi.php";
$sql = "SELECT * FROM tb_stok_lks";
$kueri = mysqli_query($koneksi, $sql);
$no = 1;
while($data = mysqli_fetch_array($kueri)){
    ?>
    <tr>
        <td><?php echo $no?></td>
        <td><?php 
        echo $data['id']?></td>
        <td><?php echo $data['kelas']?></td>
        <td><?php echo $data['jumlah'];?></td>
        <td><?php echo $data['nilai_persediaan']?></td>
        <td><!-- buat link untuk edit dan delete dan berikan parameter dgn nama "kode"--><a href="edit_barang.php?id=<?php echo $data['id']?>">Edit</a> </td><td><a href="delete.php?id=<?php echo $data['id']?>">Delete</a></td>
    </tr>
    <?php
$no++;}
?>
</table>
<table>
<tr>
    <td>Jumlah LKS keseluruhan : </td>
    <td><?php 
        $result = mysqli_query($koneksi, 'SELECT SUM(jumlah) AS total_jumlah FROM tb_stok_lks'); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['total_jumlah'];
        echo $sum;
    ?></td>
</tr>
<tr>
    <td>Total Nilai Persediaan : </td>
    <td>
    <?php
        $result = mysqli_query($koneksi, 'SELECT SUM(nilai_persediaan) AS total_persediaan FROM tb_stok_lks'); 
        $row = mysqli_fetch_assoc($result); 
        $total_persediaan = $row['total_persediaan'];
        echo $total_persediaan;
    ?>
    </td>
</tr>
</table>
</center>
</body>
</html>