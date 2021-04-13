<?php include 'theme/header.php'; ?>

<script type="text/javascript">
            $(function(){
                $(".datepicker").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: false,
                });
                $("#tgl_mulai").on('changeDate', function(selected) {
                    var startDate = new Date(selected.date.valueOf());
                    $("#tgl_akhir").datepicker('setStartDate', startDate);
                    if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
                        $("#tgl_akhir").val($("#tgl_mulai").val());
                    }
                });
            });
        </script>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
           
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
        
          <?php
              include 'menu.php';
          ?>

        </section>
        <!-- /.sidebar -->
      </aside>
      
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       
        <section class="content-header">
          <h1>
             Report Surat Keluar
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Report Surat Keluar</a></li>
            
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">
             
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body">
        <form action="index.php?page=report_out" method="post" style="width: 100%;">
        <h3>cari data berdasarkan tanggal</h3>
          <div class="form-group" style="width: 30%;">
              <label>Tanggal Awal</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
                  <input id="tgl_ mulai" placeholder="masukkan tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal"  value="<?php if (isset($_POST['tgl_awal'])) echo $_POST['tgl_awal'];?>" autocomplete=off>
              </div>
          </div>
          <div class="form-group" style="width: 30%;">
              <label>Tanggal Akhir</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
                  <input id="tgl_akhir" placeholder="masukkan tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir" value="<?php if (isset($_POST['tgl_akhir'])) echo $_POST['tgl_akhir'];?>" autocomplete=off>
              </div>
          </div>
          <div class="form-group">
          <input type="submit" class="btn btn-info" value="Cari">
          </div>
        </form>
                  <table class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>No. Surat</th>
                        <th>Nama Instansi</th>
                        <th>Tanggal Surat</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {

                        $tgl_awal=$_POST["tgl_awal"];
                        $tgl_akhir=$_POST["tgl_akhir"];

                        $sql="SELECT * FROM surat_keluar a, instansi b WHERE a.kd_inst=b.kd_inst AND a.tglsurat BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'";

                    }else {
                        $sql="SELECT pl.PK, no_surat, nm_inst, tglsurat FROM surat_keluar pl, instansi pn WHERE pl.kd_inst = pn.kd_inst;";
                    }

                    $hasil=mysqli_query($config,$sql);
                    $no=0;
                    while ($row = mysqli_fetch_array($hasil)) {
                        $no++;
                        ?>
                    
                        <tr>
                            <td><?php echo $no ;?></td>
                            <td><?php echo $row['no_surat'];?></td>
                            <td><?php echo $row['nm_inst'];?></td>
                            <td><?php  echo tanggal($row['tglsurat']);?></td> 
                            <td><a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=view&id=<?php echo $row['PK']; ?>">lihat PDF</a></td> 
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=view&id=<?php echo $row['PK']; ?>" class="btn btn-info"><li class="fa fa-download"></li> Cetak Lampiran</a> 
                             </td>
                        </tr> 
                        <?php
                          }
                      ?>
                    </tbody>
                   
                     
                  </table>
                  <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=laporan_out&tgl_awal=<?php echo $_POST['tgl_awal']; ?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>" class="btn btn-info"><li class="fa fa-download"></li> Download Laporan</a>
            </div><!-- /.box-body -->
             
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Content Wrapper. Contains page content -->
      
     
<?php include 'theme/footer.php'; ?>