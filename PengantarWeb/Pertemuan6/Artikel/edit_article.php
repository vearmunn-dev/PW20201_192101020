<?php
include "koneksi.php";
$id = $_GET['id'];
// Query satu record artikel dari tabel sesuai nilai $id
$perintah="SELECT * FROM articles WHERE id =\"$id\"";
$hasil=mysql_db_query($dbname,$perintah);
$row=mysql_fetch_array($hasil);
$time=date('Y-m-d H:i:s');
?>
<h1>Form Berita</h1>
<form name=article method=post action=update_article.php>
<input type="hidden" name="id" value="<?php 
"$row[id]"
?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="18%">Judul</td>
<td width="2%">:</td>
<td width="80%"><input type="text" name="title" size="50"
class="masukan"
value="<?php echo "$row[judul]" ?>"></td>
</tr>
<tr>
<td>Penulis</td>
<td>:</td>
<td><input type="text" name="author" size="50" class="masukan"
value="<?php echo "$row[penulis]" ?>"></td>
</tr>
<tr valign="top">
<td>Lead</td>
<td>:</td>
<td><textarea name="abstraksi" rows="4" cols="50">
<?php echo "$row[lead]" ?></textarea></td>
</tr>
<tr valign="top">
<td>Content</td>

<td>:</td>
<td><textarea name="content" rows="4" cols="50">
<?php echo "$row[content]" ?></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>
<input type="submit" name="masuk" value="Update"
class="tombol">
<input type="reset" name="hapus" value="Cancel"
class="tombol"></td>
</tr>
</table>
</form>