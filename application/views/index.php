<!DOCTYPE html>
<html lang="en">
<head>
<link rel='stylesheet' id='mytheme-Muli-css'  href=<?php echo base_url('assets/css/fonts/muli.css') ?> type='text/css' media='all' />

<link rel='stylesheet' id='style-css'  href=<?php echo base_url('assets/js/wp-content/themes/timpressive/style7e2e.css') ?> type='text/css' media='all' />
<link rel='stylesheet' id='style1-css'  href=<?php echo base_url('assets/js/wp-content/themes/timpressive/css/style7e2e.css') ?> type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href=<?php echo base_url('assets/js/wp-content/themes/timpressive/css/bootstrap7e2e.css') ?> type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-responsive-css'  href=<?php echo base_url('assets/js/wp-content/themes/timpressive/css/bootstrap-responsive7e2e.css') ?> type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href=<?php echo base_url('assets/js/wp-content/themes/timpressive/css/font-awesome7e2e.css') ?> type='text/css' media='all' />
<script type='text/javascript' src=<?php echo base_url('assets/js/wp-includes/js/jquery/jquery3e5a.js?ver=1.10.2') ?>></script>
<script type="text/javascript">
        $(document).ready(function(){ //awal jquery
        $(document).on("click","#profile",function(e){
            // e.preventDefault();
            // $("#sukses").hide();
            $.ajax({
                url : "<?php echo site_url('main/page/profile') ?>",
                type : "GET",
                dataType : "html",
                beforeSend : function(){
                    $(".isi").html("wait load page ...");
                },
                success:function(data){
                    $(".isi").html(data);
                },
                error:function(){
                    $(".isi").html("<h1>Tidak bisa meload page</h1>")
                } 
            });
        });
</script>
<style type="text/css">.recentcomments a{display:inline;padding:0;margin:0;}</style>
<link rel="stylesheet" href=<?php echo base_url('assets/css/bootstrap.css') ?>>
<link rel="stylesheet" href=<?php echo base_url('assets/css/fonts/font-awesome/css/font-awesome.css') ?>>
<link rel="stylesheet" href=<?php echo base_url('assets/css/theme.css') ?>>
<link rel="stylesheet" href=<?php echo base_url('assets/css/theme-responsive.css') ?> />

	<meta charset="utf-8">
	<title><?php echo $title; ?></title>

</head>
<body class="home page page-id-12 page-template page-template-home_imp-php">
<?php $this->load->view("vmenu") ?>
<?php
$uri = $this->uri->segment(1);
if ($uri=="about") {
	$this->load->view("profile");
}
elseif ($uri=="ordering") {
	echo "ordering";
}
else{ 
?>
<?php $this->load->view('slide') ?>
<div style="font-family: Segoe;" class="container-fluid UnderSlide">
	<div style="font-family: Segoe;" class="container">
		<div class="span12"><div class="title">Koleksi Barang yang Pernah dibuat Tores</div></div>
   	 	</div>
    </div>
<!-- <?php $this->load->view("content") ?> -->
<?php } ?>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.3.2.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/initApp.js') ?>"></script>
    
</body>
</html>