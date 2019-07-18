<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class C_Biodata extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Biodata');
    }

    public function index(){
    }

    public function list_biodata($status){
        $data['status'] = $status;
        $data['list_biodata'] = $this->M_Biodata->getListBiodata($status);
        $this->load->view('dashboard/master/view_biodata', $data);
        
    }

        
}
        
    /* End of file  C_Biodata.php */
        
                            