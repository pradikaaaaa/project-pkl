<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Welcome_model extends CI_Model {
     
    public function CekKode($id){
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('tbl_user');

        return $query->result();
    }

    public function daftar(){             
        $data = array(
            'user_id' => $this->input->post('id_user'),
            'user_username' => $this->input->post('username'),
            'user_password' => md5($this->input->post('password')),
            'user_nama' => $this->input->post('nama'),
            'user_no_telepon' => $this->input->post('telepon'),
            'user_alamat' => $this->input->post('alamat')
        );
        $this->db->insert('tbl_user',$data);       
    }
                        
                            
                        
}
                        
/* End of file Welcome.php */
    
                        