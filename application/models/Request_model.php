<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_model extends CI_Model {
    
    public function getAllByReqUserStatusNol($id_surat)
    {
        $this->db->where('req_user_id',$this->session->userdata('user_id'));
        $this->db->where('req_surat',$id_surat);
        $this->db->where('req_status',0);
        $query = $this->db->get('request');
        return $query;
    }

    public function getByUserStatusNol()
    {
        $this->db->where('req_user_to',$this->session->userdata('user_id'));
        $this->db->where('req_status',0);
        $query = $this->db->get('request');
        return $query;
    }

    public function getAllByUser()
    {
        $this->db->where('req_user_to',$this->session->userdata('user_id'));
        $this->db->order_by('req_id','DESC');
        $query = $this->db->get('request');
        return $query;
    }

    public function getById($id)
    {
        $this->db->where('req_id',$id);
        $query = $this->db->get('request');
        return $query;
    }

    public function getBySurat($id)
    {
        $this->db->where('req_surat',$id);
        $this->db->order_by('req_id','DESC');
        $query = $this->db->get('request');
        return $query;
    }

    public function add($user_to,$message,$id_surat)
    {
        $data = array(
            'req_user_id' => $this->session->userdata('user_id'),
            'req_surat' => $id_surat,
            'req_user_to' => $user_to,
            'req_message' => $message
        );
        $this->db->insert('request',$data);
        $this->db->order_by('req_id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('request')->result();
        return $query;
    }

    public function edit($id_request, $specimen)
    {
        $data = array(
            'req_specimen' => $specimen
        );
        $this->db->where('req_id',$id_request);
        $query = $this->db->update('request',$data);
        return $query;
    }

    public function editStatus($id_request)
    {
        date_default_timezone_set('asia/bangkok');
        $date = date('Y-m-d H:i:s');
        $data = array('req_status' => 1, 'sign_at'=>$date);
        $this->db->where('req_id',$id_request);
        $query = $this->db->update('request',$data);
        return $query;
    }
}