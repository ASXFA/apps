<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TTE extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		if($this->session->userdata('is_login')!=1){
			redirect('login');
		}
		$this->load->library('encrypt');
		$this->load->model('TTE_model');
		$this->load->model('request_model');
    }
    
	public function index()
	{
		$data['title'] = 'TTE';
		$data['tte'] = $this->TTE_model->getAll()->result();
		$data['tteModal'] = $this->TTE_model->getAll()->result();
		$data['countTte'] = $this->TTE_model->countTte();
		$data['reqNotification'] = $this->request_model->getByUserStatusNol();
		$this->load->view('backend/include/head');
		$this->load->view('backend/include/header_mobile');
		$this->load->view('backend/include/sider',$data);
		$this->load->view('backend/TTE/v_TTE',$data);
		$this->load->view('backend/include/footer');
	}

	public function delete($id)
	{
		$id_convert = str_replace(array('-','_','~'),array('=','+','/'),$id.'');
		$decrypt_id = $this->encrypt->decode($id_convert);
		$data = $this->TTE_model->delete($decrypt_id);
		if($data == TRUE){
			$this->session->set_flashdata('cond','1');
			$this->session->set_flashdata('tte_check','Successfuly Delete TTE !');
			redirect('TTE');
		}else{
			$this->session->set_flashdata('cond','0');
			$this->session->set_flashdata('tte_check','Failed Delete TTE !');
			redirect('TTE');
		}
	}

	public function generateTTE()
	{
		if (!is_dir('assets/backend/images/TTE/'.$this->session->userdata('user_id'))) {
			mkdir('assets/backend/images/TTE/'.$this->session->userdata('user_id'));
		}
		$countTTE = $this->TTE_model->countTte();
		//jika belum ada TTE
		if ($countTTE->num_rows() == 0 ) {
			//make a encrypt filename
			$filename = $this->encrypt->encode('filename');
			$filename_encrypt = str_replace(array('=','+','/'),array('-','_','~'),$filename.'');
			$width = 650;
			$height = 200;
			$src = imagecreatefrompng(base_url().'assets/backend/images/icon/logopemprov.png');
			$image = ImageCreatetruecolor($width, $height);
			$white = ImageColorAllocate($image, 255, 255, 255);//white
			$grey = imagecolorallocate($image, 128, 128, 128);//grey
			$black = imagecolorallocate($image, 0, 0, 0);//black
			ImageFill($image, 0, 0, $white);
			imagecopy($image, $src, 10, 25, 0, 0, 125, 146);
			$text =  'Ditandatangani secara elektronik oleh : ';
			$text1 =  $this->session->userdata('user_unit_organisasi');
			$text2 =  strtoupper($this->session->userdata('user_nama'));
			$text3 =  ucfirst($this->session->userdata('user_jabatan'));
			$font = dirname(__FILE__) .'\arial.ttf';//make sure chosen font is in the directory!!
			imagettftext($image, 13, 0, 165, 45, $black, $font, $text);//text
			imagettftext($image, 14, 0, 165, 65, $black, $font, $text1);//text
			imagettftext($image, 14, 0, 165, 145, $black, $font, $text2);//text
			imagettftext($image, 13, 0, 165, 165, $black, $font, $text3);//text
			$save = "assets/backend/images/TTE/".$this->session->userdata('user_id')."/".$filename_encrypt.".png";//image will be save in this files directory as ".png"
			// header('Content-Type: image/png');
			imagepng($image,$save);
			ImageDestroy($image);//Free memory
			ImageDestroy($src);//Free memory

			//send to database
			$name_file = $filename_encrypt; //penggabungan nama dengan ekstensi .png untuk database
			$send = $this->TTE_model->addTte($name_file);
			if ($send == TRUE) {
				$this->session->set_flashdata('cond','1');
				$this->session->set_flashdata('tte_check','Successfuly Added new TTE !');
				redirect('TTE');
			}else{
				$this->session->set_flashdata('cond','0');
				$this->session->set_flashdata('tte_check','Failed Added new TTE !');
				redirect('TTE');
			}
		}else if($countTTE->num_rows() <= 3){
			//make a encrypt filename
			$filename = $this->encrypt->encode('filename');
			$filename_encrypt = str_replace(array('=','+','/'),array('-','_','~'),$filename.'');
			$width = 650;
			$height = 200;
			$src = imagecreatefrompng(base_url().'assets/backend/images/icon/logopemprov.png');
			$image = ImageCreatetruecolor($width, $height);
			$white = ImageColorAllocate($image, 255, 255, 255);//white
			$grey = imagecolorallocate($image, 128, 128, 128);//grey
			$black = imagecolorallocate($image, 0, 0, 0);//black
			ImageFill($image, 0, 0, $white);
			imagecopy($image, $src, 10, 25, 0, 0, 125, 146);
			$text =  'Ditandatangani secara elektronik oleh : ';
			$text1 =  strtoupper($this->input->post('unit_organisasi'));
			$text2 =  $this->session->userdata('user_nama');
			$text3 =  $this->session->userdata('user_jabatan');
			$font = dirname(__FILE__) .'\arial.ttf';//make sure chosen font is in the directory!!
			imagettftext($image, 13, 0, 165, 45, $black, $font, $text);//text
			imagettftext($image, 14, 0, 165, 65, $black, $font, $text1);//text
			imagettftext($image, 14, 0, 165, 145, $black, $font, $text2);//text
			imagettftext($image, 13, 0, 165, 165, $black, $font, $text3);//text
			$save = "assets/backend/images/TTE/".$this->session->userdata('user_id')."/".$filename_encrypt.".png";//image will be save in this files directory as ".png"
			// header('Content-Type: image/png');
			imagepng($image,$save);
			ImageDestroy($image);//Free memory
			ImageDestroy($src);//Free memory

			//send to database
			
			$send = $this->TTE_model->addTte($filename_encrypt);
			if ($send == TRUE) {
				$this->session->set_flashdata('cond','1');
				$this->session->set_flashdata('tte_check','Successfuly Added new TTE !');
				redirect('TTE');
			}else{
				$this->session->set_flashdata('cond','0');
				$this->session->set_flashdata('tte_check','Failed Added new TTE !');
				redirect('TTE');
			}
		}
	}

	// public function download($filename)
	// {
	// 	$dir = base_url('assets/backend/image/TTE/'.$this->session->userdata('user_id').'/'.$filename.".png");
	// 	header('Content-Description: File Transfer');
	// 	header('Content-Type: image/png');
	// 	header('Content-Disposition: attachment; filename='.basename($dir));
	// 	header('Content-Transfer-Encoding: binary');
	// 	header('Expires: 0');
	// 	header('Cache-Control: private');
	// 	header('Pragma: no-cache');
	// 	header('Content-Length: ' . filesize($dir));
	// 	ob_clean();
	// 	flush();
	// 	readfile($dir);
	// 	$this->session->set_flashdata('cond','1');
	// 	$this->session->set_flashdata('tte_check','Successfuly Downloaded !');
	// 	redirect('TTE');
	// }
}