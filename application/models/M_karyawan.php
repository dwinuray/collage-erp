<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_karyawan extends CI_Model {
        


        function get(){

            return $this->db->get('mst_pegawai');
        }
        
        function prosestambah() {

            $kode       = $this->input->post('kode');
            $nama       = $this->input->post('nama');
            $jkl     = $this->input->post('jkl');
            $jobdesk     = $this->input->post('jobdesk');

            // data produk
            $data = array(

                'kd_pegawai'=> $kode,
                'nama'   => $nama,
                'jkl' => $jkl,
                'jobdesk'  => $jobdesk
            );

            $this->db->insert('mst_pegawai', $data);
            
            // redirect
            redirect('karyawan');
        }



        // delete 
        function prosesdelete( $kd ) {

            // delete bahan
            $this->db->where('kd_pegawai', $kd)->delete('mst_pegawai');
            redirect('karyawan');
        }


        function prosesupdate( $kd ) {

            $kode       = $this->input->post('kode');
            $nama       = $this->input->post('nama');
            $jkl     = $this->input->post('jkl');
            $jobdesk     = $this->input->post('jobdesk');

            $data = array(

                'kd_pegawai'=> $kode,
                'nama'   => $nama,
                'jkl' => $jkl,
                'jobdesk'  => $jobdesk
            );

            $this->db->where('kd_pegawai', $kd);
            $this->db->update('mst_pegawai', $data);
            
            // redirect
            redirect('karyawan');
        }
    
    }
    
    /* End of file M_karyawan.php */
    