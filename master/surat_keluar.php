<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
           
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"><b>Hello Lemon Leonhart</b></li>
            <li class="active">
              <a href="logout.php">
              <span>Log Out</span>
              </a>
            </li>
            <li class="active" >
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=user">
                <span>User</span>  
              </a>
            </li>
            <div class="dropdown-header">
              <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Master &nbsp; &emsp; &raquo;
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="<?php $_SERVER[SCRIPT_NAME];?>?page=Unit" style="color: black;">Unit</a></li>
                <li><a class="dropdown-item" href="<?php $_SERVER[SCRIPT_NAME];?>?page=Jenis" style="color: black;">Jenis</a></li>
                <li><a class="dropdown-item" href="<?php $_SERVER[SCRIPT_NAME];?>?page=Instansi" style="color: black;">Instansi</a></li>
              </ul>
            </div>
            <?php include 'transaksi.php'; ?> 
           </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Surat Keluar
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Surat Keluar</a></li>
            <li class="active">List Surat Keluar</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['id'];
                        $sql="SELECT  * FROM surat_keluar where PK='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Surat Keluar
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksiSurat_keluar.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">
                <div class="col-md-12 form-group">
                    <label>Nomor Surat</label>
                    <input readonly="" type="hidden" name="id" value="<?php echo $row['PK'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="no_surat" value="<?php echo $row['no_surat'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  
                    <div class="col-md-12 form-group">
                    <label>Kode Instansi</label>
                    <input type="text" name="kd_inst" value="<?php echo $row['kd_inst'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>
                    <div class="col-md-12 form-group">
                    <label>Tanggal Surat</label>
                    <input type="text" name="tglsurat" value="<?php echo $row['tglsurat'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>
                    <div class="col-md-12 form-group">
                    <label>Lampiran</label>
                    <input type="text" name="tglsurat" value="<?php echo $row['lampiran'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>
                 <div class="col-md-12 form-group"> 
                   <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                 </div>
                </div> 
                  </div></form>
              </div>
                   <?php                
                        }
                    }  else {
                    echo '';    
                    }
                    }?> 
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>No. Surat</th>
                        <th>Kode Instansi</th>
                        <th>Tanggal Surat</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM surat_keluar";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                            <td><?php echo $no ;?></td>
                            <td><?php echo $row['no_surat'];?></td>
                            <td><?php echo $row['kd_inst'];?></td>
                            <td><?php  echo $row['tglsurat'];?></td> 
                            <td><?php  echo $row['lampiran'];?></td> 
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=surat_keluar&id=<?php echo $row['PK'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a href="aksiSurat_keluar.php?sender=hapus&id=<?php echo $row['PK']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
                             </td>
                        </tr> 
                            <?php    
                    $no++;                    
                        }
                    }  else {
                    echo '';    
                    }
                    }?>
                    </tbody>
                   
                     
                  </table>
            </div><!-- /.box-body -->
             
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<form action="aksiSurat_keluar.php?sender=tambah" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Tambah Surat Masuk</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
    <div class="form-group">
      <label>Nomor Surat</label>
      <input type="text" name="no_surat" class="form-control" required="" placeholder="Enter ...">
    </div>
 
    <div class="form-group">
      <label>Kode Instansi</label>
      <textarea type="text" name="kd_inst" class="form-control" placeholder="Enter ..."></textarea> 
    </div>
    <div class="form-group">
      <label>Tanggal Surat</label>
      <textarea type="text" name="tglsurat" class="form-control" placeholder="Enter ..."></textarea> 
    </div>
    <div class="form-group">
      <label>Lampiran</label>
      <textarea type="text" name="lampiran" class="form-control" placeholder="Enter ..."></textarea> 
    </div>
 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
<button type="submit" class="btn btn-info"> Simpan</button> 
  
</div>
   
</div>
</div>
</div>
</form>

      <!-- Content Wrapper. Contains page content -->
      
     
<?php include 'theme/footer.php'; ?>