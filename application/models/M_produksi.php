<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_produksi extends CI_Model {
        



        function getDataProduk( $key = null ) {

            $data = array();

            if ( $key ) {

                $dataTempe = $this->db->get_where( 'mst_produk', $key );
                $dataVariasi = $this->db->get_where('mst_varian', $key);

                $data = array(

                    'produk'    => $dataTempe->row_array(),
                    'variasi'   => $dataVariasi->result_array()
                );

            } else {

                $dataTempe = $this->db->get( 'mst_produk' );
                $data = array(

                    'produk'    => $dataTempe->result_array(),
                    'variasi'   => []
                );
            }


            return $data;
        }


        
        function prosestambah() {

            $kode       = $this->input->post('kd_produk');
            $nama       = $this->input->post('nama');
            $deskripsi  = $this->input->post('deskripsi');
            $berat      = $this->input->post('berat');

            // data produk
            $data = array(

                'kd_produk'     => $kode,
                'nama_produk'   => $nama,
                'deskripsi'     => $deskripsi,
                'berat'         => $berat
            );

            $this->db->insert('mst_produk', $data);
            
            // variasi 
            $kode_var = $this->input->post('kode');
            $nama_var = $this->input->post('variasi');
            $harga_var = $this->input->post('harga');

            $dataVariasi = array();
            for ( $i = 0; $i < count( $kode_var ); $i++ ) {


                array_push( $dataVariasi, array(

                    'kd_produk' => $kode,
                    'kd_varian' => $kode_var[$i],
                    'nama_varian' => $nama_var[$i],
                    'harga_varian'=> $harga_var[$i]
                ) );
            }
            $this->db->insert_batch( 'mst_varian', $dataVariasi );


            // redirect
            redirect('produksi');
        }



        // update
        function prosesupdate( $kd ) {

            $nama       = $this->input->post('nama');
            $deskripsi  = $this->input->post('deskripsi');
            $berat      = $this->input->post('berat');

            // data produk
            $data = array(

                'nama_produk'   => $nama,
                'deskripsi'     => $deskripsi,
                'berat'         => $berat
            );

            $this->db->where('kd_produk', $kd)->update('mst_produk', $data);
            
            // redirect
            redirect('produksi');

        }


        // delete 
        function prosesdelete( $kd ) {

            $getVariant = $this->db->get_where('mst_varian', ['kd_produk' => $kd]);
            if ( $getVariant->num_rows() > 0 ){ 

                $this->db->where('kd_produk', $kd)->delete('mst_varian');
            }


            // delete produk
            $this->db->where('kd_produk', $kd)->delete('mst_produk');
            redirect('produksi');


        }
















        // tambah variasi
        function prosestambahvariasi( $kd ) {

            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');


            $data = array(

                'kd_produk' => $kd,
                'kd_varian' => $kode,
                'nama_varian'   => $nama,
                'harga_varian'  => $harga 
            );

            $this->db->insert('mst_varian', $data);
            redirect( 'produksi/detail/'. $kd );
        }
        
        
        // update
        function prosesupdatevarian( $kd_var, $kd ) {

            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');


            $data = array(

                'kd_produk' => $kd,
                'kd_varian' => $kode,
                'nama_varian'   => $nama,
                'harga_varian'  => $harga 
            );

            $this->db->where('kd_varian', $kd_var);
            $this->db->update('mst_varian', $data);

            
            redirect( 'produksi/detail/'. $kd );
        }







        // varian hapus
        function proseshapusvarian( $kd_var, $kd ) {

            $this->db->where('kd_varian', $kd_var)->delete('mst_varian');
            redirect( 'produksi/detail/'. $kd );
        }
    
    }
    
    /* End of file M_produksi.php */
    