<?php
include 'koneksi.php';
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

function tanggal1($tgl)
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

if (!empty($_GET['tgl_awal']) && !empty($_GET['tgl_akhir'])) {

    $tgl_awal=$_GET["tgl_awal"];
    $tgl_akhir=$_GET["tgl_akhir"];


    $sql="SELECT * FROM surat_keluar a, instansi b WHERE a.kd_inst=b.kd_inst AND a.tglsurat BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'";

}else {
    $sql="SELECT pl.PK, no_surat, nm_inst, tglsurat FROM surat_keluar pl, instansi pn WHERE pl.kd_inst = pn.kd_inst;";
}

$html = '<center><h3>Data Surat Keluar</h3></center><hr/><br/>';
$html .= "Laporan surat keluar";
$html .= '<table border="1" width="100%">
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Nama Instansi</th>
            <th>Tanggal Surat</th>
        </tr>';
$no = 1;
if (!$result=  mysqli_query($config, $sql)){
    die('Error:'.mysqli_error($config));
    }  else {
    if (mysqli_num_rows($result)> 0){
    while ($row=  mysqli_fetch_assoc($result)){
    $html .= "<tr>
        <td>".$no."</td>
        <td>".$row['no_surat']."</td>
        <td>".$row['nm_inst']."</td>
        <td>".tanggal1($row['tglsurat'])."</td>
    </tr>";
    $no++;                    
    }
    } else {
    echo '';    
    }
    }
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('legal','');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf',array('Attachment'=>false));
?>