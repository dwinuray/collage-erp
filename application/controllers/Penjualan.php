<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Penjualan extends CI_Controller {
        
        function __construct() {

            parent::__construct();

            // load model here . . .
            $this->load->model('M_produksi');
            $this->load->model('M_penjualan');
        }

        public function index(){
            
            $data['title']  = 'Penjualan';
            $data['produk'] = $this->M_produksi->getDataProduk();
            
            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/penjualan/V_penjualan');
            $this->load->view('templates/template_footer');
        }



        // add to cart
        function add( $kd_produk ){

            // data produk
            $getDataProduk = $this->M_produksi->getDataProduk( ['kd_produk' => $kd_produk] )['produk'];

            $data = array(
                'id'      => $kd_produk,
                'qty'     => 1,
                'price'   => 0,
                'name'    => $getDataProduk['nama_produk'],
                'options' => array()
            );
            
            $this->cart->insert($data);

            redirect('penjualan');
        }



        // remove
        function remove( $id ) {

            $data = array(
                'rowid' => $id,
                'qty'   => 0
            );
        
            $this->cart->update($data);
            redirect( $this->input->get('url') );
        }

        


        function proses() {

            $data['title']  = 'Penjualan - Checkout';
            
            if ( count($this->cart->contents()) == 0 ) redirect('penjualan');

            $this->load->view('templates/template_header', $data);
            $this->load->view('contents/penjualan/V_penjualan_proses');
            $this->load->view('templates/template_footer');
        }



        function simpan() {

            $this->M_penjualan->prosestambah();
        }
    
    }
    
    /* End of file Penjualan.php */
    