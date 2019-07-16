<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_Biodata extends CI_Model {
    
    public function insertBiodata(){
        $jalan  = $this->input->post('alamat');
        $kota   = $this->input->post('kota');
        $kode_post  = $this->input->post('kode_post');

        $data = array(
            'bio_id'        => $this->input->post('id_bio'),
            'bio_user_id'   => $this->input->post('id_user'),
            'bio_nama'      => $this->input->post('nama'),
            'bio_email'     => $this->input->post('email'),
            'bio_telepon'   => $this->input->post('telepon'),
            'bio_alamat'    => $jalan."<br>".$kota.",".$kode_post
        );
        $this->db->insert('tbl_biodata',$data);
    }
    
    
    
    public function CekKode($id){
        $this->db->select('*');
        $this->db->where('bio_id', $id);
        $query = $this->db->get('tbl_biodata');

        return $query->result();
    }
}
                        
/* End of file M_Biodata.php */
    
                        