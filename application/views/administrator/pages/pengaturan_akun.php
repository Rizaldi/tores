<?php 
$i = $this->uri->segment(3); 
$z = site_url("administrator/pengaturan_akun/");
?>
<div class="navbar navbar-inner" style="">
    <div class="nav-tabs">
        <ul class="nav">
            <li class="<?php if($i=="umum"){echo 'active';} ?>"><a href="<?=$z.'/umum';?>">Umum</a></li>
            <!--<li class="<?php if($i=="password"){echo 'active';} ?>"><a href="<?=$z.'/password';?>">Password</a></li>-->
            <li class="<?php if($i=="tingkat_lanjut"){echo 'active';} ?>"><a href="<?=$z.'/tingkat_lanjut';?>">Tingkat Lanjut</a></li>
        </ul>
    </div>
</div>

<div class="well well-small" style="min-height: 300px;">
    <?php if($i == "umum"){ ?>
        <?php foreach($user_logged->result() as $ul){ ?>
        <?=form_open("action/UpdateAccount",array("class" => ""));?>
        <table class="table table-buttonlist table-invoice-full">
            <thead>
                <th colspan="5">Ubah Akun Anda</th><input type="hidden" name="now" value="<?=date("Y-m-d H:i:s")?>">
            </thead>
            <tbody>
                <tr>
                    <td><label>Full Name</label></td>
                    <td><input type="text" class="input-large" name="fname" placeholder="First Name" value="<?=$ul->first_name;?>">&nbsp; <input type="text" class="input-large" name="lname" placeholder="Last Name" value="<?=$ul->last_name;?>"></td>
                </tr>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" class="input-large" name="username" disabled="disabled" value="<?=$ul->username;?>" title="Username Tidak Dapat Diubah"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="text" class="input-large" name="email" value="<?=$ul->email;?>"></td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td colspan=""></td>
                    <td colspan=""><input type="submit" value="Ubah" class="btn"></td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
        <?=form_close();?>
    <?php }else if($i == "password"){ ?>
        <?=form_open("action/AddUsers",array("class" => ""));?>
    <h1>SEDANG DALAM PERBAIKAN</h1>
<!--        <table class="table table-buttonlist table-invoice-full">
            <thead>
                <th colspan="5">Ubah Password Anda</th>
            </thead>
            <tbody>
                <tr>
                    <td><label>Password Lama</label></td>
                    <td><input type="text" class="input-large" name="fname" placeholder=""></td>
                </tr>
                <tr>
                    <td><label>Password Baru</label></td>
                    <td><input type="text" class="input-large" name="username"></td>
                </tr>
                <tr>
                    <td><label>Ulangi Password Baru</label></td>
                    <td><input type="text" class="input-large" name="email"></td>
                </tr>
                </tr>
                <tr>
                    <td colspan=""></td>
                    <td colspan=""><input type="submit" value="OK" class="btn btn-primary" onclick="return confirm('Ubah Password ?')"></td>
                </tr>
            </tbody>
        </table>-->
        <?=form_close();?>
    <?php }else if($i == "tingkat_lanjut"){ ?>
        <?=form_open("action/AdvancedUpdateAccount",array("class" => ""));?>
        <?php foreach($user_logged->result() as $ulog){ ?>
        <table class="table table-buttonlist table-invoice-full">
            <thead>
            <th colspan="5">Pengaturan Akun Tingkat Lanjut</th><input type="hidden" value="<?=date("Y-m-d H:i:s")?>" name="now">
            </thead>
            <tbody>
                <tr>
                    <td><label>Akses</label></td>
                    <td>
                        <select name="group">
                            <?php if($ulog->company == "ADMIN"){ ?>
                            <option value="0">--Pilih Level Akses Pengguna--</option>
                            <option value="1" title="Hak Akses Penuh" selected="selected">Admin</option>
                            <option value="2" title="Tidak Memiliki Hak Akses Menambah,Menghapus,atau Mengubah Data">Pengguna Biasa</option>
                            <?php }else if($ulog->company == NULL){ ?>
                            <option value="0">--Pilih Level Akses Pengguna--</option>
                            <option value="1" title="Hak Akses Penuh">Admin</option>
                            <option value="2" title="Tidak Memiliki Hak Akses Menambah,Menghapus,atau Mengubah Data" selected="selected">Pengguna Biasa</option>
                            <?php }else{ ?>
                             <option value="0">--Pilih Level Akses Pengguna--</option>
                            <option value="1" title="Hak Akses Penuh">Admin</option>
                            <option value="2" title="Tidak Memiliki Hak Akses Menambah,Menghapus,atau Mengubah Data">Pengguna Biasa</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Hapus Akun</label></td>
                    <td><a href="<?=site_url("action/DeleteAccount");?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Akun Ini ?')" class="" title="Klik Untuk Menghapus Akun Anda">Hapus</a></td>
                </tr>
                <tr>
                    <td><label>Matikan Akun</label></td>
                    <td><input type="checkbox" value="0" name="off" class="checkbox" title="Klik Untuk Me-nonaktifkan Akun">&nbsp;Ya</td>
                </tr>
                <tr>
                    <td colspan=""></td>
                    <td colspan=""><input type="submit" value="OK" class="btn btn-primary"></td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
        <?=form_close();?>
    <?php }else{ ?>
        <?php redirect("administrator/pengaturan_akun/umum"); ?>
    <?php } ?>
    <?php ?>
</div>  