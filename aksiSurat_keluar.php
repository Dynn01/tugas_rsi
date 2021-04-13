<?php
include 'koneksi.php';
/*
 * Heri Priady
 * Sample Crud MYSQLi
 * 10/07/2017 23:03
 * priadyheri@gmail.com
 * 082386376942
 * https://www.facebook.com/ciwerartikel
 * Alamat :Desa Kumain, Kec.Tandun, Kab.Rokan Hulu
 * and open the template in the editor.
 */ 
//Start Aksi Anggota
$g=$_GET['sender'];
if($g=='tambah')
{ 
    $tipe_file = $_FILES['lampiran']['type'];
    if ($tipe_file == "application/pdf") {
        $nama_file = trim($_FILES['lampiran']['name']);

        $sql="INSERT INTO surat_keluar (no_surat, kd_inst, tglsurat, tgltransaksi) VALUES ('$_POST[no_surat]','$_POST[kd_inst]','$_POST[tglsurat]',curdate())";  

         mysqli_query($config, $sql);
         
         $query = mysqli_query($config, "SELECT PK FROM surat_keluar ORDER BY PK DESC LIMIT 1");
         $data = mysqli_fetch_array($query);

         $nama_baru = "file_".$data['PK'].".pdf";
         $file_temp = $_FILES['lampiran']['tmp_name'];
         $folder    = "file";

         move_uploaded_file($file_temp, "$folder/$nama_baru");
         mysqli_query($config, "UPDATE surat_keluar SET lampiran='$nama_baru' WHERE PK='$data[PK]'");
         

        echo '<script LANGUAGE="JavaScript">
            alert("Surat Keluar baru telah Tersimpan")
            window.location.href="index.php?page=surat_keluar";
            </script>'; 
        
        if(mysqli_error($config)){
            echo "Error : ".$sql.". ".mysqli_error($config);
        }
    }else {
        echo "Gagal upload, file bukan PDF ! <a href='index.php?surat_keluar.php'> Kembali </a>";
    }
}

else 
    if($g=='edit')
    {
        mysqli_query($config,"UPDATE surat_keluar SET PK='$_POST[id]',
            no_surat='$_POST[no_surat]',
                kd_inst='$_POST[kd_inst]',
                tglsurat='$_POST[tglsurat]' WHERE PK='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Surat Keluar telah Di Update")
            window.location.href="index.php?page=surat_keluar";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM surat_keluar where PK='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("surat keluar dengan PK :('.$_GET[id].') Terhapus")
            window.location.href="index.php?page=surat_keluar";
            </script>';
    }

//End Aksi Anggota
?>
