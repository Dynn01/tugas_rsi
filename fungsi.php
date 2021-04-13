<?php
function kode_tanggal_out($config,$inisial)
{

// cek kode
$query = mysqli_query($config, "SELECT max(right(no_surat, 4)) AS kode FROM surat_keluar WHERE DATE(tgltransaksi) = CURDATE()");

// var_dump($query);

if ($query->num_rows > 0) {
 foreach ($query as $q) {
  $no = ((int)$q['kode'])+1;
  $kd = sprintf("%04s", $no);
 }
} else {
 $kd = "0001";
}

date_default_timezone_set('Asia/Jakarta');
$kode = $inisial.date('dmy').$kd;
return $kode;
}

function tanggal($tgl)
{
 $date = explode("-", $tgl);

 $bln  = $date[1];

 switch ($bln) {
  case '01': $bulan = "Januari"; break;
  case '02': $bulan = "Februari"; break;
  case '03': $bulan = "Maret"; break;
  case '04': $bulan = "April"; break;
  case '05': $bulan = "Mei"; break;
  case '06': $bulan = "Juni"; break;
  case '07': $bulan = "Juli"; break;
  case '08': $bulan = "Agustus"; break;
  case '09': $bulan = "September"; break;
  case '10': $bulan = "Oktober"; break;
  case '11': $bulan = "November"; break;
  case '12': $bulan = "Desember"; break;
 }
 $tanggal = $date[2];
 $tahun   = $date[0];

 $strTanggal = "$tanggal $bulan $tahun";
 return $strTanggal;
}