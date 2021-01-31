<!DOCTYPE html>
<head>
<title>Distribusi</title>
</head>

<body>
<center>
<table width="519" border="1">
  <caption align="top">
  <h2>Data Distribusi</h2>
  </caption>
  <tr>
    <th width="25" scope="col">No</th>
    <th width="103" scope="col">Kode </th>
    <th width="128" scope="col">Nama Sekolah </th>
    <th width="60" scope="col">Kelas</th>
    <th width="81" scope="col">Jumlah</th>
    <th width="82" scope="col">Action Edit</th>
     <th width="82" scope="col">Action Delete</th>
  </tr>
<?php

include "koneksi.php";
$sql = "SELECT * FROM tb_sekolah";
$kueri = mysqli_query($koneksi, $sql);
$no = 1;
while($data = mysqli_fetch_array($kueri)){
    ?>
    <tr>
        <td><?php echo $no?></td>
        <td><?php 
        echo $data['id']?></td>
        <td><?php echo $data['nama_sekolah']?></td>
        <td><?php echo $data['kelas'];?></td>
        <td><?php echo $data['jumlah']?></td>
        <td><a href="tambah_distribusi.php?id=<?php echo $data['id']?>">Edit</a> </td><td><a href="delete_distribusi.php?id=<?php echo $data['id']?>">Delete</a></td>
    </tr>
    <?php
$no++;}
?>
</table>
<!-- <table>
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
</table> -->
</center>
</body>
</html>