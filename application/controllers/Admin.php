<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property M_admin $M_admin
 * @property M_admin $input
 * @property M_admin $upload
 * @method Model_coba $post
 */
    class Admin extends CI_Controller{
        function index(){
            $this->load->model("M_admin");
            $user = $this->M_admin->get_data_user();
            $jumlah = $this->M_admin->jumlah_user();
            $uangk = $this->M_admin->jumlah_pengeluaran();
            $uangm = $this->M_admin->jumlah_masuk();
           $data = [
            // "judul"=> "ya aku",
            // "isi"=>"ya isi",
            "user"=>$user,
            "jumser"=>$jumlah,
            "uangK"=>$uangk,
            "uangM"=>$uangm

           ];
           
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view("admin/v_dashboardAdmin",$data);
            $this->load->view('admin/templates/footer');
            }
        // function c(){
        //     $this->load->model("M_admin");
        //     $post = $this->input->post();
        //     //form validation
        //     if (empty($post)){

        //     $this->load->view('templates/header');
        //     $this->load->view('templates/sidebar');
        //     $this->load->view("c");
        //     $this->load->view('templates/footer');
            
                
        //     }else{
        //         $config = [
        //             'max-size' => 1000240,
        //             'allowed_types' => 'jpg|jpeg|png',
        //             'upload_path' => './foto_uploads/',
        //             'encrypt_name' => true ,
        //         ];
        //         $this->load->library("upload",$config);
        //         if(!$this->upload->do_upload('foto')){
        //             echo $this->upload->display_errors();
        //         }else{
        //         echo json_encode($this->upload->data());
        //         $foto = $this->upload->data('file_name'); 
        //         $result = $this->Model_coba->input_data_user(
        //             $post['nama_user'],
        //             $post["password_user"],
        //             $foto
        //         );
        //         redirect("coba");
        //         }
        //     }
        // }          
        public function d($id){
            $this->load->model("M_admin");
            $result = $this->M_admin->hapus_data_user($id);
            if($result){
                // redirect("admin/v_dashboardAdmin");
                redirect("admin");
            } else {
                echo "Gagal menghapus data. Kesalahan Database: " . $this->db->error()['message'];
            }
        }
        
        public function coba1(){
            echo "hello all";
        }
        public function u($id){
            $this->load->model("M_admin");
            $post = $this->input->post();
            if(empty($post)){
                $array_user = $this->M_admin->get_data_user($id);
                if(sizeof($array_user)>0){
                    $user = $array_user[0];
                }else{
                    $user= null;
                }
                $data = [
                    "user"=>$user,
                    "hal" => "Edit User"
                ];
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidebar');
                $this->load->view("admin/v_updateUser",$data);
                $this->load->view('admin/templates/footer');
                
            }else{
                $result=$this->M_admin->update_data_user(
                    $post['id_user'],
                    $post['nama'],
                    $post['username'],
                    $post['email']
                );
                if($result){
                    redirect("admin");
                }else{
                    echo "data gagal dihapus";
                }
            }
        }

        public function login() {
                $this->load->view('admin/v_adminLogin');
        }
    
        public function proses_login() {
            $this->load->model("M_admin");
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            $admin = $this->M_admin->cek_login($email, $password);
    
            if ($admin) {
                // Jika login sukses, set sesi dan redirect ke dashboard admin
                $data_session = array(
                    'admin_id' => $admin->admin_id,
                    'nama' => $admin->nama,
                    'email' => $admin->email,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data_session);
    
                // redirect('admin/index');
                header("Location: " . base_url('index.php/admin'));
                exit(); 
            } else {
                // Jika login gagal, tampilkan pesan error
                echo "Login gagal. Periksa kembali email dan password.";
            }
        }
    
        public function logout() {
            // Hancurkan sesi dan redirect ke halaman login
            $this->session->sess_destroy();
            redirect(base_url('index.php/admin/login'));
        }
    
        public function dashboard() {
            // Tampilkan halaman dashboard admin
            // Pastikan untuk menambahkan verifikasi sesi di sini sebelum menampilkan halaman
            if ($this->session->userdata('logged_in')) {
                $this->load->view('dashboard_admin');
            } else {
                // Redirect ke halaman login jika sesi tidak ada
                redirect(base_url('admin/login'));
            }
        }

    }

