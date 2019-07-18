<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Transaksi extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_Layanan');
    }

    public function index(){
        $layanan['id'] = $this->generate_kode();
        $layanan['data'] = $this->M_Layanan->getLayanan();
        $this->load->view('dashboard/view_transaksi',$layanan);
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

}

/* End of file C_Transaksi.php */
/* Location: ./application/controllers/C_Transaksi.php */