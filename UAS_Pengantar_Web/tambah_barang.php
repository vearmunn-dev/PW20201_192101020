    <!DOCTYPE html>
    <head>
    <title>Tambah Stok LKS</title>
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
    <h2>Form Input Data Stok LKS</h2>
    <form action="" method="post" name="form_input_lks" onsubmit="return cekform()">
    <table width="30%" border="1">
    <tr>
        <td>Kode </td>
        <td><input name="txt_kode" type="text" id="txt_kode" /></td>
    </tr>
    <tr>
        <td>
            <label for="kelas">Kelas</label>
        </td>
        <td>
            <select name="slct_kelas">
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
        <td><input name="txt_jumlah" type="text" id="txt_jumlah" /></td>
    </tr>
    <tr>
        <td>Harga</td>
        <td><input name="txt_harga" type="text" id="txt_harga"/></td>
    </tr>
    
    <tr>
        <td>&nbsp;</td>
        <td><input name="btn_simpan" type="submit" id="btn_simpan" value="Tambah Stok" /></td>
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
        $jumlah = $_POST['txt_jumlah'];
        $harga = $_POST['txt_harga'];
        $persediaan = $jumlah * $harga;
        
        $sql = "INSERT INTO tb_stok_lks VALUES('$kode','$kelas','$jumlah','$harga','$persediaan')";
        $kueri = mysqli_query($koneksi, $sql);
        if($kueri){
            echo "<script>alert('Data barang berhasil dimasukkan ke database')</script>";
        } else {
            echo "<script>alert('Data barang gagal dimasukkan ke database')</script>";

            echo mysqli_error($koneksi);
        }
    }
    ?>