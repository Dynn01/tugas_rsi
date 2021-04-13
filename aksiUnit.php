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
    $sql="INSERT INTO unit (kd_unit, nm_unit)
        VALUES
        ('$_POST[kd_unit]',
         '$_POST[nm_unit]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Unit baru dengan nama unit :('.$_POST[nm_unit].') Tersimpan")
            window.location.href="index.php?page=Unit";
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
        mysqli_query($config,"UPDATE unit SET PK='$_POST[id]',
            kd_unit='$_POST[kd_unit]', 
            nm_unit='$_POST[nm_unit]' WHERE PK='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Unit dengan nama unit :('.$_POST[nm_unit].') Di Update")
            window.location.href="index.php?page=Unit";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM unit where PK='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Unit dengan Id :('.$_GET[id].') Di Terhapus")
            window.location.href="index.php?page=Unit";
            </script>';
    }

//End Aksi Anggota
?>
