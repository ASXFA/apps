<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
        
        public function getAll()
        {
                $this->db->where('deleted_at',NULL);
                $this->db->not_like('user_id',$this->session->userdata('user_id'));
                $data = $this->db->get('users');
                return $data;
        }

        public function getById($id)
        {
                $this->db->where('user_id',$id);
                return $this->db->get('users');
        }

        public function getByDeleted()
        {
                $this->db->like('deleted_by',NULL);
                $query = $this->db->get('users');
                return $query;
        }

        public function search($nama)
        {
                $this->db->like('user_nama', $nama , 'both');
                $this->db->order_by('user_nama', 'ASC');
                $this->db->limit(10);
                return $this->db->get('users')->result();
        }

        public function check_users ()
	{
                $this->db->where('user_nip',$this->input->post('l_nip'));
                $query = $this->db->get('users');
                return $query;
        }

        public function check_nik()
        {
                $this->db->where('user_nik', $this->input->post('user_nik'));
                $query = $this->db->get('users');
                if ($query->num_rows() > 0) {
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function check_nip()
        {
                $this->db->where('user_nip', $this->input->post('user_nip'));
                $query = $this->db->get('users');
                if ($query->num_rows() > 0) {
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function add()
        {
                $data = array(
                        'user_nik' => $this->input->post('user_nik'),
                        'user_nip' => $this->input->post('user_nip'),
                        'user_password' => password_hash($this->input->post('user_nip'), PASSWORD_BCRYPT),
                        'user_role' => $this->input->post('user_role'),
                        'user_nama' => $this->input->post('user_nama'),
                        'user_email' => $this->input->post('user_email'),
                        'user_pangkat' => $this->input->post('user_pangkat'),
                        'user_jabatan' => $this->input->post('user_jabatan'),
                        'user_unit_organisasi' => $this->input->post('user_unit_organisasi'),
                        'user_unit_kerja' => $this->input->post('user_unit_kerja'),
                        'user_organisasi' => $this->input->post('user_organisasi'),
                        'user_kota' => $this->input->post('user_kota'),
                        'user_provinsi' => $this->input->post('user_provinsi'),
                        'user_telepon' => $this->input->post('user_telepon'),
                        // 'user_nik' => $this->input->post('user_ktp'),
                        // 'user_nik' => $this->input->post('user_foto'),
                        'user_status' => 0,
                        'created_by' => $this->session->userdata('user_id')
                );
                $query = $this->db->insert('users',$data);
                if ($query) {
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function edit($id)
        {
                date_default_timezone_set('asia/bangkok');
                $date = date('Y-m-d H:i:s');
                $data = array(
                        'user_nik' => $this->input->post('user_nik'),
                        'user_nip' => $this->input->post('user_nip'),
                        'user_role' => $this->input->post('user_role'),
                        'user_nama' => $this->input->post('user_nama'),
                        'user_email' => $this->input->post('user_email'),
                        'user_pangkat' => $this->input->post('user_pangkat'),
                        'user_jabatan' => $this->input->post('user_jabatan'),
                        'user_unit_organisasi' => $this->input->post('user_unit_organisasi'),
                        'user_unit_kerja' => $this->input->post('user_unit_kerja'),
                        'user_organisasi' => $this->input->post('user_organisasi'),
                        'user_kota' => $this->input->post('user_kota'),
                        'user_provinsi' => $this->input->post('user_provinsi'),
                        'user_telepon' => $this->input->post('user_telepon'),
                        // 'user_nik' => $this->input->post('user_ktp'),
                        // 'user_nik' => $this->input->post('user_foto'),
                        'updated_by' => $this->session->userdata('user_id'),
                        'updated_at' => $date,
                );
                $this->db->where('user_id',$id);
                $query = $this->db->update('users',$data);
                if ($query) {
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function softDelete($id){
                date_default_timezone_set('asia/bangkok');
                $date = date('Y-m-d H:i:s');
                $data = array(
                        'deleted_by'=>$this->session->userdata('user_id'),
                        'deleted_at'=>$date
                );
                $this->db->where('user_id',$id);
                $query = $this->db->update('users',$data);
                if ($query) {
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function deletePermanent($id){
                $this->db->where('user_id',$id);
                $query = $this->db->delete('users');
                if ($query) {
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function restoreData($id){
                $data = array(
                        'deleted_by'=>NULL,
                        'deleted_at'=>NULL
                );
                $this->db->where('user_id',$id);
                $query = $this->db->update('users',$data);
                if ($query) {
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

}
