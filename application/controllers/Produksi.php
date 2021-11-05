<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Produksi extends CI_Controller {
        
        function __construct(){
            
            parent::__construct();

            $this->load->model('M_produksi');
        }

        public function index(){
            
            $data['title']  = 'Produksi';
            $data['produk'] = $this->M_produksi->getDataProduk();

            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/produksi/V_produksi');
            $this->load->view('templates/template_footer');
        }


        // tambah
        function tambah() {

            $data['title'] = 'Produksi - Tambah Baru';

            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/produksi/V_produksi_tambah');
            $this->load->view('templates/template_footer');
        }


        function next() {

            $data['title'] = 'Produksi - Tambah Variasi';

            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/produksi/V_produksi_tambah_variasi');
            $this->load->view('templates/template_footer');
        }



        // proses tambah 
        function prosestambah() {

            $this->M_produksi->prosestambah();
        }



        // proses update
        function update( $kd ) {

            $this->M_produksi->prosesupdate( $kd );
        }



        // delete
        function delete( $kd ) {

            $this->M_produksi->prosesdelete( $kd );
        }












        // detail variasi
        function detail( $kd ) {

            $data['title']  = 'Produksi';
            $data['row'] = $this->M_produksi->getDataProduk(['kd_produk' => $kd]);


            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/produksi/V_produksi_varian');
            $this->load->view('templates/template_footer');
        }




        // tambah variasi
        function tambah_variasi( $kd ) {

            $this->M_produksi->prosestambahvariasi( $kd );
        }



        // hapus
        function deleteVarian( $kd_var, $kd ) {

            $this->M_produksi->proseshapusvarian( $kd_var, $kd );
        }
    


        // update
        function updatevarian( $kd_var, $kd ) {

            $this->M_produksi->prosesupdatevarian( $kd_var, $kd );
        }
    }
    
    /* End of file Produksi.php */
    