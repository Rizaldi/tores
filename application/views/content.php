<style type="text/css">

div.pagination {
  font-family: "Lucida Sans Unicode", "Lucida Grande", LucidaGrande, "Lucida Sans", Geneva, Verdana, sans-serif;
  padding:2px;
  margin:7px;
}

div.pagination a {
  margin: 2px;
  padding: 0.5em 0.64em 0.43em 0.64em;
  background-color: #e00404;
  text-decoration: none; /* no underline */
  color: #fff;
}
div.pagination a:hover, div.pagination a:active {
  padding: 0.5em 0.64em 0.43em 0.64em;
  margin: 2px;
  background-color: #de1818;
  color: #fff;
}
div.pagination span.current {
    padding: 0.5em 0.64em 0.43em 0.64em;
    margin: 2px;
    background-color: #f6efcc;
    color: #6d643c;
  }
div.pagination span.disabled {
    display:none;
  }
</style>

<div>
<br>
  <input type="text" name="search" id="search" placeholder="Search" style="padding: 13px; border: solid 1px #ccc; border-radius: 0; font-family: Segoe UI; background: #fff;">
                        
</div>
<div style="font-family: Segoe;" class="container-fluid FromBlog">
<div class="container">
<?php
foreach ($getCont as $content => $getContent) {
  $dt = new DateTime($getContent->time_content);
  $q = underscore($getContent->title_content);
  $s = underscore($getContent->image_content);
?>

<div class="span3">
  <div class="BlogArticle">
    <div class="ImgWrap">
    <span class="date">//<?php echo $dt->format("M Y"); ?></span>
    <span class="date"><?php echo $getContent->location_content; ?></span>
    <a href="<?php echo site_url('home/pages/read/'.$q) ?>">
    <img src="<?php echo base_url('assets/img/slide/'.$s) ?>"> 
    </div>
      <div class="WhiteTone">
      <span class="title"><?php echo $getContent->title_content; ?></span></a> 
      <p class="comments">
      <span class="muted">by</span> 
      <a href="#" class="name"><?php echo $getContent->author_content; ?> /</a>
      <span class="muted">with</span>  
      <a href="#" class="comments">
      <span class="count">0</span>
      comment</a><p>
      </div>
    </div>
  </div>	
<?php } ?>
</div>

</div>
</div>