<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_rekomendasi_SE extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')!=1){
			redirect('login');
		}
		$this->load->library('pdf');
		$this->load->library('encrypt'); 
		$this->load->model('se_model');
    }
    
	public function index()
	{
		$this->load->model('se_model');
		$this->load->model('users_model');
		$data['title'] = 'Admin Panel - surat rekomendasi';
		// $data['users'] = $this->users_model->getAll()->result();
		$data['se'] = $this->se_model->getByUserId()->result();
		$data['usersModal'] = $this->users_model->getAll()->result();
		$this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/suratRekomendasi/v_surat_rekomendasi_SE',$data);
		$this->load->view('backend/include/footer');
	}

	public function add()
	{
		$config['upload_path']          = './assets/backend/images/kop/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 15000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		
		$this->load->library('upload', $config);

		if (! $this->upload->do_upload('kop_surat')) {
            $this->session->set_flashdata('kondisi','0');
			$this->session->set_flashdata('status','Gambar terlalu besar !');
		}else{
			$this->load->model('users_model');
			$data['user'] = $this->users_model->getById($this->session->userdata('user_id'))->row();
			if($this->input->post('tipeSE') == 1){
				$data['user2'] = $this->users_model->getById($this->input->post('userTipe1'))->row();
				$data['image'] = $this->upload->data('file_name');	
				$data['unit_organisasi'] = $this->input->post('unit_organisasi');
				$data['sistem'] = $this->input->post('sistem');
				$data['kegunaan'] = $this->input->post('kegunaan');
				$this->load->view('backend/suratRekomendasi/v_pdf',$data);
				// redirect('Surat_rekomendasi_SE');
			}else{
				$data['users'] = $this->users_model->getAll()->result();
				$data['userTipe2'] = $this->input->post('userTipe2');
				$data['image'] = $this->upload->data('file_name');	
				$data['unit_organisasi'] = $this->input->post('unit_organisasi');
				$data['sistem'] = $this->input->post('sistem');
				$data['kegunaan'] = $this->input->post('kegunaan');
				$this->load->view('backend/suratRekomendasi/v_pdf_2',$data);
			}
		}
		// $html = $this->output->get_output();
		// $this->load->library('pdf');
		// $this->dompdf->loadHtml($html);
		// $this->dompdf->setPaper('A4', 'landscape');
		// $this->dompdf->render();
		// $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function detail($id)
	{
		$this->load->model('se_model');
		$this->load->model('users_model');
		$data['title'] = 'Admin Panel - surat rekomendasi';
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		//lakukan decrypt
		$decrypt_id = $this->encrypt->decode($id_convert);
		// $data['users'] = $this->users_model->getAll()->result();
		$data['se'] = $this->se_model->getById($decrypt_id)->row();
		$data['users'] = $this->users_model->getAll()->result();
		$this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/suratRekomendasi/v_surat_detail',$data);
		$this->load->view('backend/include/footer',$data);
	}

	public function delete($id)
	{
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		$decrypt_id = $this->encrypt->decode($id_convert);
		$data = $this->se_model->delete($decrypt_id);
		if($data == TRUE){
			$this->session->set_flashdata('cond','1');
			$this->session->set_flashdata('se_check','Successfuly Delete SE !');
			redirect('Surat_rekomendasi_SE');
		}else{
			$this->session->set_flashdata('cond','0');
			$this->session->set_flashdata('se_check','Failed Delete SE !');
			redirect('Surat_rekomendasi_SE');
		}
	}

	// public function addedSurat()
	// {
	// 	$data = $this->se_model->insert($this->input->post('filename'));
	// 	echo json_encode($data);
	// }
}
