<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('backend/include/head',$data);
		$this->load->view('backend/v_login');
		$this->load->view('backend/include/footer');
	}

	function action_login()
	{
		$this->form_validation->set_rules('l_nip','NIP','required');
		$this->form_validation->set_rules('l_password','Password','required');

		if($this->form_validation->run() != false ){
			//load model users 
			$this->load->model('users_model');
			//pengecekkan users di database
			$check = $this->users_model->check_users();
			if ($check->num_rows() == 0) {
				$this->session->set_flashdata('cond','0');
				$this->session->set_flashdata('login_check','NIP does not exist');
				redirect('login');
			}else{
				$user = $check->row();
				// pengecekkan kevalidan password
				if(password_verify($this->input->post('l_password'),$user->user_password)){
					$session = array(
						'is_login' => 1,
						'user_id' => $user->user_id,
						'user_nik' => $user->user_nik,
						'user_nip' => $user->user_nip,
						'user_nama' => $user->user_nama,
						'user_email' => $user->user_email,
						'user_jabatan' => $user->user_jabatan,
						'user_unit_organisasi' => $user->user_unit_organisasi,
						'role' => $user->user_role
					);
					$this->session->set_userdata($session);
					$this->session->set_flashdata('cond','1');
					$this->session->set_flashdata('login_success',"Welcome back");
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('cond','0');
					$this->session->set_flashdata('login_check','Password not match !');
					redirect('login');
				}
			}
		}else{
			$this->load->view('backend/include/head');
			$this->load->view('backend/v_login');
			$this->load->view('backend/include/footer');
		}
	}

	public function logout()
	{
		$this->session->set_userdata('is_login',0);
		$this->session->sess_destroy();
		redirect('login');
	}
}
