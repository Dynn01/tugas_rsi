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
    $sql="INSERT INTO instansi (kd_inst, nm_inst, status)
        VALUES
        ('$_POST[kd_inst]',
         '$_POST[nm_inst]',
         '$_POST[status]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Instansi baru dengan nama instansi :('.$_POST[nm_inst].') Tersimpan")
            window.location.href="index.php?page=Instansi";
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
        mysqli_query($config,"UPDATE instansi SET PK='$_POST[id]',
            kd_inst='$_POST[kd_inst]',
            nm_inst='$_POST[nm_inst]',
            status='$_POST[status]' WHERE PK='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Instansi dengan nama instansi :('.$_POST[nm_inst].') Di Update")
            window.location.href="index.php?page=Instansi";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM instansi where PK='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("instansi dengan Ids :('.$_GET[id].') Di Terhapus")
            window.location.href="index.php?page=Instansi";
            </script>';
    }

//End Aksi Anggota
?>
