<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller {
        
        function __construct()
        {
            parent::__construct();

            // tempat untuk memanggil model 
            // . . . 
        }

        public function index(){
            
            $this->load->view('dashboard/V_dashboard');
        }
    
    }
    
    
    /* End of file Dashboard.php */
    