<?php
    
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    

        function __construct()
        {
            parent::__construct();

            $this->load->model('M_login');
        }

        // halaman login
        public function index(){
            
            $this->load->view('V_login');
        }



        // proses login
        function proses() {

            $this->M_login->cekAkun();
        }
    
    }
    
    /* End of file Login.php */
    