<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_penjualan extends CI_Model {
        


        // data penjualan
        function getDataPenjualan() {

            $getDataPenjualan = $this->db->get('hs_penjualan_info');
            $data = array();

            if ( $getDataPenjualan->num_rows() > 0 ) {

                foreach ( $getDataPenjualan->result_array() AS $rowPenjualan ) {

                    // informasi penjualan detail
                    
                    $this->db->select('hs_penjualan_detail.*, mst_produk.*')->from('hs_penjualan_detail');
                    $this->db->join('mst_produk', 'mst_produk.kd_produk = hs_penjualan_detail.kd_produk');
                    $this->db->where('kd_penjualan', $rowPenjualan['kd_penjualan']);
                    $getDataPenjualanDetail = $this->db->get();

                    array_push( $data, array(

                        'info'  => $rowPenjualan,
                        'detail'=> $getDataPenjualanDetail->result_array()
                    ) );

                }
            }

            return $data;
        }

        
        function prosestambah() {


            $kd_penjualan = strtoupper(uniqid());

            $dataInfo = array(

                'kd_penjualan'  => $kd_penjualan,
                'nama_lengkap'  => $this->input->post('nama'),
                'alamat'        => $this->input->post('alamat'),
                'telp'          => $this->input->post('telp'),
                'email'         => $this->input->post('email'),
                'status'        => 'process',
                'tanggal_penjualan' => date('Y-m-d')
            );

            $this->db->insert('hs_penjualan_info', $dataInfo);


            $dataDetail = array();
            foreach ( $this->cart->contents() AS $row ) {

                array_push( $dataDetail, array(

                    'kd_penjualan'  => $kd_penjualan,
                    'kd_produk'     => $row['id'],
                    'jumlah'        => $row['qty']
                ) );
            }

            $this->db->insert_batch('hs_penjualan_detail', $dataDetail);
            $this->cart->destroy();

            
            redirect('penjualan');
        }




        // update penjualan
        function prosesupdatepenjualan( $kd_penjualan ) {

            $data = array(

                'status'                => $this->input->post('status'),
                'tanggal_keputusan'     => date('Y-m-d'),
                'catatan'               => $this->input->post('catatan'),
            );

            $this->db->where('kd_penjualan', $kd_penjualan)->update('hs_penjualan_info', $data);
            redirect('pemesanan');
        }
    
    }
    
    /* End of file M_penjualan.php */
    