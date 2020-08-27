<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_rekomendasi_SE extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')!=1){
			redirect('login');
		}
    }
    
	public function index()
	{
		$data['title'] = 'dokumen';
		$this->load->view('backend/include/head');
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider',$data);
		$this->load->view('backend/v_surat_rekomendasi_SE');
		$this->load->view('backend/include/footer');
	}
}
