<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_User extends CI_Model {
                        
    public function login($user,$pass){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_username', $user);
        $this->db->where('user_password', md5($pass));

        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            return $query->result();
        }else{
            return false;
        }                   
    }
    
    public function insertUser(){
        $data = array(
            'user_id'       => $this->input->post('id_user'),
            'user_username' => $this->input->post('username'),
            'user_password' => md5($this->input->post('password')),
            'user_status'   => 'Pelanggan'
        );
        $this->db->insert('tbl_user',$data);
    }


    public function CekKode($id){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('tbl_user');

        return $query->result();
    }

    public function CekUser($user){
        $this->db->select('user_username');
        $this->db->from('tbl_user');
        $this->db->where('user_username', $user);
        
        $query = $this->db->get();
        if($query->num_rows() == 0){
            return true;
        }else{
            return false;
        }
    }
                            
                        
}
                        
/* End of file M_User.php */
    
                        