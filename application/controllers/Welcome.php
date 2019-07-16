<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('view_login');
	}

	public function blank(){
		$this->load->view('dashboard/blank');
	}

	public function data_table(){
		$this->load->view('dashboard/data_table');
		
	}

	public function Registrasi(){
		$user['id'] = $this->generate_kode();
		$this->load->view('view_registrasi',$user);
		
	}

	public function daftar(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		// $this->load->model('Welcome_model');
		// $this->Welcome_model->daftar();

		
		if ($this->form_validation->run() == False) {
			# code...
			redirect('Welcome/registrasi','refresh');
			
		} else {
			# code...
			redirect('Welcome/blank','refresh');
		}
		
		
		
		
	}

	public function generate_kode(){
		$this->load->model('Welcome_model');
        $nomor = 1;
        $kode = substr('C00'.$nomor,-5,5);

        $cek = count($this->Welcome_model->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('C00'.$nomor,-5,5);
            $cek = count($this->Welcome_model->CekKode($kode));
        }

        return $kode;
    }


}
