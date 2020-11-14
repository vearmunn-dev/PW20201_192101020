<html>
<head>
<title>contoh Penggunaan IF</title>
</head>
<body>
<form action="<?php ($_SERVER["PHP_SELF"]);?>" method="post">
Besar Pembelian :
<input type=text name=total_beli><br><br>
<input type=submit name="tombol" value="Tentukan Diskon">
</form>
<?php

if(isset($_POST['tombol']) )
{
    $total = $_POST['total_beli'];    
// $total_beli=intval($total_beli);
$diskon=0;
if($total>=200000)
$diskon=0.1;
else if ($total>=100000)
$diskon= 0.05;
else
$diskon=0.01;
$diskon=$diskon * intval($total);
printf("Diskon = %s <br>\n", $diskon);
printf("Pembayaran = %s <br>\n", $total-$diskon);
}
?>
</body>
</html>