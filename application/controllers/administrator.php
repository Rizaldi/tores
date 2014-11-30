<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administrator
 *
 * @author Kiravlab
 */
class Administrator extends CI_Controller{
    
    public function index() 
    {
        $this->main();
    }
    public function auth($tor)
    {
        $tor['leftpanel']=$this->load->view('administrator/elements/leftpanel','',TRUE);
        $tor['rightpanel']=$this->load->view('administrator/elements/rightpanel',$tor,TRUE);
        $tor['content']=  $this->load->view('administrator/elements/content',$tor,TRUE);
        

        //User Session Validation
        if (!$this->ion_auth->logged_in())
        {
            $this->load->view("administrator/login");
            //$this->load->view("administrator/main", $tor);
        }
        else 
        {
            $this->load->view("administrator/main", $tor);

            //Using Codeigniter Parser
            //$this->parser->parse("administrator/main", $tor);
        }
    }
    public function admin_auth() {
        if(!$this->ion_auth->is_admin())
        {
            echo "Anda Tidak Memiliki Akses Ini";
        }
    }
    public function main() 
    {
        $tor['title']="CV TORRES : Administrator";
        
        
        $this->auth($tor);
    }
    public function login()
    {
        $log['uname_admin'] =$this->input->post("uname");
        $log['passwd_admin'] =  $this->input->post("upass");
        $log['remember']=TRUE;
        
        if($this->input->post("now") && !$this->ion_auth->logged_in())
        {
            $ion =  $this->ion_auth->login($log['uname_admin'],$log['passwd_admin'],$log['remember']);
            if($ion)
            {
                $this->session->set_flashdata('message',  $this->ion_auth->messages());
                redirect("administrator");
            }
            else
            {
                echo "Gagal Login";
                //b270e01b6802353eea480a5a0fe5bfc22300e50f
                //echo "Kampret";
                //redirect("administrator");
            }
        }
        else
        {
            //echo "Kampret";
            redirect("administrator");
        }
        
    }
    
    //--------------------------------Pages
    public function kelola_barang()
    {
        $id=NULL;
        
        $tor['title']="Administrator : Kelola Barang";
        $tor['category']=  $this->tor_admin_model->GetCategory();
        $tor['sub_category']=  $this->tor_admin_model->GetSubCat($id);
        $tor['contents']=$this->tor_admin_model->GetContent($id);
        $tor['content']=  $this->tor_admin_model->GetContent($this->uri->segment(4));
        
        $this->auth($tor);
    }
    public function kelola_cabang() 
    {
       $tor['title']="Administrator : Kelola Cabang";
       $tor['cabang']=$this->tor_admin_model->GetBrench();
       $tor['cab']=  $this->tor_admin_model->GetWhereBrench($this->uri->segment(4));
     
       $this->auth($tor); 
    }
    public function kelola_kategori() 
    {
        $tor['title']="Administrator : Kelola Kategori";
        $tor['kategori']=$this->tor_admin_model->GetAllCategory();
        $tor['kat']=$this->tor_admin_model->GetWhereCategory($this->uri->segment(4));
     
        $this->auth($tor);
    }
    public function kelola_subkat()
    {
        $tor['title'] =  "Administrator : Kelola Sub Kategori";
        $tor['kategori'] = $this->tor_admin_model->GetAllCategory();
        $tor['sub_kategori'] = $this->tor_admin_model->GetAllSubCategory();
        $tor['katsubkat'] = $this->tor_admin_model->GetCategoryAndSubCategory();
        $tor['subkat'] = $this->tor_admin_model->GetWhereSubCategory($this->uri->segment(4));

        $this->auth($tor);
    }
    public function tambah_pengguna() 
    {
        $tor['title']="";
     
        $this->auth($tor);
    }
    public function pengaturan_pengguna() 
    {
        $uri4=  $this->uri->segment(4);
        
        
        $tor['title']="Administrator : Pengaturan Pengguna";
        $tor['users']=  $this->tor_admin_model->GetUsers();
        $tor['user_detail']=  $this->tor_admin_model->GetUserDetail($uri4);
     
        $this->auth($tor);
    }
    public function pengaturan() 
    {
        $stt = $this->uri->segment(3);
        if($stt == "umum")
        {
            $tor['title']="Administrator : Pengaturan Umum";
        }
        else
        {
            $tor['title']="Administrator : Pengaturan Lanjut";
        }
        
     
        $this->auth($tor);
    }
    public function pengaturan_akun() 
    {
        $uName = $this->session->userdata("username");
        
        $tor['title']="Administrator : Pengaturan Akun";
        $tor['user_logged'] = $this->tor_admin_model->GetAccountLogin($uName);
        
     
        $this->auth($tor);
    }
    public function logout()
    {
        $this->ion_auth->logout();
        redirect("administrator");
    }
    //--------------------------------End Pages
    
}