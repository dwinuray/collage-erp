<?php

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_bahan extends CI_Model {
    
        



        // get data bahan 
        function getDataBahan() {

            return $this->db->get('mst_bahan');
        }



        function prosestambah() {

            $kode       = $this->input->post('kode');
            $nama       = $this->input->post('nama');
            $satuan     = $this->input->post('satuan');
            $harga      = $this->input->post('harga');

            // data produk
            $data = array(

                'kd_bahan'=> $kode,
                'nama'   => $nama,
                'satuan' => $satuan,
                'harga'  => $harga
            );

            $this->db->insert('mst_bahan', $data);
            
            // redirect
            redirect('bahan');
        }



        // delete 
        function prosesdelete( $kd ) {


            // cek data hspembuatan
            $getDataBahanPembuatan = $this->db->get_where('hs_biayapembuatan', ['kd_bahan' => $kd]);
            if ( $getDataBahanPembuatan->num_rows() > 0 ) {

                $this->db->where('kd_bahan', $kd)->delete('hs_biayapembuatan');
            }

            // delete bahan
            $this->db->where('kd_bahan', $kd)->delete('mst_bahan');
            redirect('bahan');
        }



        function prosesupdate( $kd ) {

            $nama       = $this->input->post('nama');
            $satuan     = $this->input->post('satuan');
            $harga      = $this->input->post('harga');

            // data produk
            $data = array(

                'nama'   => $nama,
                'satuan' => $satuan,
                'harga'  => $harga
            );

            $this->db->where('kd_bahan', $kd);
            $this->db->update('mst_bahan', $data);
            
            // redirect
            redirect('bahan');
        }



        function getListProduk() {

            $getDataProduk = $this->db->get('mst_produk');
            $data = array();


            if ( $getDataProduk->num_rows() > 0 ) {

                foreach ( $getDataProduk->result_array() AS $row ) {

                    // hitung total biaya pembuatan

                    $this->db->select('hs_biayapembuatan.*, mst_bahan.*')->from('hs_biayapembuatan');
                    $this->db->join('mst_bahan', 'mst_bahan.kd_bahan = hs_biayapembuatan.kd_bahan');
                    $this->db->where(['kd_produk' => $row['kd_produk']]);

                    $getDataBahan = $this->db->get();
                    $totalBiaya = 0;
                    $totalBahan = 0;


                    if ( $getDataBahan->num_rows() > 0 ){ 

                        foreach ( $getDataBahan->result_array() AS $res ) {

                            $totalBiaya += ($res['harga'] * $res['kebutuhan_produk'] );
                            $totalBahan++;
                        }
                    }


                    array_push( $data, array(
                        
                        'dt_produk'   => $row,
                        'dt_pembuatan'=> $getDataBahan->result_array(),
                        'biaya' => $totalBiaya,
                        'bahan' => $totalBahan
                    ) );

                }
            }


            return $data;
            // print_r( $data );

            
        }


        function prosespengubahanpembuatan( $kd_produk ) {

            $checkbox = $this->input->post('item');
            $bahan = $this->input->post('keb_bahan');
            $produk = $this->input->post('keb_produk');

            $getDataBahanPembuatan = $this->db->get_where('hs_biayapembuatan', ['kd_produk' => $kd_produk]);
            if ( $getDataBahanPembuatan->num_rows() > 0 ) {


                if ( $checkbox || count($checkbox) > 0 )  {

                    // delete old setting
                    $this->db->where('kd_produk', $kd_produk)->delete('hs_biayapembuatan');


                    // renew info
                    $dataBahanPembuatan = [];
                    for ( $i=0; $i < count( $checkbox ); $i++ ) {

                        array_push( $dataBahanPembuatan, array(

                            'kd_bahan'  => $checkbox[$i],
                            'kd_produk' => $kd_produk,
                            'kebutuhan_bahan'   => $bahan[$i],
                            'kebutuhan_produk'  => $produk[$i],
                        ) );
                    }


                    $this->db->insert_batch( 'hs_biayapembuatan', $dataBahanPembuatan );
                }
                


            } else {


                // do insert
                $dataBahanPembuatan = [];
                    for ( $i=0; $i < count( $checkbox ); $i++ ) {

                        array_push( $dataBahanPembuatan, array(

                            'kd_bahan'  => $checkbox[$i],
                            'kd_produk' => $kd_produk,
                            'kebutuhan_bahan'   => $bahan[$i],
                            'kebutuhan_produk'  => $produk[$i],
                        ) );
                    }


                $this->db->insert_batch( 'hs_biayapembuatan', $dataBahanPembuatan );
            }


            // redirect
            redirect('bahan');
        }
    }
    
    /* End of file M_bahan.php */
    