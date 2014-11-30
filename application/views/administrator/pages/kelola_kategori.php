<?php
$n=$this->uri->segment(3);
$id=$this->uri->segment(4);

    if($n=="tambah")
    {
?>
    <?=form_open("action/AddCategory",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
            <th colspan="5">Tambah Jenis Kategori Barang<input type="hidden" value="<?=  date("Y-m-d H:i:s")?>" name="now"/></th>
        </thead>
        <tbody>
            <tr>
                <td><label>Nama Kategori</label></td>
                <td><input type="text" class="input-large" name="category" title="Tuliskan Jenis Kategori Baru"></td>
            </tr>
            <tr>
                <td><label>Link Kategori</label></td>
                <td><textarea name="link" title="Tuliskan URL Kategori" class="input-large"></textarea>*huruf kecil semua dan tanpa spasi contoh: A b c d jadi a_b_c_d</td>
            </tr>
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
    <?php foreach($kat->result() as $ud){ ?>
    <?=form_open("action/UpdateCategory",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
            <th colspan="5">Ubah Jenis / Kategori Barang<input type="hidden" value="<?=  date("Y-m-d H:i:s")?>" name="now"/></th>
        </thead>
       <tbody>
            <tr>
                <td><label>Kategori</label></td>
                <td><input type="text" class="input-large" name="category" value="<?=$ud->category;?>"><input type="hidden" value="<?=$ud->id_category;?>" name="id"/></td>
            </tr>
            <tr>
                <td><label>Link</label></td>
                <td><textarea name="link"><?=$ud->link_category;?></textarea></td>
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
        if($kategori->num_rows() < 1)
        {
            echo '<div style="text-align:center;">Data Kategori Kosong, Silahkan <a href="'.site_url("administrator/kelola_cabang/tambah").'" class="">Tambah Data</a><div>';
        }
        else
        {
        
?>
    <?=form_open("action/DeleteCategory");?>
    <table class="table tab-content table-hover table-bordered table-striped">
    <thead style="" class="">
    <th colspan="2"></th>
        <th>Nama Kategori</th>
        <th>Link</th>
        <th>Status</th>
    <th colspan="2">Opsi</th>
    </thead>
    <tbody>
        <?php $no=0; foreach($kategori->result() as $u){ $no++; ?>
        <tr>
            <td width="10px;"><input type="checkbox" value="<?=$u->id_category;?>" name="id_category[]"></td>
            <td width="20"><?=$no;?></td>
            <td><?=$u->category;?></td>
            <td><?=$u->link_category;?></td>
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
            <td width="30"><a href="<?=site_url("administrator/kelola_kategori/ubah/".$u->id_category);?>" class="btn btn-success btn-small" title="Ubah"><i class="icon-pencil"></i></a></td>
            <td width="30"><a href="<?=site_url("action/DeleteCategory/".$u->id_category);?>" class="btn btn-danger btn-small" title="Hapus"><i class="icon-trash"></i></a></td>
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
