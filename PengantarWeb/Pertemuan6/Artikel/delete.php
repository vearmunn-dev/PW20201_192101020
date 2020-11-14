<?php
include "koneksi.php";
$articleID = $_GET['id'];
$perintah="DELETE FROM articles WHERE id =\"$articleID\"";
$hasil= mysql_query ($perintah);
if ($hasil) {
echo "Artikel berhasil dihapus<br>";
echo "<a href=\"tampil_article.php\">Back</a>";
} else {
echo "Komentar gagal dihapus. Kemungkinan terjadi kegagalan
koneksi ke database MySQL.";

}

?>