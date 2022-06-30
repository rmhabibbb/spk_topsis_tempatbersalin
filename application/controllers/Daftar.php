<?php
/**
 *
 */
class Daftar extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->data['email'] = $this->session->userdata('email');
    $this->data['id_role']  = $this->session->userdata('id_role');
    if (isset($this->data['email'], $this->data['id_role']))
    {
      switch ($this->data['id_role'])
      {
        case 1:
          redirect('admin');
          break;
        case 2:
          redirect('alternatif');
          break;  
      }
      exit;
    }
    $this->load->model('login_m');
    $this->load->model('Alternatif_m');
  }
 

  public function index() { 
    if ($this->POST('daftar')) { 

        if ($this->login_m->get_num_row(['email' => $this->POST('email')]) != 0) {
              setcookie('namalengkap_temp', $this->POST('nama'), time() + 5, "/");
              setcookie('namaalternatif_temp', $this->POST('nama_alternatif'), time() + 5, "/");

              $this->flashmsg('Email telah digunakan!', 'warning');
              redirect('beranda/daftar'); 
              exit();
        }

        if ($this->POST('password') != $this->POST('password2')) {
              setcookie('email_temp', $this->POST('email'), time() + 5, "/");
              setcookie('namalengkap_temp', $this->POST('nama'), time() + 5, "/");
              setcookie('namaalternatif_temp', $this->POST('nama_alternatif'), time() + 5, "/");
          $this->flashmsg('Kata sandi tidak sama!', 'warning');
              
              redirect('beranda/daftar'); 
              exit();
        }

             $data = [   
              'email' => $this->POST('email'), 
              'password' => md5($this->POST('password')),  
              'nama_pengguna' => $this->POST('nama'),
              'role' => 2  
              ]; 
            $this->login_m->insert($data);


              $id = $this->Alternatif_m->get_num_row(['']) + 1;

              $data = [   
                'id_alternatif' => $id,
                'nama_alternatif' => $this->POST('nama_alternatif'),  
                'email' =>  $this->POST('email'),
                'alamat' => NULL,
                'kontak' => NULL,
                'foto' => NULL,
                'status' => 9 
                ]; 
              $this->Alternatif_m->insert($data); 
              
              $user_session = [
                'email' => $this->POST('email'), 
                'id_role' => 2 
              ];
              $this->session->set_userdata($user_session);
 
              $this->flashmsg('Selamat anda berhasil mendaftar, silahkan lengkapi informasi tempat praktek bersalin anda!', 'success');
              redirect('alternatif/'); 
              exit();
            
          } 
  

    $this->load->view('daftar');
  }
}

?>
