<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class C_User extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Biodata');
        
    }

    public function index(){
        $this->load->view('view_login');
        
    }

    public function regisForm(){
        $user['id_user'] = $this->generate_kode();
        $user['id_bio'] = $this->generate_kode_bio();
        $this->load->view('view_registrasi', $user);
    }

    /*-------------------------------------------- */

    public function daftar(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable" style="margin:10px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_cekUsername');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        
        if ($this->form_validation->run() == false) {
                $this->regisForm();
        } else {
            $this->M_User->insertUser();
            $this->M_Biodata->insertBiodata();

            redirect('C_User','refresh');
        }
 
    }

    public function cekLogin(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable" style="margin:10px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');

        
        if ($this->form_validation->run() == false) {
            $this->load->view('view_login');
        } else { 
            redirect('C_Layanan','refresh');
            
        }
        
           
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('C_User','refresh');
    }

    /*---------------------------------------- */


    public function cekDb($pass){
        $user = $this->input->post('username');
        $hasil = $this->M_User->login($user,$pass);

        if($hasil){
            $sess_array = array();
            foreach ($hasil as $row) {
                $sess_array = array(
                    'user_id'   => $row->user_id,
                    'user_username' => $row->user_username,
                    'user_status'   => $row->user_status
                );
                $this->session->set_userdata('logged_in',$sess_array);
            }
            return true;
        }else{
            $this->form_validation->set_message('cekDb',"Login gagal! username dan password tidak valid");
            return false;
        }

    }

    public function cekUsername($user){
        $hasil = $this->M_User->CekUser($user);

        if($hasil){
            return true;
        }else{
            $this->form_validation->set_message('cekUsername',"Username sudah terdaftar");
            return false;
        }

    }

    public function generate_kode(){
        $nomor = 1;
        $kode = substr('U00'.$nomor,-5,5);

        $cek = count($this->M_User->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('U00'.$nomor,-5,5);
            $cek = count($this->M_User->CekKode($kode));
        }

        return $kode;
    }

    public function generate_kode_bio(){
        $nomor = 1;
        $kode = substr('B00'.$nomor,-5,5);

        $cek = count($this->M_Biodata->CekKode($kode));

        while($cek == 1){
            $nomor++;
            $kode = substr('B00'.$nomor,-5,5);
            $cek = count($this->M_Biodata->CekKode($kode));
        }

        return $kode;
    }

        
}
        
    /* End of file  C_User.php */
        
                            