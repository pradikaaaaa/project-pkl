<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class C_Dashboard extends CI_Controller {

    public function index(){
        $this->load->view('dashboard/view_dashboard');
    }
        
}
        
    /* End of file  C_Dashboard.php */
        
                            