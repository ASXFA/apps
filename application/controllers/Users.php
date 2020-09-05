<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')!=1){
			redirect('login');
		}

		$this->load->model('users_model');
		$this->load->library('form_validation');
		$this->load->library('encrypt');
    }
    
	public function index()
	{
		$data['title'] = 'Admin Panel - users';
		$data['users'] = $this->users_model->getAll()->result();
        $this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/users/v_users',$data);
		$this->load->view('backend/include/footer');
	}

	public function add()
	{
		$data['title'] = 'Admin Panel - users';
        $this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/users/v_users_add');
		$this->load->view('backend/include/footer');
	}

	public function action_add()
	{
		$this->form_validation->set_rules('user_nama','Nama','required');
		$this->form_validation->set_rules('user_nik','NIK','required|max_length[16]');
		$this->form_validation->set_rules('user_nip','NIP','required|max_length[18]');
		$this->form_validation->set_rules('user_email','Email','required|valid_email');
		$this->form_validation->set_rules('user_pangkat','Pangkat / Golongan','required');
		$this->form_validation->set_rules('user_unit_organisasi','Unit Organisasi','required');
		$this->form_validation->set_rules('user_unit_kerja','Unit Kerja','required');
		$this->form_validation->set_rules('user_organisasi','Organisasi','required');
		$this->form_validation->set_rules('user_kota','Kota','required');
		$this->form_validation->set_rules('user_provinsi','Provinsi','required');
		$this->form_validation->set_rules('user_telepon','Telepon','required');
		$this->form_validation->set_rules('user_role','Role','required');

		if ($this->form_validation->run() != false) {
			$cek_nik = $this->users_model->check_nip();
			if($cek_nik == TRUE){
				$this->session->set_flashdata('cond','0');
				$this->session->set_flashdata('users_check','NIK already registered !');
				redirect('users/add');
			}else{
				$cek_nip = $this->users_model->check_nip();
				if($cek_nip == TRUE){
					$this->session->set_flashdata('cond','0');
					$this->session->set_flashdata('users_check','NIP already registered !');
					redirect('users/add');
				}else{
					//uploadnya belum
					$data = $this->users_model->add();
					if($data == TRUE){
						$this->session->set_flashdata('cond','1');
						$this->session->set_flashdata('users_check','Successfuly Added new User !');
						redirect('users');
					}else{
						$this->session->set_flashdata('cond','0');
						$this->session->set_flashdata('users_check','Failed Added new User !');
						redirect('users');
					}
				}
			}
		}else{
			$data['title'] = 'Admin Panel - users';
			$this->load->view('backend/include/head',$data);
			$this->load->view('backend/include/header_mobile');
			$this->load->view('backend/include/sider');
			$this->load->view('backend/users/v_users_add');
			$this->load->view('backend/include/footer');
		}
	}

	public function edit($id)
	{
		//ubah dlu ke semula
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		//lakukan decrypt
		$decrypt_id = $this->encrypt->decode($id_convert);
		$data['user'] = $this->users_model->getById($decrypt_id)->row();
		$data['title'] = 'Admin Panel - users';
		$this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/users/v_users_edit',$data);
		$this->load->view('backend/include/footer');
	}

	public function action_edit($id)
	{
		//ubah dlu ke semula
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		//lakukan decrypt
		$decrypt_id = $this->encrypt->decode($id_convert);

		$this->form_validation->set_rules('user_nama','Nama','required');
		$this->form_validation->set_rules('user_nik','NIK','required|max_length[16]');
		$this->form_validation->set_rules('user_nip','NIP','required|max_length[18]');
		$this->form_validation->set_rules('user_email','Email','required|valid_email');
		$this->form_validation->set_rules('user_pangkat','Pangkat / Golongan','required');
		$this->form_validation->set_rules('user_unit_organisasi','Unit Organisasi','required');
		$this->form_validation->set_rules('user_unit_kerja','Unit Kerja','required');
		$this->form_validation->set_rules('user_organisasi','Organisasi','required');
		$this->form_validation->set_rules('user_kota','Kota','required');
		$this->form_validation->set_rules('user_provinsi','Provinsi','required');
		$this->form_validation->set_rules('user_telepon','Telepon','required');
		$this->form_validation->set_rules('user_role','Role','required');

		if ($this->form_validation->run() != false) {
			$data = $this->users_model->edit($decrypt_id);
			if($data == TRUE){
				$this->session->set_flashdata('cond','1');
				$this->session->set_flashdata('users_check','Successfuly Edit data User !');
				redirect('users');
			}else{
				$this->session->set_flashdata('cond','0');
				$this->session->set_flashdata('users_check','Failed Edit data User !');
				redirect('users');
			}
		}else{
			$data['user'] = $this->users_model->getById($decrypt_id)->row();
			$data['title'] = 'Admin Panel - users';
			$this->load->view('backend/include/head',$data);
			$this->load->view('backend/include/header_mobile');
			$this->load->view('backend/include/sider');
			$this->load->view('backend/users/v_users_edit',$data);
			$this->load->view('backend/include/footer');
		}
	}

	public function softDelete($id)
	{
		//ubah dlu ke semula
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		//lakukan decrypt
		$decrypt_id = $this->encrypt->decode($id_convert);
		//lakukan softDelete
		$data = $this->users_model->softDelete($decrypt_id);
		if($data == TRUE){
			redirect('users');
		}else{
			redirect('users');
		}
	}

	public function listSoftDeleted()
	{
		$data['datas'] = $this->users_model->getByDeleted()->result();
		$data['title'] = 'Admin Panel - users';
        $this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider',$data);
		$this->load->view('backend/users/v_listSoftDeleted',$data);
		$this->load->view('backend/include/footer');
	}

	public function deletePermanent($id)
	{
		//ubah dlu ke semula
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		//lakukan decrypt
		$decrypt_id = $this->encrypt->decode($id_convert);
		//lakukan softDelete
		$data = $this->users_model->deletePermanent($decrypt_id);
		if($data == TRUE){
			redirect('users/listSoftDeleted');
		}else{
			redirect('users/listSoftDeleted');
		}
	}

	public function restoreData($id)
	{
		//ubah dlu ke semula
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		//lakukan decrypt
		$decrypt_id = $this->encrypt->decode($id_convert);
		//lakukan softDelete
		$data = $this->users_model->restoreData($decrypt_id);
		if($data == TRUE){
			redirect('users/listSoftDeleted');
		}else{
			redirect('users/listSoftDeleted');
		}
	}

	public function search()
	{
		if (isset($_GET['term'])) {
			$result = $this->users_model->search($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = array(
						'user_id' => $row->user_id,
						'user_nama' => $row->user_nama
					);
					echo json_encode($arr_result);
			}
		}
	}

	// Profil akun login
	public function profil()
	{
		$data['title'] = 'profil';
        $this->load->view('backend/include/head',$data);
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider');
		$this->load->view('backend/users/v_profil');
		$this->load->view('backend/include/footer');
	}
}
