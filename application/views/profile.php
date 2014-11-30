<style type="text/css">
	.cont-content {
		margin-top: 70px;
		font-family: "Segoe UI", Muli;
		width: 93%;
		margin-left: auto;
		margin-right: auto;
	}
	.cont-form {
		
	}
	.cont-us {
		border-top: solid 1px #ccc;
		width: 100%;
		padding-top: 20px;
	}
	ul li, ul, li {
		list-style: none;
	}
	.car-content {
		width: 90%;
		margin-right: auto;
		margin-left: auto;
		font-family: Muli;
	}
	.cont-cat {
		width: 70%;
		float: left;
		box-shadow: 1px 3px 10px #ccc;
		background: #fff;
		padding: 10px;
		margin-bottom: 10px;
	}
	.jud-cat {
		font-size: 20px;
		font-weight: bold;
		margin-bottom: 10px;
	}
	.thum-cat {
		width: 25%;
		padding: 2px;
		padding-right: 8px;
		float: left;
	}
	.kut-cat {

	}
	.right-cat {
		width: 24%;
		float: right;
		padding-top: 10px;
		margin-left: auto;
		margin-right: 0px;
		border: solid 1px #ccc;
		box-shadow: 1px 3px 10px #ccc;
		background: #fff;
	}

	@media screen and (max-width: 1000px) {
		.cont-cat {
			width: 98%;
		}
		.right-cat {
			margin-left: 0px;
			margin-bottom: 10px;
			width: 100%;
		}
	}
	@media screen and (max-width: 1199px) {
		.right-cat {
			margin-bottom: 10px;
		}
		.cont-cat {
			width: 98%;
		}
	}
	.con-con {

	}
</style>


<br>
<br>
<?php $data = humanize($this->uri->segment(4)) ?>
<div style="font-family: Muli; float:left; font-size: 30px; width:90%; margin-top:30px; margin-left: 3%; margin-right: auto;margin-bottom: 10px; "><?php echo $this->uri->segment(1); ?></div>

<br>
<br><br>


<div class="car-content">

<div class="right-cat">
	<ul>
		<li style='padding:4px 0px;'>asssd</li>	
	</ul>
</div>
	<div class="cont-cat">
	<?php if ($this->uri->segment(2)=="category") {
		echo "category";
	}
	elseif($this->uri->segment(2)=="team")
	{
		echo "team";
	}
	else
	{
	?>
	Profile
	<!-- <div class="jud-cat">
		<a href="#">Judul</a>
	</div>
	<div class="thum-cat">
		<img src="">image
	</div>
	<div class="kut-cat">Deskripsi</div>
	<div style="line-height:30px;padding-top:1%;"><a href="#">Baca Selengkapnya</a></div>

	<div style="float:right;margin-top:7%;">Diupload oleh </div> -->
	<?php } ?>
</div>

</div>