<?php

if(isset($_GET['id'])){
   include "koneksi.php";
   $kode = $_GET['id'];
   $sql = "DELETE FROM tb_sekolah WHERE id='$kode'";
   $kueri = mysqli_query($koneksi, $sql);
   if($kueri){
    echo "<script>alert('Data barang berhasil dihapus');document.location='tambah_distribusi.php'</script>";
   } else{
   echo "<script>alert('Data barang Gagal dihapus');document.location='tambah_distribusi.php'</script>";
   }
} else {
    echo "<script>alert('Kode Barang Belum Dipilih');document.location='tambah_distribusi.php'</script>";
}
?>
