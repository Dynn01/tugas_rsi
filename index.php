<?php


session_start();

if (empty($_SESSION['username'])) {
  header('location:login.php');
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
include 'koneksi.php';
include 'fungsi.php';
$get=$_GET['page'];
$g = $_GET['level']; 

if ($g=='admin')
{
    include ('master/user.php');	
}
elseif ($g=='pegawai') 
{
    include ('master/surat_masuk.php');
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
elseif ($get=='laporan_out')
 {
  include ('laporan_out.php');
}
elseif ($get=='report_out')
 {
  include ('master/report_out.php');
}
elseif ($get=='report_in')
 {
  include ('master/report_in.php');
}
elseif ($get=='laporan_in')
 {
  include ('laporan_in.php');
}

?>