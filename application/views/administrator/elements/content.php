<?php 
    $ini=$this->uri->segment(2);
    if($ini)
    {
        $this->load->view("administrator/pages/".$ini);
    }
    else
    {
        $this->load->view("administrator/pages/home");
    }
?>