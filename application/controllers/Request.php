<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('is_login')!=1){
			redirect('login');
        }
        $this->load->model('request_model');
        $this->load->library('encrypt'); 
    }

    public function index()
    {
		$this->load->model('users_model');
        $data['title'] = 'Admin Panel - surat rekomendasi';
        $data['reqNotification'] = $this->request_model->getByUserStatusNol();
        $data['req'] = $this->request_model->getAllByUser()->result();
		$data['users'] = $this->users_model->getAll()->result();
		// $data['se'] = $this->se_model->getByUserId()->result();
		// $data['usersModal'] = $this->users_model->getAll()->result();
		$this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/v_request',$data);
		$this->load->view('backend/include/footer');
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

    public function send($id,$status)
    {
        $this->load->model('se_model');
        $data = $this->se_model->editStatusSE($id,$status);
        $this->session->set_flashdata('cond','1');
        $this->session->set_flashdata('SE_check','Request Has been sent !');
        redirect('Surat_rekomendasi_SE');
    }

    public function sign($id,$id_surat)
	{
		$this->load->model('se_model');
		$this->load->model('users_model');
        $data['title'] = 'Admin Panel - Penandatanganan';
        $id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
        $id_convert_surat = str_replace(array('-','_','~'),array('=','+','/'),$id_surat.'');
        $idDecrypt = $this->encrypt->decode($id_convert);
        $idDecryptSurat = $this->encrypt->decode($id_convert_surat);
        $data['req'] = $this->request_model->getById($idDecrypt)->row();
        $data['activity'] = $this->request_model->getBySurat($idDecryptSurat)->result();
        $data['se'] = $this->se_model->getById($idDecryptSurat)->row();
        $data['reqNotification'] = $this->request_model->getByUserStatusNol();

		// //lakukan decrypt
		// $decrypt_id = $this->encrypt->decode($id_convert);
		// // $data['users'] = $this->users_model->getAll()->result();
		// $data['se'] = $this->se_model->getById($decrypt_id)->row();
		// $data['req'] = $this->request_model->getAllByReqUserStatusNol($decrypt_id);
		// $data['users'] = $this->users_model->getAll()->result();
		$this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/v_tandatangan',$data);
		$this->load->view('backend/include/footer',$data);
    }
    
    public function checking_password()
    {
        $password = $this->input->post('password');
        $this->load->model('users_model');
        $check = $this->users_model->getById($this->session->userdata('user_id'))->row();
        if (password_verify($password,$check->user_password)) {
            $data = 1;
            echo $data;
        }else{
            $data = 0;
            echo $data;
        }   
    }

    public function editStatus()
    {
        $this->load->model('se_model');
        $id_request = $this->input->post('id_request');
        $id_surat = $this->input->post('id_surat');

        $this->request_model->editStatus($id_request);
        $this->se_model->editStatusSE($id_surat,2);

        $data = array('status','Success');
        echo json_encode($data);

    }
}
