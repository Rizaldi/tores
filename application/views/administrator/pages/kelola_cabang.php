<?php
$n=$this->uri->segment(3);
$id=$this->uri->segment(4);

    if($n=="tambah")
    {
?>
    <?=form_open("action/AddBrench",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
            <th colspan="5">Tambah Cabang Perusahaan<input type="hidden" value="<?=  date("Y-m-d H:i:s")?>" name="now"/></th>
        </thead>
        <tbody>
            <tr>
                <td><label>Judul</label></td>
                <td><input type="text" class="input-large" name="title" title="Tuliskan Judul atau Nama Cabang"></td>
            </tr>
            <tr>
                <td><label>Alamat</label></td>
                <td><textarea name="address" title="Tuliskan Alamat Cabang" class="input-large"></textarea></td>
            </tr>
            <tr>
                <td><label>Telepon / Faximile</label></td>
                <td><input type="text" class="input-large password" name="telpfax" title="Masukkan Nomor Telepon atau Faximile"></td>
            </tr>
            <tr>
                <td><label>Status</label></td>
                <td>
                    <select title="Apakah Cabang Aktif?" name="status">
                        <option value="active">Aktif</option>
                        <option value="not_active">Tidak Aktif</option>
                    </select>
                </td>
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
    <?php foreach($cab->result() as $ud){ ?>
    <?=form_open("action/UpdateBrench",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
            <th colspan="5">Ubah Cabang<input type="hidden" value="<?=  date("Y-m-d H:i:s")?>" name="now"/></th>
        </thead>
       <tbody>
            <tr>
                <td><label>Judul</label></td>
                <td><input type="text" class="input-large" name="title" value="<?=$ud->title_brench;?>"><input type="hidden" value="<?=$ud->id_brench;?>" name="id"/></td>
            </tr>
            <tr>
                <td><label>Alamat</label></td>
                <td><textarea name="address"><?=$ud->address_brench;?></textarea></td>
            </tr>
            <tr>
                <td><label>Telepon / Faximile</label></td>
                <td><input type="text" class="input-large password" name="telpfax" value="<?=$ud->phonefax_brench?>"></td>
            </tr>
            <tr>
                <td><label>Status</label></td>
                <td>
                    <select name="status" title="Apakah Cabang Aktif?">
                    <?php
                        if($ud->is_active == "active"){
                    ?>
                        <option value="active" selected="selected">Aktif</option>
                        <option value="not_active">Tidak Aktif</option>
                    <?php
                        }
                        else if($ud->is_active == "not_active")
                        {
                    ?>
                        <option value="active">Aktif</option>
                        <option value="not_active" selected="selected">Tidak Aktif</option>
                    <?php 
                        }
                        else
                        {
                   ?>
                        <option value="active">Aktif</option>
                        <option value="not_active">Tidak Aktif</option>
                   <?php
                        }
                    ?>    
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan=""></td>
                <td colspan=""><input type="submit" value="Ubah"></td>
            </tr>
        </tbody>
    </table>
    <?=form_close();?>
    <?php } ?>
<?php
    }
    else
    {
        if($cabang->num_rows() < 1)
        {
            echo '<div style="text-align:center;">Data Cabang Kosong, Silahkan <a href="'.site_url("administrator/kelola_cabang/tambah").'" class="">Tambah Data</a><div>';
        }
        else
        {
        
?>
    <?=form_open("action/DeleteBrench");?>
    <table class="table tab-content table-hover table-bordered table-striped">
    <thead style="" class="">
    <th colspan="2"></th>
        <th>Judul</th>
        <th>Alamat</th>
        <th>Telp/Fax</th>
        <th>Status</th>
    <th colspan="2">Opsi</th>
    </thead>
    <tbody>
        <?php $no=0; foreach($cabang->result() as $u){ $no++; ?>
        <tr>
            <td width="10px;"><input type="checkbox" value="<?=$u->id_brench;?>" name="id_brench[]"></td>
            <td width="20"><?=$no;?></td>
            <td><?=$u->title_brench;?></td>
            <td><?=$u->address_brench;?></td>
            <td><?=$u->phonefax_brench;?></td>
            <td>
                <?php
                    if($u->is_active == "active")
                    {
                        echo "Aktif";
                    }
                    else
                    {
                        echo "Tidak Aktif";
                    }
                ?>
            </td>
            <td width="30"><a href="<?=site_url("administrator/kelola_cabang/ubah/".$u->id_brench);?>" class="btn btn-success btn-small" title="Ubah"><i class="icon-pencil"></i></a></td>
            <td width="30"><a href="<?=site_url("action/DeleteBrench/".$u->id_brench);?>" class="btn btn-danger btn-small" title="Hapus"><i class="icon-trash"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
    <tr>
        <td colspan="8" style="">
            <a href="<?=site_url("administrator/kelola_cabang/tambah");?>" class="btn btn-primary">Tambah</a>&nbsp;&nbsp;<input type="submit" value="Hapus" class="btn btn-danger">             
        </td>
    </tr>
    </table>
<?php
    }}
?>
