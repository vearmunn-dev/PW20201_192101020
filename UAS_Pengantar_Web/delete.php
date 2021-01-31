<?php
if(isset($_GET['id'])){
   include "koneksi.php";
   $kode = $_GET['id'];
   $sql = "DELETE FROM tb_stok_lks WHERE id='$kode'";
   $kueri = mysqli_query($koneksi, $sql);
   if($kueri){ 
    echo "<script>alert('Data barang berhasil dihapus');document.location='tampilan_data_stok.php'</script>";
   } else{
   echo "<script>alert('Data barang Gagal dihapus');document.location='tampilan_data_stok.php'</script>";
   }
} else {
    echo "<script>alert('Kode Barang Belum Dipilih');document.location='tampilan_data_stok.php'</script>";
}
?>
