<?php
$n=$this->uri->segment(3);
$id=$this->uri->segment(4);

    if($n=="tambah")
    {
?>
    <?=form_open("action/AddUsers",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
        <th colspan="5">Tambah Pengguna</th>
        </thead>
        <tbody>
            <tr>
                <td><label>Full Name</label></td>
                <td><input type="text" class="input-large" name="fname" placeholder="First Name">&nbsp; <input type="text" class="input-large" name="lname" placeholder="Last Name"></td>
            </tr>
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" class="input-large" name="username"></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input type="password" class="input-large password" name="password"></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><input type="text" class="input-large" name="email"></td>
            </tr>
            <tr>
                <td><label>Akses</label></td>
                <td>
                    <select name="group">
                        <option value="0">--Pilih Level Akses Pengguna--</option>
                        <option value="1" title="Hak Akses Penuh">Admin</option>
                        <option value="2" title="Tidak Memiliki Hak Akses Menambah,Menghapus,atau Mengubah Data">Pengguna Biasa</option>
                    </select>
                </td>
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td colspan=""></td>
                <td colspan=""><input type="submit" value="Tambah"></td>
            </tr>
        </tbody>
    </table>
    <?=form_close();?>
<?php
    }
    else if($n=="ubah" && $id)
    {
?>
    <?php foreach($user_detail->result() as $ud){ ?>
    <?=form_open("action/UpdateUser",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
            <th colspan="5">Ubah Akun Pengguna</th>
        </thead>
        <tbody>
            <tr>
                <td><label>Full Name</label><input type="hidden" value="<?=$ud->id;?>" name="id"><input type="hidden" value="<?=$ud->username;?>" name="uname"></td>
                <td><input type="text" class="input-large" name="fname" placeholder="First Name" value="<?=$ud->first_name?>">&nbsp; <input type="text" class="input-large" name="lname" placeholder="Last Name" value="<?=$ud->last_name?>"></td>
            </tr>
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" class="input-large" name="username" value="<?=$ud->username?>" disabled="disabled" title="Username Tidak Dapat Diubah"></td>
            </tr>
<!--            <tr>
                <td><label>Password</label></td>
                <td><input type="password" class="input-large password" name="password" title="Isi Jika Ingin Mengubah Password dan Kosongkan Jika Tidak Ingin Diubah"></td>
            </tr>-->
            <tr>
                <td><label>Email</label></td>
                <td><input type="text" class="input-large" name="email" value="<?=$ud->email;?>"></td>
            </tr>
            <tr>
                <td><label>Akses</label></td>
                <td>
                    <select name="group">
                        <?php if($ud->company == "ADMIN"){ ?>
                        <option value="0">--Pilih Level Akses Pengguna--</option>
                        <option value="1" title="Hak Akses Penuh" selected>Admin</option>
                        <option value="2" title="Tidak Memiliki Hak Akses Menambah,Menghapus,atau Mengubah Data">Pengguna Biasa</option>
                        <?php }else if($ud->company == NULL){ ?>
                        <option value="0">--Pilih Level Akses Pengguna--</option>
                        <option value="1" title="Hak Akses Penuh">Admin</option>
                        <option value="2" title="Tidak Memiliki Hak Akses Menambah,Menghapus,atau Mengubah Data" selected>Pengguna Biasa</option>                        
                        <?php }else{ ?>
                        <option value="0">--Pilih Level Akses Pengguna--</option>
                        <option value="1" title="Hak Akses Penuh">Admin</option>
                        <option value="2" title="Tidak Memiliki Hak Akses Menambah,Menghapus,atau Mengubah Data">Pengguna Biasa</option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td colspan=""></td>
                <td colspan=""><input type="submit" value="Ubah" class="btn"></td>
            </tr>
        </tbody>
    </table>
    <?=form_close();?>
    <?php } ?>
<?php
    }
    else
    {
        if($users->num_rows() < 1)
        {
            echo '<div style="text-align:center;">Data Pengguna Kosong, Silahkan <a href="'.site_url("administrator/pengaturan_pengguna/tambah").'" class="">Tambah Data</a><div>';
        }
        else
        {
?>
    <?=form_open("action/DeleteUser");?>
    <table class="table tab-content table-hover table-bordered table-striped">
    <thead style="" class="">
    <th colspan="2"></th>
        <th>Username</th>
        <th>Email</th>
        <th>Level</th>
        <th>Status</th>
    <th colspan="2">Opsi</th>
    </thead>
    <tbody>
        <?php $no=0; foreach($users->result() as $u){ $no++; ?>
        <tr>
            <td width="10px;"><input type="checkbox" value="<?=$u->id;?>" name="id[]"></td>
            <td width="20"><?=$no;?></td>
            <td><?=$u->username;?></td>
            <td><?=$u->email;?></td>
            <td><?=$u->company;?></td>
            <td>
                <?php
                    if($u->active == 1)
                    {
                        echo "Active";
                    }
                    else
                    {
                        echo "Not Active";
                    }
                ?>
            </td>
            <?php if($u->username == $this->session->userdata("username")){ ?>
            <td width="60" colspan="2"><a href="<?=site_url("administrator/pengaturan_akun");?>" class="link btn btn-small">PENGATURAN</a></td>
            <?php }else{ ?>
            <td width="30"><a href="<?=site_url("administrator/pengaturan_pengguna/ubah/".$u->id);?>" class="btn btn-success btn-small" title="Ubah"><i class="icon-pencil"></i></a></td>
            <td width="30"><a href="<?=site_url("action/DeleteUser/".$u->id);?>" class="btn btn-danger btn-small" title="Hapus"><i class="icon-trash"></i></a></td>
            <?php } ?>     
            </tr>
        <?php } ?>
    </tbody>
    <tr>
        <td colspan="8" style="">
            <a href="<?=site_url("administrator/pengaturan_pengguna/tambah");?>" class="btn btn-primary">Tambah</a>&nbsp;&nbsp;<input type="submit" value="Hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Yang Dicentang ?')">             
        </td>
    </tr>
    </table>
<?=form_close();?>
<?php
    }}
?>
