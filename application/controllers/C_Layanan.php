<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class C_Layanan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Layanan');
    }

    public function index(){
        $layanan['id'] = $this->generate_kode();
        $layanan['data'] = $this->M_Layanan->getLayanan();
        $this->load->view('dashboard/master/view_layanan',$layanan);
    }

    public function generate_kode(){
        $nomor = 1;
        $kode = substr('L00'.$nomor,-5,5);

        $cek = count($this->M_Layanan->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('L00'.$nomor,-5,5);
            $cek = count($this->M_Layanan->CekKode($kode));
        }
        return $kode;
    }

    public function tambah_layanan(){
       $this->M_Layanan->insertLayanan();
       redirect('C_Layanan/'); 
    }

    public function ubah_layanan(){
        $this->M_Layanan->updateLayanan($this->input->post('id'));
        redirect('C_Layanan/');
    }

    public function hapus_layanan(){
        $this->M_Layanan->deleteLayanan($this->input->post('id'));
        redirect('C_Layanan/');
    }


        
}
        
    /* End of file  C_Layanan.php */
        
                            