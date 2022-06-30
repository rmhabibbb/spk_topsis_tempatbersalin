<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Alternatif extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['email'] || ($this->data['id_role'] != 2))
          {
            $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda harus login terlebih dahulu', 'danger');
            redirect('login');
            exit;
          }  

          
    $this->load->model('login_m'); 
    $this->load->model('register_m');   
    $this->load->model('Alternatif_m');    
    $this->load->model('Kriteria_m');   
    $this->load->model('Subkriteria_m');   
    $this->load->model('Penilaian_m');    
    
    $this->data['profil'] = $this->login_m->get_row(['email' =>$this->data['email'] ]);
    $this->data['alternatif'] = $this->Alternatif_m->get_row(['email' =>$this->data['email'] ]);

    if ($this->data['alternatif']->nama_alternatif != Null && $this->data['alternatif']->kontak != null && $this->data['alternatif']->alamat != null) {
       if ($this->data['alternatif']->status == 9) {
           $this->Alternatif_m->update($this->data['alternatif']->id_alternatif,['status' => 0]);
       }
    }

  }

public function index()
  {  
        if ($this->POST('edit')) {
        $email_x = $this->POST('email_x');
        $email = $this->POST('email');
        $id_alternatif = $this->data['alternatif']->id_alternatif;
        if ($this->login_m->get_num_row(['email' => $email]) != 0 && $email_x != $email) { 
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('alternatif/');
          exit();    
        }
 
        $datapemilik = [
          'email' => $email, 
          'nama_pengguna' => $this->POST('nama_pemilik'), 
        ];

        $this->login_m->update($email_x,$datapemilik);

        $fotolama = $this->Alternatif_m->get_row(['id_alternatif' => $id_alternatif])->foto;

        if ($_FILES['foto']['name'] !== '') { 
          $files = $_FILES['foto'];
          $_FILES['foto']['name'] = $files['name'];
          $_FILES['foto']['type'] = $files['type'];
          $_FILES['foto']['tmp_name'] = $files['tmp_name'];
          $_FILES['foto']['size'] = $files['size'];

          $id_foto = rand(1,9);
          for ($j=1; $j <= 11 ; $j++) {
            $id_foto .= rand(0,9);
          }
          @unlink(realpath(APPPATH . '../assets/' . $fotolama));
          $this->upload($id_foto, 'alternatif/','foto');    
          $this->Alternatif_m->update($id_alternatif,['foto' => 'alternatif/'.$id_foto.'.jpg']);

        }

      
        $dataalternatif = [ 
          'nama_alternatif' => $this->POST('nama_alternatif'), 
          'alamat' => $this->POST('alamat'),
          'kontak' => $this->POST('kontak')  
        ];

        $this->Alternatif_m->update($id_alternatif,$dataalternatif);
 

        $this->flashmsg('Data alternatif berhasil disimpan!', 'success');
        redirect('alternatif/');
        exit();

      }


        $this->data['list_kriteria'] = $this->Kriteria_m->get();
        $this->data['title']  = 'Beranda'; 
        $this->data['index'] = 1;
        $this->data['content'] = 'alternatif/dashboard';
        $this->template($this->data,'alternatif');
  }

 

 
  // -----------------------------------------------------------------------------------------------------------------
       public function profil(){
       
        $this->data['title']  = 'Pengaturan';
        $this->data['index'] = 7;
        $this->data['content'] = 'alternatif/profil';
        $this->template($this->data,'alternatif');
     }
    public function proses_edit_profil(){
      if ($this->POST('edit')) {
      
          
          $this->login_m->update($this->POST('emailx'),['email' => $this->POST('email'),
            'nama_pengguna' => $this->POST('nama'),  ]);    
          $user_session = [
            'email' => $this->POST('email'),  
          ];
          $this->session->set_userdata($user_session);
 
  
          $this->flashmsg('PROFIL BERHASIL DISIMPAN!', 'success');
          redirect('alternatif/profil');
          exit();

          } elseif ($this->POST('edit2')) { 
            $data = [ 
              'password' => md5($this->POST('pass1')) 
            ];
            
            $this->login_m->update($this->data['email'],$data);
        
            $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
            redirect('alternatif/profil');
            exit();    
          }  

          else{

          redirect('alternatif/profil');
          exit();
          }

    }
 
    public function cekpasslama(){ echo $this->login_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->login_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->login_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }


 
}

 ?>
