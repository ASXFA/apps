<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TTE_model extends CI_Model {
    
    public function getAll()
    {
        $this->db->where('tte_user_id',$this->session->userdata('user_id'));
        $data = $this->db->get('tte');
        return $data;
    }

    public function addTte($filename)
    {
        $data = array(
            'tte_user_id' => $this->session->userdata('user_id'),
            'tte_filename' => $filename
        );

        $query = $this->db->insert('tte',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function countTte()
    {
        $this->db->where('tte_user_id',$this->session->userdata('user_id'));
        $data = $this->db->get('tte');
        return $data;
    }

    public function delete($id){
        $this->db->where('tte_id',$id);
        $query = $this->db->delete('tte');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}