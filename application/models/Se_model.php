<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Se_model extends CI_Model {
    
    public function getByUserId()
    {
        $this->db->where('se_user_id',$this->session->userdata('user_id'));
        $data = $this->db->get('se');
        return $data;
    }

    public function getById($id)
    {
        $this->db->where('se_id',$id);
        $data = $this->db->get('se');
        return $data;
    }

    public function addSe($filename,$tipe,$listUser)
    {
        $data = array(
            'se_user_id' => $this->session->userdata('user_id'),
            'se_tipe' => $tipe,
            'se_user_for' => $listUser,
            'se_filename' => $filename
        );

        $query = $this->db->insert('se',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id){
        $this->db->where('se_id',$id);
        $query = $this->db->delete('se');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
}