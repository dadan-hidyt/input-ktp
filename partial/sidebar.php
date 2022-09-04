    <div class="w3-top w3-card" style="height:54px">
      <div style="background:#fef502 !important;" class="w3-flex-bar w3-theme w3-left-align">
        <div class="admin-logo w3-bar-item w3-hide-medium w3-hide-small">
          <h5 class="" style="line-height:1; margin:0!important; font-weight:300">
            <a href="" class="w3-button w3-bold">
              ADMINISTRATOR
            </a>
          </h5>
        </div>
        <label for="sidebar-control" class="w3-button w3-large w3-opacity-min"><i class="fa fa-bars"></i></label>
        <div class="w3-right">
          <div class="w3-button">
            <div class="w3-circle w3-center" style="width:38px; height:38px">
              <a href="logout.php"><i class="fa fa-fw fa-sign-out fa" style="margin-top:11px"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- start:sidebar -->
    <nav id="sidebar" class="w3-sidebar w3-top w3-bottom w3-collapse w3-white w3-border-right w3-border-top scrollbar" style="z-index:3;width:230px;height:auto;margin-top:54px;border-color:rgba(0, 0, 0, .1)!important" id="mySidebar">
      <div class="w3-bar-item w3-border-bottom w3-hide-large" style="padding:6px 0">
        <label for="sidebar-control" class="w3-left w3-button w3-large w3-opacity-min" style="background:white!important"><i class="fa fa-bars"></i></label>
        <h5 class="" style="line-height:1; margin:0!important; font-weight:300">
          <a href="" class="w3-button" style="background:white!important">
            Administrator </a>
        </h5>
      </div>
      <div class="w3-bar-block">
        <span class="w3-bar-item w3-padding w3-small w3-opacity" style="margin-top:8px"> MENU </span>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?halaman=dashboard" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-dashboard"></i>&nbsp; Dashboard </a>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?halaman=input-data" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-plus"></i>&nbsp; Tambah data </a>
          <a href="<?= $_SERVER['PHP_SELF'] ?>?halaman=data" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-address-card"></i>&nbsp; Lihat data </a>
        <a href="?halaman=export" class="w3-bar-item w3-button w3-padding-large w3-hover-text-primary">
          <i class="fa fa-fw fa-file-excel-o"></i>&nbsp; Export excel </a>
      </div>
    </nav>
    <!-- end sidebar -->