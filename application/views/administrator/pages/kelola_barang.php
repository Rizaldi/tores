<?php
$n=$this->uri->segment(3);
$l4=$this->uri->segment(4);

    if($n=="tambah")
    {
?>
    <?=  form_open_multipart("action/AddItem");?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
        <th colspan="5">Tambah Barang<input type="hidden" value="<?=date("Y-m-d H:i:s");?>" name="now"></th>
        </thead>
        <tbody>
            <tr>
                <td><label>Judul</label></td>
                <td><input type="text" class="input-large" name="title"></td>
            </tr>
            <tr>
                <td><label>Kategori</label></td>
                <td>
                    <select name="category" id="cat">
                        <option value="0">Pilih Kategori</option>
                        <?php foreach ($category->result() as $cat){ ?>
                        <option value="<?=$cat->id_category;?>"><?=$cat->category;?></option>
                        <?php } ?>
                    </select>
                     </td>
            </tr>
            <tr>
                <td><label>Deskripsi</label></td>
                <td>
                    <script type="text/javascript">
                    $(document).ready(
                            function()
                            {
                                $('#description').redactor();
                            }
                    );
                    </script>
                    <textarea id="description" name="description" style="width: 430px;height: 100px;"></textarea>
                </td>
            </tr>
            <tr>
                <td><label>Foto Barang</label></td>
                <td><input type="file" name="filename"></td>
            </tr>
            <tr>
                <td><label title="Jika Aktif Maka Barang Dipublikasikan ke Website dan Sebaliknya">Status</label></td>
                <td>
                    <select name="status">
                        <option value="">--Pilih Status--</option>
                        <option value="active">Aktif</option>
                        <option value="not_active">Tidak Aktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah" class="btn btn-large btn-primary"></td>
            </tr>
        </tbody>
    </table>
    <?=form_close();?>
<?php
    }
    else if($n=="ubah" && $l4)
    {
?>
    <?=  form_open_multipart("action/UpdateItem",array("class" => ""));?>
    <table class="table table-buttonlist table-invoice-full">
        <thead>
        <th colspan="5">Ubah Barang<input type="hidden" value="<?=date("Y-m-d H:i:s");?>" name="now"></th>
        </thead>
        <tbody>
            <?php foreach($content->result() as $c){ ?>
            <tr>
                <td><label>Judul</label></td>
                <td><input type="text" class="input-large" name="title" value="<?=$c->title_content;?>"><input type="hidden" value="<?=$c->id_content;?>" name="id_content"></td>
            </tr>
            <tr>
                <td><label>Kategori</label></td>
                <td>
                    <select name="category" id="cat">
                        <option value="0">Pilih Kategori</option>
                        <?php foreach ($category->result() as $cat){ ?>
                        <?php if($cat->id_category==$c->id_category){ ?>
                        <option value="<?=$cat->id_category;?>" selected="selected"><?=$cat->category;?></option>
                        <?php }else{ ?>
                         <option value="<?=$cat->id_category;?>"><?=$cat->category;?></option>
                        <?php }} ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Deskripsi</label></td>
                <td>
                    <textarea id="description" name="description" style="width: 430px;height: 100px;"><?=$c->description_content;?></textarea>
                </td>
            </tr>
            <tr>
                <td><label>Foto Barang</label></td>
                <td><input type="file" name="images" style="">*kosongkan jika tidak ingin dirubah</td>
            </tr>
            <tr>
                <td><label title="Jika Aktif Maka Barang Dipublikasikan ke Website dan Sebaliknya">Status</label></td>
                <td>
                    <select name="status">
                        <?php if($c->is_active == "active"){ ?>
                        <option value="">--Pilih Status--</option>
                        <option value="active" selected>Aktif</option>
                        <option value="not_active">Tidak Aktif</option>
                        <?php }else if($c->is_active == "not_active"){?>
                        <option value="">--Pilih Status--</option>
                        <option value="active">Aktif</option>
                        <option value="not_active" selected>Tidak Aktif</option>
                        <?php }else{?>
                        <option value="" selected>--Pilih Status--</option>
                        <option value="active">Aktif</option>
                        <option value="not_active">Tidak Aktif</option>
                        <?php }?>
                     </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Ubah" class="btn btn-large btn-primary"></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?=form_close();?>
<?php
    }
    else
    {
        if($content->num_rows() < 1)
        {
            echo '<div style="text-align:center;">Data Barang Kosong, Silahkan <a href="'.site_url("administrator/kelola_barang/tambah").'" class="">Tambah Data</a><div>';
        }
        else
        {
?>
    <?=  form_open("action/DeleteItem");?>
    <table class="table tab-content table-hover table-bordered table-striped">
    <thead style="" class="">
        <th colspan="2"></th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Penulis</th>
    <th colspan="2">Opsi</th>
    </thead>
    <tbody>
        <?php $no=0; foreach($contents->result() as $u){ $no++; ?>
        <tr>
            <td width="10px;"><input type="checkbox" name="id_content[]" value="<?=$u->id_content;?>" id="checkbox"></td>
            <td width="20"><?=$no;?></td>
            <td><?=$u->title_content;?></td>
            <td><?=$u->description_content;?></td>
            <td><?=$u->category;?></td>
            <td><?=$u->author_content;?></td>
            <td width="30"><a href="<?=site_url("administrator/kelola_barang/ubah/".$u->id_content);?>" class="btn btn-success btn-small" title="Ubah"><i class="icon-pencil"></i></a></td>
            <td width="30"><a href="<?=site_url("action/DeleteItem/".$u->id_content);?>" class="btn btn-danger btn-small" title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');"><i class="icon-trash"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
    <tr>
        <td colspan="8" style="">
            <a href="<?=site_url("administrator/kelola_barang/tambah");?>" class="btn btn-primary">Tambah</a>&nbsp;&nbsp;<input type="submit" value="Hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Semua Data Yang Dipilih ?')">             
        </td>
    </tr>
    </table>
    <?=form_close();?>
<?php
    }
    }
?>
