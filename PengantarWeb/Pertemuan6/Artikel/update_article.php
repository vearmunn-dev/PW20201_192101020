<?php
include 'koneksi.php';
$judul= $_POST['title'];
$id= $_POST['id'];
$penulis = $_POST['author'];
$lead = $_POST['abstraksi'];
$isi = $_POST['content'];
// $content = str_replace("\r\n","<br>",$content);
$taimu=date('Y-m-d H:i:s');
//$lead = str_replace("\r\n","<br>",$lead);
//$content= str_replace("\r\n","<br>",$content);
$update="UPDATE articles SET judul='$judul', penulis='$penulis',lead='$lead',content='$isi', waktu='$taimu' WHERE id ='$id'";
$hasil=mysql_db_query($dbname,$update);
if ($hasil) {
echo "Artikel berhasil di update<br>";
echo "<a href=\"tampil_articles.php\">List</a>";
} else {
echo "Artikel gagal di update";
}
?>