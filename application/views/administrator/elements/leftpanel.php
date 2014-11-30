<!-- START OF LEFT PANEL -->
    <div class="leftpanel">
      
        <div class="logopanel">
            <h1><a href="<?= site_url("administrator");?>">Admin</a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget">Hari ini: <?php echo date("d M Y"); ?></div>
       <!--NAVIGASI MENU UTAMA-->
      <!--NAVIGASI MENU UTAMA-->

<div class="leftmenu">
  <ul class="nav nav-tabs nav-stacked">
      <li class=""><a href="<?php echo site_url('administrator') ?>" title="Halaman Utama"><span class="icon-align-justify"></span> Dashboard</a></li>
    
    <!--MENU GUDANG-->
   <?php //if($this->ion_auth->is_admin()){ ?>
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Data Barang</a>
        <ul>
          <li><a href="<?=  site_url("administrator/kelola_barang/tambah");?>">Tambah Barang</a></li>
        <li title="Kelola Data Barang Yang Akan Di Publikasikan Di Website"><a href="<?=site_url("administrator/kelola_barang");?>">Kelola Barang</a></li>
       </ul>
    </li>
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Cabang Perusahaan</a>
      <ul>       
        <li><a href="<?=site_url("administrator/kelola_cabang/tambah");?>">Tambah Cabang</a></li> 
        <li><a href="<?=site_url("administrator/kelola_cabang");?>">Kelola Cabang</a></li>     
      </ul>
    </li>
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Kategori Barang</a>
      <ul>       
        <li><a href="<?=site_url("administrator/kelola_kategori/tambah");?>">Tambah Kategori Barang</a></li> 
        <li><a href="<?=site_url("administrator/kelola_kategori");?>">Kelola Kategori Barang</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Pengguna</a>
      <ul>       
        <li><a href="<?=site_url("administrator/pengaturan_pengguna/tambah");?>">Tambah Pengguna</a></li> 
        <li><a href="<?=site_url("administrator/pengaturan_pengguna");?>">Pengaturan Pengguna</a></li>     
      </ul>
    </li>
<!--    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Pengaturan</a>
      <ul>       
          <li><a href="<?//=site_url("administrator/pengaturan/umum");?>">Pengaturan Umum</a></li> 
        <li><a href="<?//=site_url("administrator/pengaturan/lanjut");?>">Pengaturan Lanjut</a></li>     
      </ul>
    </li>-->
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Akun</a>
      <ul>       
          <li><a href="<?=site_url("administrator/pengaturan_akun");?>">Pengaturan Akun</a></li> 
        <li><a href="<?=site_url("administrator/logout")?>">Keluar</a></li>     
      </ul>
    </li>
   <?php //}else {} ?>
    </ul>
</div>
<!--leftmenu-->

</div>
<!--mainleft--> 
<!-- END OF LEFT PANEL -->