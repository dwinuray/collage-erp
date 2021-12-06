<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Karyawan extends CI_Controller {
        

        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('M_karyawan');
        }
        

        public function index(){


            $data['title']  = 'Karyawan Perusahaan';
            $data['pegawai'] = $this->M_karyawan->get();

            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/karyawan/V_karyawan');
            $this->load->view('templates/template_footer');
        }


        // proses tambah 
        function prosestambah() {

            $this->M_karyawan->prosestambah();
        }



        // delete
        function delete( $kd ) {

            $this->M_karyawan->prosesdelete( $kd );
        }


        // proses update
        function update( $kd ) {

            $this->M_karyawan->prosesupdate( $kd );
        }
    
    }
    
    /* End of file Karyawan.php */
    