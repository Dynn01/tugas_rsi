<?php

session_start();

$nama=isset($_SESSION['role']);

if($nama && $nama=='admin')
{
    $hello = "Hello ".$_SESSION['role']; 
} else {
    header('Location:login.php');
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];
 
if ( empty($get))
{
   include ('master/Jenis.php');	
}

elseif ($get=='Jenis')
{
  include ('master/Jenis.php');
}
elseif ($get=='Unit')
{
  include ('master/Unit.php');
}
elseif ($get=='Instansi')
{
  include ('master/Instansi.php');
}
elseif ($get=='user')
{
  include ('master/user.php');
}
elseif ($get=='surat_masuk')
{
  include ('master/surat_masuk.php');
}
elseif ($get=='surat_keluar')
{
  include ('master/surat_keluar.php');
}
?>