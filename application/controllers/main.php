<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	var $title = "CV Tores";
	var $filename = "";
	var $small = "Kitchen Set , Furniture & Interior";
	var $config = "tor_config";
	var $menu = "tor_menu";
	var $cate = "tor_category";
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model");
	}
	public function index()
	{
		ini_set('display_errors','On');
		error_reporting(E_ALL^E_NOTICE);
		$data['title'] = $this->title;
		$data['filename'] = $this->filename;
		$data['stitle'] = $this->small;
		$data['menu'] = $this->model->mmenu($this->menu);
		$data['category'] = $this->model->mcategory($this->cate);
		// $data['config']	= $this->model->gettitle($this->config);
		$this->load->view("index",$data);
	}
	public function page()
	{
		ini_set('display_errors','On');
		error_reporting(E_ALL^E_NOTICE);
		$data['title'] = $this->title;
		$data['filename'] = $this->filename;
		$data['stitle'] = $this->small;
		$data['menu'] = $this->model->mmenu($this->menu);
		$data['category'] = $this->model->mcategory($this->cate);
		// $data['config']	= $this->model->gettitle($this->config);
		$this->load->view("index",$data);
	}
}
