<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS Tipe Genap</title>
</head>
<?php 
        if(isset($_POST['btnUlang']) )
        {
          $txtNama = "";
          $nama = "";
          $txtpertemuan = "";
          $pertemuan = "";
          $txtPeserta = ""; 
          $peserta = "";
          $slcKelas = "Select...";
          $Kelas = "";
          $slcTest = "Select...";
          $hasilTest = "";
          $BiayaKursus = "";
          $BiayaSubsidi = "";
          $JenisKursus = "";
          $NomorUrut = "";
          $Hari = "";
          $BiayaT = "";
          $BiayaBayar = "";
        }

        function getKursus($kode)
        {
            $Kode = "";
            $Kelas = "";
            $Hari = "";
            $NoUrut = "";
            $LamaPertemuan = "";
            $Biaya = 0;
            $JenisK = "";
            $a = Substr($kode, 0, 2);
            if($a == "VB"){
                $Kode = $a;
                $Hari = Substr($kode, 3,1);
                $NoUrut = Substr($kode, 4,3);
                $LamaPertemuan = Substr($kode, 8,2);
                $Kelas = "Visual Basic";
                $Biaya = 750000;
                $JenisK = "Pemrograman";
            }elseif($a == "DP"){
                $Kode = $a;
                $Hari = Substr($kode, 3,1);
                $NoUrut = Substr($kode, 4,3);
                $LamaPertemuan = Substr($kode, 8,2);
                $Kelas = "Delphi";
                $Biaya = 650000;
                $JenisK = "Pemrograman";
            }elseif($a == "LX"){
                $Kode = $a;
                $Hari = Substr($kode, 3,1);
                $NoUrut = Substr($kode, 4,3);
                $LamaPertemuan = Substr($kode, 8,2);
                $Kelas = "Linux";
                $Biaya = 800000;
                $JenisK = "Sistem Operasi";
            }
            return array($Kode, $Hari, $NoUrut, $LamaPertemuan, $Kelas, $Biaya, $JenisK);
        }
        if(isset($_POST['btnProses']) )
        {
            $kdDaftar = $_POST['slcPendaftaran'];
            $valKursus = getKursus($kdDaftar);
            $nama = $_POST['txtNama'];
            $JenisKursus = $valKursus[6];
            $Kelas = $valKursus[4];
            $JenisKelas = $_POST['slcKelas'];
            $NomorUrut = $valKursus[2];
            $hasilTest = $_POST['slcTest'];
            $Hari = $valKursus[1];
            if($Hari == 'K'){
                $Hari = "Kamis";
            }elseif($Hari == 'J'){
                $Hari = "Jumat";
            }elseif($Hari == 'M'){
                $Hari = "Minggu";
            }
            $peserta = $_POST['txtPeserta'];
            $pertemuan = $valKursus[3];
            $BiayaKursus = $valKursus[5];
            $BiayaTambahan = 0;
            $BiayaSubsidi = 0;
            $BiayaBayar = 0;
            if($JenisKelas == "Private"){
                if($peserta > 5){
                    $BiayaTambahan = 75000 * $peserta;
                }else{
                    $BiayaTambahan = 200000 * $peserta;
                }
            }else{
                if($peserta < 10){
                    $BiayaTambahan = 50000 * $peserta;
                }else{
                    $BiayaTambahan = 0;
                }
            }
    
            if($hasilTest == 'A'){
                $BiayaSubsidi = $BiayaKursus * 0.05;
            }elseif($hasilTest == 'B'){
                $BiayaSubsidi = $BiayaKursus * 0.02;
            }else{
                $BiayaSubsidi = 0;
            }
            $BiayaBayar = $BiayaKursus + $BiayaTambahan + $BiayaSubsidi;
        }
    ?>
<body>
    <form action="<?php ($_SERVER["PHP_SELF"]);?>" method="post">
    <center>
    <table width = "50%", border = '0'>
    <tr>
        <td colspan = '2'><center><h1>Nusantara Computer Center</h1></center></td>
    </tr>
    <tr>
        <td>Nama : </td>
        <td><input type="text" name="txtNama" id=""></td>
    </tr>
    <tr>
        <td>Kode Pendaftaran :</td>
        <td>
        <select name="slcPendaftaran" id="">
        <option value="">Select...</option>
        <option value="VBSK00108">VBSK00108</option>
        <option value="DPSJ00210">DPSJ00210</option>
        <option value="LXSM10105">LXSM10105</option>
        </select></td>
    </tr>
    <tr>
        <td>Kelas :</td>
        <td><select name="slcKelas" id="">
        <option value="">Select...</option>
        <option value="Regular">Regular</option>
        <option value="Private">Private</option>
        </select>
        </td>
    </tr>
    <tr>
        <td>Jumlah Pertemuan :</td>
        <td><input type="number" name="txtPertemuan" id="">  Kali</td>
    </tr>
    <tr>
        <td>Jumlah Peserta :</td>
        <td><input type="number" name="txtPeserta" id=""> Kali</td>
    </tr>
    <tr>
        <td>Hasil Test :</td>
        <td><select name="slcTest" id="">
        <option value="">Select...</option>
        <option value="A">Grade A</option>
        <option value="B">Grade B</option>
        <option value="C">Grade C</option>
        </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Proses" name="btnProses">  <input type="submit" value="Ulang" name="btnUlang"></td>
    </tr>
    </table>
    <center>
    <table width = 50%>
     <tr>
        <td colspan="2"><center><h1>Nusantara Computer Center</h1></center></td>
     </tr>
     <tr>
        <td colspan ="2"><center><h3>Kode Pendaftaran : <?php echo $kdDaftar?></h3></center></td>
     </tr>
     <tr>
        <td>Nama: <?php echo $nama?></td>
        <td>Jenis Kursus : <?php echo $JenisKursus?></td>
     </tr>
     <tr>
        <td>Kelas : <?php echo $Kelas?></td>
        <td>No. Urut : <?php echo $NomorUrut?></td>
     </tr>
     <tr>
        <td>Hasil test awal : <?php echo $hasilTest?></td>
        <td>Hari : <?php echo $Hari?></td>
     </tr>
     <tr>
        <td>Jumlah Peserta : <?php echo $peserta?> Orang</td>
        <td>Jumlah Pertemuan : <?php echo $pertemuan?>  Kali</td>
     </tr>
     <tr>
        <td>Biaya Kursus : <?php echo $BiayaKursus?></td>
        <td>Biaya Tambahan : <?php echo $BiayaTambahan?></td>
     </tr>
     <tr>
        <td>Biaya Subsidi : <?php echo $BiayaSubsidi?></td>
        <td>Biaya yang Dibayar : <?php echo $BiayaBayar?></td>
     </tr>
    </table>
    </center>
    </form>
    
</body>
</html>