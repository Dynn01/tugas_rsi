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
    $sql="INSERT INTO surat_keluar (no_surat, kd_inst, tglsurat, lampiran)
        VALUES
        ('$_POST[no_surat]',
         '$_POST[kd_inst]',
         '$_POST[tglsurat]',
         '$_POST[tglsurat]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Surat Keluar baru telah Tersimpan")
            window.location.href="index.php?page=surat_keluar";
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
        mysqli_query($config,"UPDATE surat_keluar SET PK='$_POST[id]',
            no_surat='$_POST[no_surat]',
                kd_inst='$_POST[kd_inst]',
                tglsurat='$_POST[tglsurat]',
                lampiran='$_POST[lampiran]' WHERE PK='$_POST[id]'");
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
