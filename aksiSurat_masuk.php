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
    $sql="INSERT INTO surat_masuk (no_surat, kd_inst, tglsurat)
        VALUES
        ('$_POST[no_surat]',
         '$_POST[kd_inst]',
         '$_POST[tglsurat]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Surat masuk baru telah Tersimpan")
            window.location.href="index.php?page=surat_masuk";
            </script>'; 
    }
    else{
        echo "Error : ".$sql.". ".mysqli_error($config);
    }
     //header('location:http://localhost/');
}

else 
    if($g=='edit')
    {
        mysqli_query($config,"UPDATE surat_masuk SET PK='$_POST[id]',
            no_surat='$_POST[no_surat]',
                kd_inst='$_POST[kd_inst]',
                tglsurat='$_POST[tglsurat]' WHERE PK='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Surat masuk telah Di Update")
            window.location.href="index.php?page=surat_masuk";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM surat_masuk where PK='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("surat masuk dengan PK :('.$_GET[id].') Di Terhapus")
            window.location.href="index.php?page=surat_masuk";
            </script>';
    }

//End Aksi Anggota
?>
