<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {


    function __construct(){
        
        parent::__construct();

        $this->load->model('M_penjualan');
    }

    public function index(){
        
        $data['title']  = 'Penjualan';
        $data['penjualan'] = $this->M_penjualan->getDataPenjualan();
            
        $this->load->view('templates/template_header', $data);
        $this->load->view('contents/pemesanan/V_pemesanan');
        $this->load->view('templates/template_footer');
    }




    function do_confirm( $kd_penjualan ) {

        $this->M_penjualan->prosesupdatepenjualan( $kd_penjualan );
    }

}

/* End of file Pemesanan.php */
