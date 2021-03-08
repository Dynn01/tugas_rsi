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
    $sql="INSERT INTO jenis (jenis)
        VALUES
        ('$_POST[jenis]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("Jenis baru dengan nama jenis :('.$_POST[jenis].') Tersimpan")
            window.location.href="index.php?page=Jenis";
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
        mysqli_query($config,"UPDATE jenis SET PK='$_POST[id]',
            jenis='$_POST[jenis]' WHERE PK='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Jenis dengan nama jenis :('.$_POST[jenis].') Di Update")
            window.location.href="index.php?page=Jenis";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM jenis where PK='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Jenis dengan Id :('.$_GET[id].') Di Terhapus")
            window.location.href="index.php?page=Jenis";
            </script>';
    }

//End Aksi Anggota
?>
