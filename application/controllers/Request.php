<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_login')!=1){
			redirect('login');
        }
        $this->load->model('request_model');
    }

	public function add()
	{
        $user_to = $this->input->post('pemaraf');
        $message = $this->input->post('message');
        $id_surat = $this->input->post('id_surat');
        $data = $this->request_model->add($user_to,$message,$id_surat);
        echo json_encode($data);
    }
    
    public function edit()
    {
        $id_request = $this->input->post('id_request');
        $specimen = $this->input->post('specimen');
        $data = $this->request_model->edit($id_request,$specimen);
        echo json_encode($data);
    }

    public function send()
    {
        $this->session->set_flashdata('cond','1');
        $this->session->set_flashdata('se_check','Request Has been sent !');
        redirect('Surat_rekomendasi_SE');
    }
}
