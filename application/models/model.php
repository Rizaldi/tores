<?php 
/**
* 
*/
class Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function gettitle($config)
	{
		$CI =& get_instance();

		$arrayName = array('is_active' =>'active');
		$CI->db->select("*");
		$CI->db->from($config);
		return $CI->db->get();
	}
	public function mmenu($menu)
	{
		$CI =& get_instance();

		$CI->db->select("*");
		$CI->db->from($menu);
		return $CI->db->get();
	}
	public function mcategory($cat)
	{
		$CI =& get_instance();
		$CI->db->select("*");
		$CI->db->from($cat);
		return $CI->db->get();
	}
}