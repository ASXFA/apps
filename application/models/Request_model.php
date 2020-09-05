<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model {
    
    public function add($user_to,$message,$id_surat)
    {
        $data = array(
            'req_user_id' => $this->session->userdata('user_id'),
            'req_id_surat' => $id_surat,
            'req_user_to' => $user_to,
            'req_message' => $message
        );
        $this->db->insert('request',$data);
        $this->db->order_by('request_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('request');
        return $query;
    }

    public function edit($id_request, $specimen)
    {
        $data = array(
            'req_specimen' => $specimen
        );
        $this->db->where('request_id',$id_request);
        $query = $this->db->update('request',$data);
        return $query;
    }
}