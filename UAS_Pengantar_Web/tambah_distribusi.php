<?php
include 'koneksi.php';
$kode = '';
if(isset($_GET['id'])){
    $kode = $_GET['id'];
 }
 $sql = "SELECT * FROM tb_sekolah WHERE id='$kode'";
 $kueri = mysqli_query($koneksi, $sql);
 $data = mysqli_fetch_array($kueri);
 
 $kode = $data['id'];
 $sekolah = $data['nama_sekolah'];
 $kelas = $data['kelas'];
 $jumlah = $data['jumlah'];
?>
<!DOCTYPE html>
<head>
<title>Tambah Data Barang</title>
<script language="javascript">
function cekform(){
    
   if(document.form_input_lks.txt_sekolah.value==""){
        alert('Nama Sekolah Harus Diisi');
        document.form_input_lks.txt_sekolah.focus();
        return false;
    } else if(document.form_input_lks.txt_jumlah.value==""){
        alert('Jumlah Harus Diisi');
        document.form_input_lks.txt_jumlah.focus();
        return false;
    } else {
        return true;
    }
}
</script>
</head>

<body>   
<a href="tampilan_data_stok.php">Lihat Stok</a>
<center>
<h2>Form Input Data Distribusi</h2>
<form action="" method="post" name="form_input_lks" onsubmit="return cekform()">
<table width="30%" border="0">
  <tr>
  <td width="163">Kode </td>
    <td width="321"><input name="txt_kode" type="text" id="txt_kode" size="5" maxlength="5" value="<?php echo $kode ?>"/></td>
  </tr>
  <tr>
    <td>Nama Sekolah</td>
    <td><input name="txt_sekolah" type="text" id="txt_sekolah" value="<?php echo $sekolah?>"/></td>
  </tr>
  <tr>
    <td>
        <label for="kelas">Kelas</label>
    </td>
    <td>
        <select name="slct_kelas">
        <option value="<?php echo $kelas?>"><?php echo $kelas?></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>Jumlah </td>
    <td><input name="txt_jumlah" type="text" id="txt_jumlah" value="<?php echo $jumlah?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btn_simpan" type="submit" id="btn_simpan" value="Tambah" /> <input name="btn_edit" type="submit" id="btn_edit" value="Edit" /></td>
    
  </tr> 
</table>
</form>
</center>
</body>
</html>
<?php

include "koneksi.php";
if(isset($_POST['btn_simpan'])){   
    $kode = $_POST['txt_kode'];
    $kelas = $_POST['slct_kelas'];
    $sekolah = $_POST['txt_sekolah'];
    $jumlah = $_POST['txt_jumlah'];

   
    $sql = "INSERT INTO tb_sekolah VALUES('$kode','$sekolah','$kelas','$jumlah')"; 
    $kueri = mysqli_query($koneksi, $sql); 
    if($kueri){
        echo "<script>alert('Data Distribusi Sekolah berhasil dimasukkan ke database')</script>";
    } else {
        echo "<script>alert('Data barang gagal dimasukkan ke database')</script>";
        echo mysqli_error($koneksi);
    }
}
else if(isset($_POST['btn_edit'])){
    
    $kode = $_POST['txt_kode'];
    $sekolah = $_POST['txt_sekolah'];
   $kelas = $_POST['slct_kelas'];
   $jumlah = $_POST['txt_jumlah'];
    
    $sql = "UPDATE `tb_sekolah` SET `nama_sekolah`='$sekolah',`kelas`='$kelas',`jumlah`='$jumlah' WHERE id = '$kode' ";
    $kueri = mysqli_query($koneksi, $sql);
    if($kueri){
        echo "<script>alert('Data barang berhasil diedit');document.location='tambah_distribusi.php'</script>";
    } else {
        echo "<script>alert('Data barang gagal diedit');</script>";
        echo mysqli_error($koneksi);
    }
}
?>
<?php
include 'distribusi.php';
?>