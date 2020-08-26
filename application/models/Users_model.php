<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function check_users ()
	{
        $this->db->where('username',$this->input->post('l_username'));
        $query = $this->db->get('users');
        return $query;
	}
}
