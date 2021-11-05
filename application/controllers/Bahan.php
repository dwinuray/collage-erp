<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Bahan extends CI_Controller {
        

        function __construct()
        {
            parent::__construct();

            $this->load->model('M_bahan');
            $this->load->model('M_produksi');
        }

        public function index()
        {
            $data['title']  = 'Bahan';
            $data['produk'] = $this->M_bahan->getListProduk();
            $data['bahan']  = $this->M_bahan->getDataBahan();
            
            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/bahan/V_bahan');
            $this->load->view('templates/template_footer');
        }



        // proses tambah 
        function prosestambah() {

            $this->M_bahan->prosestambah();
        }

        // delete
        function delete( $kd ) {

            $this->M_bahan->prosesdelete( $kd );
        }


        // proses update
        function update( $kd ) {

            $this->M_bahan->prosesupdate( $kd );
        }
        



        // pembuatan
        function ubahpembuatan( $kd_produk ) {

            $this->M_bahan->prosespengubahanpembuatan( $kd_produk );
        }
    }
    
    /* End of file Bahan.php */
    