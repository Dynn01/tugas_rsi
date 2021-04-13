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
    $sql="INSERT INTO user (nama_pegawai, password, level)
        VALUES
        ('$_POST[nama_pegawai]',
         '$_POST[password]',
         '$_POST[level]')";   
        if (mysqli_query($config, $sql)){ 
        echo '<script LANGUAGE="JavaScript">
            alert("user baru dengan nama :('.$_POST[nama_pegawai].') Tersimpan")
            window.location.href="index.php?page=user";
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
        mysqli_query($config,"UPDATE user SET PK='$_POST[id]',
            nama_pegawai='$_POST[nama_pegawai]',
            password='$_POST[password]',
            level='$_POST[level]' WHERE PK='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("user dengan nama Pegawai :('.$_POST[nama_pegawai].') Di Update")
            window.location.href="index.php?page=user";
            </script>';
    } 
else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM user where PK='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("user dengan Ids :('.$_GET[id].') Di Terhapus")
            window.location.href="index.php?page=user";
            </script>';
    }

//End Aksi Anggota
?>
