<?php include 'theme/header.php'; ?>

     
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
             Surat Masuk
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Surat Masuk</a></li>
            <li class="active">List Surat Masuk</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['id'];
                        $sql="SELECT  * FROM surat_masuk where PK='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Surat Masuk
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksiSurat_masuk.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">
                    <div class="col-md-12 form-group">
                    <label>Tanggal Surat</label>
                    <br>
                    <input type="text" name="tglsurat" value="<?php echo $row['tglsurat'];?>" id="date" required="">
                    </div>
                    <div class="col-md-12 form-group">
                    <label>Nomor Surat</label>
                    <input readonly="" type="hidden" name="id" value="<?php echo $row['PK'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="no_surat" value="<?php echo $row['no_surat'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  
                    <div class="col-md-12 form-group">
                    <label>Perihal</label>
                    <input type="text" name="perihal" value="<?php echo $row['perihal'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>
                    <div class="col-md-12 form-group">
                    <label>Nama Instansi</label>
                    <select class="form-control" name="kd_inst">
                      <?php $result = mysqli_query($config, "SELECT * FROM instansi");
                      while($row=mysqli_fetch_assoc($result)){ ?>
                          <option value="<?php echo $row['kd_inst']; ?>"><?php echo $row['nm_inst']; ?></option>
                          <?php } ?>
                    </select>
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
                <h3 class="box-title"> <a href="" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>No. Surat</th>
                        <th>Nama Instansi</th>
                        <th>perihal</th>
                        <th>Tanggal Surat</th>
                        <th>Aksi</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT pl.PK, no_surat, perihal, nm_inst, tglsurat FROM surat_masuk pl, instansi pn WHERE pl.kd_inst = pn.kd_inst;";
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
                            <td><?php echo $row['nm_inst'];?></td>
                            <td><?php echo $row['perihal'];?></td>
                            <td><?php  echo tanggal($row['tglsurat']);?></td> 
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=surat_masuk&id=<?php echo $row['PK'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a href="aksiSurat_masuk.php?sender=hapus&id=<?php echo $row['PK']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
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
<form action="aksiSurat_masuk.php?sender=tambah" method="POST" >
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
      <input type="text" name="no_surat" class="form-control" required="" placeholder="Enter ..." autocomplete=off>
    </div>
    <div class="form-group">
    <label>Nama Instansi</label>
      <select class="form-control" name="kd_inst">
    <?php $result = mysqli_query($config, "SELECT * FROM instansi");
    while($row=mysqli_fetch_assoc($result)){ ?>
        <option value="<?php echo $row['kd_inst']; ?>"><?php echo $row['nm_inst']; ?></option>
        <?php } ?>
      </select>
    </div> 
    <div class="form-group">
      <label>Perihal</label>
      <input type="text" name="perihal" class="form-control" required="" placeholder="Enter ..." autocomplete=off>
    </div>
    <div class="form-group">
      <label>Tanggal Surat</label>
      <br>
      <input type="text" name="tglsurat" id="date" autocomplete=off> 
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