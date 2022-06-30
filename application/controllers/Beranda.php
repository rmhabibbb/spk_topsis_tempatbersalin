<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
  class Beranda extends MY_Controller
  {

    function __construct(){
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
      $this->load->model('Login_m');
  
      $this->load->model('login_m'); 
      $this->load->model('register_m');   
      $this->load->model('Alternatif_m');    
      $this->load->model('Kriteria_m');   
      $this->load->model('Subkriteria_m');   
      $this->load->model('Penilaian_m');    
      date_default_timezone_set("Asia/Jakarta");   
 
    }

    public function index(){
        $this->data['title']  = 'Beranda'; 
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 
        $this->data['index'] = 1;
   
        $this->data['content'] = 'pengguna/dashboard';
        $this->template($this->data,'pengguna');
    }
    public function spk(){     
        

        $this->data['kriteria'] = $this->Kriteria_m->get(); 
        $hasil_akhir = $this->Penilaian_m->topsis(); 
          
        if ($this->POST('cari')) { 
        $temp = array();
        foreach ($hasil_akhir['hasil_akhir'] as $a) {
          $nilai = array();

          foreach ($this->data['kriteria'] as $k) {
             $penilaian = $this->Penilaian_m->get_row(['id_alternatif' => $a['id_alternatif'], 'id_kriteria' => $k->id_kriteria]);
              
              array_push($nilai, $penilaian->id_subkriteria);
          }
          
          $data = [ 
            'poin' => 0,
            'id_alternatif' => $a['id_alternatif'],
            'nilai' => $nilai
          ];

          array_push($temp, $data);
        }

        
        
        for ($i=0; $i < sizeof($temp) ; $i++) {  
          for ($j=1; $j <= sizeof($this->data['kriteria']) ; $j++) { 
              if ($temp[$i]['nilai'][$j-1] == $this->POST('c'.$j)) {
                $temp[$i]['poin']++;
              }
            }
            
        } 
        rsort($temp);
        $this->data['hasil_akhir'] = $temp;  
      }else{

        $this->data['hasil_akhir'] = $hasil_akhir['hasil_akhir']; 
      }
       
        $this->data['title']  = 'Tempat Praktek Bersalin'; 
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 
        $this->data['index'] = 2;
   
        $this->data['content'] = 'pengguna/spk';
        $this->template($this->data,'pengguna');
      
    } 
    
    public function cari(){     
        

        $this->data['kriteria'] = $this->Kriteria_m->get(); 
        $hasil_akhir = $this->Penilaian_m->topsis(); 
          
        if ($this->POST('cari')) { 
        $temp = array();
        foreach ($hasil_akhir['hasil_akhir'] as $a) {
          $nilai = array();

          foreach ($this->data['kriteria'] as $k) {
             $penilaian = $this->Penilaian_m->get_row(['id_alternatif' => $a['id_alternatif'], 'id_kriteria' => $k->id_kriteria]);
              
              array_push($nilai, $penilaian->id_subkriteria);
          }
          
          $data = [ 
            'poin' => 0,
            'id_alternatif' => $a['id_alternatif'],
            'nilai' => $nilai
          ];

          array_push($temp, $data);
        }

        
        
        for ($i=0; $i < sizeof($temp) ; $i++) {  
          for ($j=1; $j <= sizeof($this->data['kriteria']) ; $j++) { 
              if ($temp[$i]['nilai'][$j-1] == $this->POST('c'.$j)) {
                $temp[$i]['poin']++;
              }
            }
            
        } 
        rsort($temp);
        $this->data['hasil_akhir'] = $temp;  
      } 
       
        $this->data['title']  = 'Cari Tempat Praktek Bersalin'; 
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 
        $this->data['index'] = 3;
   
        $this->data['content'] = 'pengguna/cari';
        $this->template($this->data,'pengguna');
      
    } 
 
    public function alternatif(){     

      if ($this->uri->segment(3)) {
        $id_alternatif = $this->uri->segment(3);
        if ($this->Alternatif_m->get_num_row(['id_alternatif' => $id_alternatif]) == 0) {
          $this->flashmsg('Alternatif_m tidak ditemukan!', 'warning');
          redirect('beranda/');
          exit();  
        }
        $alternatif = $this->Alternatif_m->get_row(['id_alternatif' => $id_alternatif]);


        $this->data['title']  = $alternatif->nama_alternatif;
        $this->data['index'] = 1;
        
        $this->data['alternatif'] = $alternatif; 
        $this->data['list_kriteria'] = $this->Kriteria_m->get(); 
        
        $this->data['pemilik'] = $this->login_m->get_row(['email' => $alternatif->email]);  
        $this->data['content'] = 'pengguna/detailalternatif';
        $this->template($this->data,'pengguna');
        
      }else{
        redirect('beranda');
        exit();
      }
      
    }

    public function login() {  
        $this->data['title']  = 'Masuk'; 
        $this->data['index'] = 4; 
        $this->data['content'] = 'pengguna/login';
        $this->template($this->data,'pengguna');
    }

    public function daftar() {  
        $this->data['title']  = 'Daftar'; 
        $this->data['index'] = 4; 
        $this->data['content'] = 'pengguna/daftar';
        $this->template($this->data,'pengguna');
    }

 
  
  }
?>
