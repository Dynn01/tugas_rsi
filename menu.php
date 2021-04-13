<ul class="sidebar-menu">
        <li class="header">Hi! <?php echo $_SESSION["username"]; ?></li>
        <li class="">
              <a href="logout.php">
              <span>Log Out</span>
              </a>
            </li>

    <?php if($_SESSION["level"]=="admin") { ?>
          <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=user"><i class="fa fa-user" aria-hidden="true"></i>User</a></li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-asterisk"></i><span>Master</span><i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=Unit"><i class="fa fa-circle-o"></i> Unit</a></li>
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=Jenis"><i class="fa fa-circle-o"></i> Jenis</a></li>
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=Instansi"><i class="fa fa-circle-o"></i> Instansi</a></li>
          </ul>
        </li>    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-exchange"></i>
            <span>Transaksi</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=surat_keluar"><i class="fa fa-circle-o"></i> Surat Keluar</a></li>
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=surat_masuk"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i>
            <span>Report</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=report_out"><i class="fa fa-circle-o"></i>Report Surat Keluar</a></li>
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=report_in"><i class="fa fa-circle-o"></i>Report Surat Masuk</a></li>
          </ul>
        </li>
    <?php } ?>
    <?php if($_SESSION["level"]=="pegawai") { ?>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Transaksi</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=surat_keluar"><i class="fa fa-circle-o"></i> Surat Keluar</a></li>
            <li><a href="<?php $_SERVER[SCRIPT_NAME];?>?page=surat_masuk"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
          </ul>
        </li>
    <?php } ?>
       
      </ul>