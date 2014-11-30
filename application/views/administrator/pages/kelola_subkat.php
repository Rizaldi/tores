<?php
$n=$this->uri->segment(3);
$id=$this->uri->segment(4);

    if($n=="tambah")
    {
?>
    <?=form_open("action/AddSubCategory",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
            <th colspan="5">Tambah Sub Kategori<input type="hidden" value="<?=  date("Y-m-d H:i:s")?>" name="now"/></th>    
        </thead>
        <tbody>
            <tr>
                <td><label>Nama Sub Kategori</label></td>
                <td><input type="text" class="input-large" name="sub_category_name" title="Tuliskan Jenis Kategori Baru"></td>
            </tr>
            <tr>
                <td><label>Kategori</label></td>
                <td>
                    <select name="category">
                    <?php foreach($kategori->result() as $k){ ?>
                        <option value="<?=$k->id_category;?>"><?=$k->category;?></option>
                    <?php } ?>
                    </select>
                </td>
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
    <?php foreach($subkat->result() as $ud){ ?>
    <?=form_open("action/UpdateSubCategory",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
            <th colspan="5">Ubah Sub Kategori Barang<input type="hidden" value="<?=  date("Y-m-d H:i:s")?>" name="now"/></th>
        </thead>
       <tbody>
            <tr>
                <td><label>Nama Sub Kategori</label></td>
                <td><input type="text" class="input-large" name="sub_category" value="<?=$ud->sub_category;?>"><input type="hidden" value="<?=$ud->id_category;?>" name="id"/></td>
            </tr>
            <tr>
                <td><label>Kategori</label></td>
                <td>
                    <select name="category">
                    <?php foreach($kategori->result() as $k){ ?>
                        <?php
                        if($k->id_category == $ud->id_category){
                        ?>
                            <option value="<?=$k->id_category;?>" selected="selected"><?=$k->category;?></option>
                        <?php }else{ ?>
                            <option value="<?=$k->id_category;?>"><?=$k->category;?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Link</label></td>
                <td><textarea name="link"><?=$ud->link_sub_category;?></textarea></td>
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
        if($sub_kategori->num_rows() < 1)
        {
            echo '<div style="text-align:center;">Data Sub Kategori Kosong, Silahkan <a href="'.site_url("administrator/kelola_subkat/tambah").'" class="">Tambah Data</a><div>';
        }
        else
        {
        
?>
    <?=form_open("action/DeleteSubCategory");?>
    <table class="table tab-content table-hover table-bordered table-striped">
    <thead style="" class="">
    <th colspan="2"></th>
        <th>Sub Kategori</th>
        <th>Kategori</th>
        <th>Link</th>
        <th>Status</th>
    <th colspan="2">Opsi</th>
    </thead>
    <tbody>
        <?php $no=0; foreach($katsubkat->result() as $u){ $no++; ?>
        <tr>
            <td width="10px;"><input type="checkbox" value="<?=$u->id_sub_category;?>" name="id_sub_category[]"></td>
            <td width="20"><?=$no;?></td>
            <td><?=$u->sub_category;?></td>
            <td><?=$u->category;?></td>
            <td><?=$u->link_sub_category;?></td>
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
            <td width="30"><a href="<?=site_url("administrator/kelola_subkat/ubah/".$u->id_sub_category);?>" class="btn btn-success btn-small" title="Ubah"><i class="icon-pencil"></i></a></td>
            <td width="30"><a href="<?=site_url("action/DeleteSubCategory/".$u->id_sub_category);?>" class="btn btn-danger btn-small" title="Hapus"><i class="icon-trash"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
    <tr>
        <td colspan="8" style="">
            <a href="<?=site_url("administrator/kelola_subkat/tambah");?>" class="btn btn-primary">Tambah</a>&nbsp;&nbsp;<input type="submit" value="Hapus" class="btn btn-danger">             
        </td>
    </tr>
    </table>
<?php
    }}
?>
