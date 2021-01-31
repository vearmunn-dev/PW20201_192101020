<?php
  include "koneksi.php";

if(isset($_GET['id'])){
   $kode = $_GET['id'];
} else {
    
    echo "<script>alert('Kode Barang Belum Dipilih');document.location='tampilan_data_stok.php'</script>";
}

   $sql = "SELECT * FROM tb_stok_lks WHERE id='$kode'";
   $kueri = mysqli_query($koneksi, $sql);
   $data = mysqli_fetch_array($kueri);
   
   $kode = $data['id'];
   $kelas = $data['kelas'];
   $jumlah = $data['jumlah'];
   $harga = $data['harga'];
   $persediaan = $data['nilai_persediaan'];
?>
<!-- sekarang bikin formnya -->
<html>
<head><title>Edit Data Barang</title>
<script language="javascript">
function cekform(){
    
    if(document.form_input_lks.txtnama.value==""){
        alert('Kode Harus Diisi');
        document.form_input_lks.txt_kode.focus();
        return false;
    } else if(document.form_input_lks.txt_harga.value==""){
        alert('Harga Harus Diisi');
        document.form_input_lks.txt_harga.focus();
        return false;
    } else if(document.form_input_lks.txt_jumlah.value==""){
        alert('Persediaan Barang Harus Diisi');
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
<h2>Form Edit Data Stok LKS</h2>
<form action="" method="post" name="frmbarang" onsubmit="return cekform()">
<table width="500" border="1">
  <tr>
    <td width="163">Kode Barang </td>
    <td width="321"><input name="txt_kode" type="text" id="txt_kode" size="5" maxlength="5" value="<?php echo $kode ?>" readonly/></td>
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
    <td>Jumlah</td>
    <td><input name="txt_jumlah" type="text" id="txt_jumlah" value="<?php echo $jumlah?>"/></td>
  </tr>
  <tr>
    <td>Harga</td>
    <td><input name="txt_harga" type="text" id="txt_harga" value="<?php echo $harga?>"/></td>
  </tr>
  <tr>
    <td>Nilai Persediaan</td>
    <td><input name="txt_persediaan" type="text" id="txt_persediaan" value="<?php echo $persediaan?>"readonly/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="tblEdit" type="submit" id="tblEdit" value="Edit Barang" /></td>
  </tr>
</table>
</form>
</body>
</center>
</html>
<?php


if(isset($_POST['tblEdit'])){
    
    $kode = $_POST['txt_kode'];
   $kelas = $_POST['slct_kelas'];
   $jumlah = $_POST['txt_jumlah'];
   $harga = $_POST['txt_harga'];
   $persediaan = $_POST['txt_persediaan'];
    
    $sql = "UPDATE tb_stok_lks SET kelas='$kelas', harga='$harga', jumlah='$jumlah', nilai_persediaan='$persediaan' WHERE id='$kode'";
    $kueri = mysqli_query($koneksi, $sql);
    
    if($kueri){
        echo "<script>alert('Data barang berhasil diedit'); document.location='tampilan_data_stok.php'</script>";
    } else {
        echo "<script>alert('Data barang gagal diedit')</script>";
        echo mysqli_error();
    }
}
?>