<?php 
/**
* 
*/
class Err_404 extends CI_Controller
{	
	var $title = "CV Tores";
	var $filename = "";
	var $small = "Kitchen Set , Furniture & Interior";
	var $config = "tor_config";
	var $menu = "tor_menu";
	var $cate = "tor_category";
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['title'] = $this->title;
		$data['filename'] = $this->filename;
		$data['stitle'] = $this->small;
		$data['menu'] = $this->model->mmenu($this->menu);
		$data['category'] = $this->model->mcategory($this->cate);
		$data['error'] = "Halaman Error";
		$this->load->view("index",$data);
	}
}