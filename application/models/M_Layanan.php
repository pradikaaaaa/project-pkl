<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_Layanan extends CI_Model {
                        
    public function CekKode($id){
        $this->db->select('*');
        $this->db->where('layanan_id', $id);
        $query = $this->db->get('tbl_layanan');

        return $query->result();
    }

    public function getLayanan(){
        $this->db->select('*');
        $query = $this->db->get('tbl_layanan');

        return $query->result();
    }

    public function insertLayanan(){
        $data = array(
            'layanan_id'    => $this->input->post('id'),
            'layanan_nama'  => $this->input->post('nama'),
            'layanan_harga' => $this->input->post('harga'),
            'layanan_jenis' => $this->input->post('jenis')
        );
        $this->db->insert('tbl_layanan',$data);
    }

    public function updateLayanan($id){
        $data = array(
            'layanan_id'    => $this->input->post('id'),
            'layanan_nama'  => $this->input->post('nama'),
            'layanan_harga' => $this->input->post('harga'),
            'layanan_jenis' => $this->input->post('jenis')
        );
        $this->db->where('layanan_id',$id);
        $this->db->update('tbl_layanan',$data);
    }

    public function deleteLayanan($id){
        $this->db->where('layanan_id',$id);
        $this->db->delete('tbl_layanan');
    }
                            
                        
}
                        
/* End of file M_Layanan.php */
    
                        