<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSI Kendal</title>
</head>
<body>
<?php
$id    = mysqli_real_escape_string($config,$_GET['id']);
$query = mysqli_query($config,"SELECT * FROM surat_keluar WHERE PK='$id'");
$data  = mysqli_fetch_array($query);
?>

<hr>
 <a href='<?php $_SERVER[SCRIPT_NAME];?>?page=surat_keluar'> Kembali </a>
<hr>
 <embed src="file/<?php echo $data['lampiran'];?>" type="application/pdf" width="800" height="600" >
</body>
</html>