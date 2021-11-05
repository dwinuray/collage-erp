<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_login extends CI_Model {
    
        
        // fungsi untuk mengecek username dan password
        function cekAkun() {


            // ambil nilai dari input view

            /**
             *  1. Membuat variabel username dan password
             *  2. Mengambil data di database berdasarkan username
             *  3. Cek apakah username tersedia atau tidak 
             *      a. apabila tersedia lanjut nomor 4
             *      b. apabila username salah lanjut ke nomor 5
             */

            // @TODO 1
            $getUsername = $this->input->post('username');
            $getPassword = $this->input->post('password');


            // @TODO 2
            $ambilDataProfileBerdasarkanUsername = $this->db->query("SELECT * FROM `tb_profile` WHERE username = '$getUsername'");


            // @TODO 3
            $cekKondisi = $ambilDataProfileBerdasarkanUsername->num_rows();

            // ambil kolom
            if ( $cekKondisi == 0 ) {

                $html = '<div class="alert alert-danger">
                                Username anda salah !
                            </div>';
                $this->session->set_flashdata('pesan', $html);

                redirect('login/index');

            } else {

                // kita cek password
                $dataAkun = $ambilDataProfileBerdasarkanUsername->row_array();

                // pencocokan password
                if ( $getPassword == $dataAkun['password'] ) {

                    echo "Oke login berhasil";
                } else {


                    $html = '<div class="alert alert-danger">
                                Maaf Kata sandi yang anda masukkan salah !
                            </div>';
                    $this->session->set_flashdata('pesan', $html);

                    redirect('login/index');
                }


                


            }

            // opsi 2
            // $where = ['username' => $getUsername];
            // $this->db->get_where('tb_profile', $where);

        }
        
    
    }
    
    /* End of file M_login.php */
    