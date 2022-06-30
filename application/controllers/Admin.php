<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
  
        $this->data['email'] = $this->session->userdata('email');
        $this->data['id_role']  = $this->session->userdata('id_role'); 
          if (!$this->data['email'] || ($this->data['id_role'] != 1))
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
    $this->data['newalternatif'] =  $this->Alternatif_m->get_num_row(['status' => 0]);
     
            date_default_timezone_set("Asia/Jakarta");


  }

public function index()
{ 

      $this->data['title']  = 'SPK alternatif Kecantikan | Beranda'; 
      $this->data['index'] = 1;
      $this->data['content'] = 'admin/dashboard';
      $this->template($this->data,'admin');
}


// KELOLA KRITERA ----------------------------------------------------------------------------

    public function kriteria(){
      if ($this->POST('tambah')) {   
        $data = [   
          'nama_kriteria' => $this->POST('nama') ,
          'bobot' => $this->POST('bobot') 
        ];
        $this->Kriteria_m->insert($data);

        $id = $this->db->insert_id();


        $this->flashmsg('KRITERA BERHASIL DITAMBAH!', 'success');
        redirect('admin/kriteria/'.$id);
        exit();    
      }  

      if ($this->POST('edit')) { 
        $data = [    
          'bobot' => $this->POST('bobot') 
        ];

        $this->Kriteria_m->update($this->POST('id_kriteria'),$data);

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/kriteria/'.$this->POST('id_kriteria'));
        exit();    
      } 

      if ($this->POST('hapus')) { 
        $id_kriteria = $this->POST('id_kriteria'); 
        $this->Kriteria_m->delete($id_kriteria);
 
        $this->flashmsg('Kriteria berhasil dihapus!', 'success');
        redirect('admin/kriteria/');
        exit();    
      } 


       

      if ($this->uri->segment(3)) {
        if ($this->Kriteria_m->get_num_row(['id_kriteria' => $this->uri->segment(3)]) == 1) {
          $this->data['kriteria'] = $this->Kriteria_m->get_row(['id_kriteria' => $this->uri->segment(3)]);   
          $this->data['list_sub'] = $this->Subkriteria_m->get(['id_kriteria' => $this->uri->segment(3) ]);     
 
           
          $this->data['title']  = 'Kelola Kriteria - '.$this->data['kriteria']->nama_kriteria .'';
          $this->data['index'] = 4;
          $this->data['content'] = 'admin/detailkriteria';
          $this->template($this->data,'admin'); 
        }else {
          redirect('sekretariat/kriteria');
          exit();
        }
      }

     
      else {
        $this->data['list_kriteria'] = $this->Kriteria_m->get();  


        $this->data['title']  = 'Kelola Data Kriteria';
        $this->data['index'] = 4;
        $this->data['content'] = 'admin/kriteria';
        $this->template($this->data,'admin');
      }
    } 

    public function subkriteria(){
      if ($this->POST('tambah')) {   
        $data = [   
          'nama_subkriteria' => $this->POST('nama'), 
          'bobot' => $this->POST('bobot'),
          'id_kriteria' => $this->POST('id_kriteria') 
        ];
        $this->Subkriteria_m->insert($data);

        $id = $this->db->insert_id();

        $this->flashmsg('SUB KRITERA BERHASIL DITAMBAH!', 'success');
        redirect('admin/kriteria/'. $this->POST('id_kriteria').'/'.$id);
        exit();    
      }  

      if ($this->POST('edit')) { 
        $data = [   
          'nama_subkriteria' => $this->POST('nama') , 
          'bobot' => $this->POST('bobot') 
        ];

        $this->Subkriteria_m->update($this->POST('id_subkriteria'),$data);

        $this->flashmsg('DATA BERHASIL TERSIMPAN!', 'success');
        redirect('admin/kriteria/'.$this->POST('id_kriteria'));
        exit();    
      } 

      if ($this->POST('hapus')) {   
        $this->Subkriteria_m->delete($this->POST('id_subkriteria'));
        $this->flashmsg('DATA SUB KRITERA BERHASIL DIHAPUS!', 'success');
        redirect('admin/kriteria/'.$this->POST('id_kriteria'));
        exit();    
      }  
    } 
     
// KELOLA KRITERIA ---------------------------------------------------------------------


// KELOLA FASILITAS 

    public function fasilitas(){
      if ($this->POST('tambah')) {   
        $data = [   
          'nama_fasilitas' => $this->POST('nama')  
        ];
        $this->Fasilitas_m->insert($data); 

        $this->flashmsg('FASILITAS BERHASIL DITAMBAH!', 'success');
        redirect('admin/fasilitas/');
        exit();    
      }  

      if ($this->POST('edit')) { 
        $data = [    
          'nama_fasilitas' => $this->POST('nama') 
        ];

        $this->Fasilitas_m->update($this->POST('id_fasilitas'),$data);

        $this->flashmsg('DATA FASILITAS BERHASIL TERSIMPAN!', 'success');
        redirect('admin/fasilitas/');
        exit();    
      } 
 
      if ($this->POST('hapus')) {   
        $this->Fasilitas_m->delete($this->POST('id_fasilitas'));
        $this->flashmsg('DATA FASILITAS BERHASIL DIHAPUS!', 'success');
        redirect('admin/fasilitas/');
        exit();    
      }  
      
        $this->data['list_fasilitas'] = $this->Fasilitas_m->get();  


        $this->data['title']  = 'Kelola Data Fasilitas';
        $this->data['index'] = 5;
        $this->data['content'] = 'admin/fasilitas';
        $this->template($this->data,'admin');
      
    } 

// KELOLA FASILTAS 


// KELOLA PERAWATAN 

    public function perawatan(){
      if ($this->POST('tambah')) {   
        $data = [   
          'nama_perawatan' => $this->POST('nama')  
        ];
        $this->Perawatan_m->insert($data); 

        $this->flashmsg('PERAWATAN BERHASIL DITAMBAH!', 'success');
        redirect('admin/perawatan/');
        exit();    
      }  

      if ($this->POST('edit')) { 
        $data = [    
          'nama_perawatan' => $this->POST('nama') 
        ];

        $this->Perawatan_m->update($this->POST('id_perawatan'),$data);

        $this->flashmsg('DATA PERAWATAN BERHASIL TERSIMPAN!', 'success');
        redirect('admin/perawatan/');
        exit();    
      } 
 
      if ($this->POST('hapus')) {   
        $this->Perawatan_m->delete($this->POST('id_perawatan'));
        $this->flashmsg('DATA FASILITAS BERHASIL DIHAPUS!', 'success');
        redirect('admin/perawatan/');
        exit();    
      }  
      
        $this->data['list_perawatan'] = $this->Perawatan_m->get();  


        $this->data['title']  = 'Kelola Data Perawatan';
        $this->data['index'] = 6;
        $this->data['content'] = 'admin/perawatan';
        $this->template($this->data,'admin');
      
    } 

// KELOLA PERAWATAN



// KELOLA alternatif 

    public function alternatif(){
      

      if ($this->uri->segment(3)) {
        $id = $this->uri->segment(3);
        $this->data['alternatif'] = $this->Alternatif_m->get_row(['id_alternatif' => $id]);  
        $this->data['pemilik'] = $this->login_m->get_row(['email' => $this->data['alternatif']->email]);    
        $this->data['title']  = $this->data['alternatif']->nama_alternatif .' - Kelola Data alternatif';
        $this->data['index'] = 3;
        $this->data['content'] = 'admin/detailalternatif';
        $this->template($this->data,'admin');
      }else{
        $this->data['list_alternatif'] = $this->Alternatif_m->get();  
        $this->data['title']  = 'Kelola Data Alternatif';
        $this->data['index'] = 3;
        $this->data['content'] = 'admin/alternatif';
        $this->template($this->data,'admin');
      }
      
      
    } 

    public function tambahalternatif(){


      if ($this->POST('tambah')) {
        $email = $this->POST('email');
        if ($this->login_m->get_num_row(['email' => $email]) != 0) { 
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('admin/tambahalternatif/');
          exit();    
        }
 
        $datapemilik = [
          'email' => $email,
          'password' => md5($email),
          'nama_pengguna' => $this->POST('nama_pemilik'),
          'role' => 2
        ];

        $this->login_m->insert($datapemilik);

        $id_alternatif = rand(1,9);
        for ($i=1; $i <= 8 ; $i++) {
            $id_alternatif .= rand(0,9);
        }
 
        $files = $_FILES['foto'];
        $_FILES['foto']['name'] = $files['name'];
        $_FILES['foto']['type'] = $files['type'];
        $_FILES['foto']['tmp_name'] = $files['tmp_name'];
        $_FILES['foto']['size'] = $files['size'];
        $id_foto = rand(1,9);
        for ($j=1; $j <= 5 ; $j++) {
          $id_foto .= rand(0,9);
        }

        $this->upload($id_foto, 'alternatif/','foto');    

        $dataalternatif = [
          'id_alternatif' => $id_alternatif,
          'nama_alternatif' => $this->POST('nama_alternatif'),
          'foto' => 'alternatif/'.$id_foto.'.jpg' ,
          'alamat' => $this->POST('alamat'),
          'kontak' => $this->POST('kontak'),
          'email' => $email,
          'status' => 0
        ];

        $this->Alternatif_m->insert($dataalternatif); 

        $this->flashmsg('alternatif berhasil ditambah!', 'success');
        redirect('admin/alternatif/'.$id_alternatif);
        exit();

      }

      if ($this->POST('edit')) {
        $email_x = $this->POST('email_x');
        $email = $this->POST('email');
        $id_alternatif = $this->POST('id_alternatif');
        if ($this->login_m->get_num_row(['email' => $email]) != 0 && $email_x != $email) { 
          $this->flashmsg('Email telah digunakan!', 'warning');
          redirect('admin/tambahalternatif/');
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

       

        $this->flashmsg('alternatif berhasil disimpan!', 'success');
        redirect('admin/alternatif/'.$id_alternatif);
        exit();

      }

      if ($this->POST('hapus')) {
        $this->login_m->delete($this->POST('email'));
        $this->flashmsg('Data alternatif berhasil dihapus!', 'success');
        redirect('admin/alternatif/');
        exit();

      } 
      $this->data['title']  = 'Tambah Data alternatif';
      $this->data['index'] = 3;
      $this->data['content'] = 'admin/form-tambahalternatif';
      $this->template($this->data,'admin');
      
    } 

// KELOLA alternatif 

// SPK
    public function spk(){
      if ($this->POST('tambah')) {
        
        $id_alternatif = $this->POST('id_alternatif');
        $list_kriteria = $this->Kriteria_m->get();

        foreach ($list_kriteria as $k) {

        $this->Penilaian_m->insert(['id_alternatif' => $id_alternatif, 'id_kriteria' => $k->id_kriteria, 'id_subkriteria' => $this->POST('c'.$k->id_kriteria)]);
        } 

        $this->Alternatif_m->update($id_alternatif,['status' => 1]);
        $this->flashmsg('Data penilaian berhasil ditambah!', 'success');
        redirect('admin/spk/');
        exit();
      }

      if ($this->POST('edit')) {
        $id_alternatif = $this->POST('id_alternatif');
        $list_kriteria = $this->Kriteria_m->get();
        foreach ($list_kriteria as $k) { 
        $this->Penilaian_m->update_where(['id_alternatif' => $id_alternatif, 'id_kriteria' => $k->id_kriteria], ['id_subkriteria' => $this->POST('c'.$k->id_kriteria)]); 
        } 

         

        $this->Alternatif_m->update($id_alternatif,['status' => 1]);
        $this->flashmsg('Data penilaian berhasil diedit!', 'success');
        redirect('admin/spk/');
        exit();
      }

      if ($this->POST('hapus')) {
        $this->Penilaian_m->delete_by(['id_alternatif' => $this->POST('id_alternatif')]);
        $this->Alternatif_m->update($this->POST('id_alternatif'),['status' => 0]);
        $this->flashmsg('Data penilaian berhasil dihapus!', 'success');
        redirect('admin/spk/');
        exit();
      }

      if ($this->uri->segment(3)) {
        $id = $this->uri->segment(3);
        $this->data['alternatif'] = $this->Alternatif_m->get_row(['id_alternatif' => $id]);  
        $this->data['pemilik'] = $this->login_m->get_row(['email' => $this->data['alternatif']->email]);  
        $this->data['list_fasilitas'] = $this->FasilitasAlternatif_m->get_row(['id_alternatif' => $id]);  
        $this->data['list_perawatan'] = $this->PerawatanAlternatif_m->get_row(['id_alternatif' => $id]);  
        $this->data['fasilitas'] = $this->Fasilitas_m->get();
        $this->data['perawatan'] = $this->Perawatan_m->get();
        $this->data['title']  = $this->data['alternatif']->nama_alternatif .' - Kelola Data alternatif';
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/detailalternatif';
        $this->template($this->data,'admin');
      }else{
        $this->data['list_alternatif'] = $this->Alternatif_m->get(['status' => 1]);  
        $this->data['list_alternatif_0'] = $this->Alternatif_m->get(['status' => 0]);  
        $this->data['list_kriteria'] = $this->Kriteria_m->get();  

        $this->data['title']  = 'Data Penilaian - SPK. Metode TOPSIS';
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/spk';
        $this->template($this->data,'admin');
      }
      
      
    } 


    public function cekkecocokanfasilitas(){
      $id_alternatif = $this->POST('id');
      $n_fasilitas = $this->FasilitasAlternatif_m->get_num_row(['id_alternatif' => $id_alternatif]);
      $n = $this->Fasilitas_m->get_num_row(['']);

      $c = $n_fasilitas/$n;

      echo 'Nilai Kecocokan : '. $c;
    }

    public function cekkecocokanperawatan(){
      $id_alternatif = $this->POST('id');
      $n_perawatan = $this->PerawatanAlternatif_m->get_num_row(['id_alternatif' => $id_alternatif]);
      $n = $this->Perawatan_m->get_num_row(['']);

      $c = $n_perawatan/$n;

      echo 'Nilai Kecocokan : '. $c;
    }


    public function topsis(){
        

        $data_awal = array();
        $akar_awal = array();
        $pangkat_awal = array();
        $matriks_ternomalisasi = array();
        $bobot_kriteria = array();
        $matriks_ternomalisasi_bobot = array();
        $y_min = array();
        $y_max = array();
        $solusi_ideal = array();
        $nilai_preferensi = array();

        $list_alternatif = $this->Alternatif_m->get(['status' => 1]);
        $list_kriteria = $this->Kriteria_m->get();

        foreach ($list_alternatif as $lk) {
          $nilai = array();
          foreach ($list_kriteria as $k) {
            array_push($nilai, $this->Subkriteria_m->get_row(['id_subkriteria' => $this->Penilaian_m->get_row(['id_alternatif' => $lk->id_alternatif, 'id_kriteria' => $k->id_kriteria])->id_subkriteria])->bobot);
          }
          $data = [
            'id_alternatif' => $lk->id_alternatif,
            'nama_alternatif' => $lk->nama_alternatif,
            'nilai' =>  $nilai
          ];

          array_push($data_awal, $data);

        }


        for ($i=0; $i < sizeof($list_kriteria); $i++) { 
          $pangkat_awal[$i] = 0;
        } 

        for ($i=0; $i < sizeof($data_awal) ; $i++) { 
          for ($j=0; $j < sizeof($list_kriteria) ; $j++) { 
            $pangkat_awal[$j] =  $pangkat_awal[$j] + pow($data_awal[$i]['nilai'][$j], 2);
          }
        } 


        for ($i=0; $i < sizeof($list_kriteria) ; $i++) { 
          $akar_awal[$i] = sqrt($pangkat_awal[$i]);
        } 

        
        
        foreach ($data_awal as $da) {
          $nilai = array();
          for ($j=0; $j < sizeof($list_kriteria) ; $j++) { 
            array_push($nilai, number_format($da['nilai'][$j]/$akar_awal[$j],4));
          }

          $data = [
            'id_alternatif' => $da['id_alternatif'],
            'nama_alternatif' => $da['nama_alternatif'],
            'nilai' => $nilai
          ];

          array_push($matriks_ternomalisasi, $data);
        }
        
        foreach ($list_kriteria as $k) {
           array_push($bobot_kriteria, $k->bobot);
        }
      
        foreach ($matriks_ternomalisasi as $mt) {
          $nilai = array();
          for ($j=0; $j < sizeof($list_kriteria) ; $j++) { 
            array_push($nilai, number_format($mt['nilai'][$j]*$bobot_kriteria[$j],4));
          }
          $data = [
            'id_alternatif' => $mt['id_alternatif'],
            'nama_alternatif' => $mt['nama_alternatif'],
            'nilai' =>  $nilai
          ];

          array_push($matriks_ternomalisasi_bobot, $data);
        } 

        

        for ($i=0; $i < sizeof($list_kriteria); $i++) {  
            $y_min[$i] = 999999;
            $y_max[$i] = -999999; 
        } 

        

        foreach ($matriks_ternomalisasi_bobot as $mtb) {
        for ($i=0; $i < sizeof($list_kriteria); $i++) {   
              if ($mtb['nilai'][$i] > $y_max[$i]) {
                $y_max[$i] = $mtb['nilai'][$i];
              }
              if ($mtb['nilai'][$i] < $y_min[$i]) {
                $y_min[$i] = $mtb['nilai'][$i];
              }
            
            
          }
        }
        
        


        foreach ($matriks_ternomalisasi_bobot as $mtb) {
          $temp_pow_dplus = 0;
          $temp_pow_dmin = 0;
          for ($i=0; $i < sizeof($list_kriteria); $i++) {   
            $temp_pow_dmin += pow($mtb['nilai'][$i] - $y_min[$i], 2);
            $temp_pow_dplus += pow($mtb['nilai'][$i] - $y_max[$i], 2);
          }
          $data = [
            'id_alternatif' => $mtb['id_alternatif'],
            'nama_alternatif' => $mtb['nama_alternatif'],
            'pangkat_dplus' => $temp_pow_dplus,
            'pangkat_dmin' => $temp_pow_dmin,
            'akar_dplus' => sqrt($temp_pow_dplus),
            'akar_dmin' => sqrt($temp_pow_dmin)
          ];

          array_push($solusi_ideal, $data);
        }



        
         
        $nilai_preferensi_temp = array();
        foreach ($solusi_ideal as $si) {
          $data = [
            'nilai' => $si['akar_dmin']/($si['akar_dplus'] + $si['akar_dmin']) ,
            'nama_alternatif' => $si['nama_alternatif'],
            'id_alternatif' =>  $si['id_alternatif']
          ];

          array_push($nilai_preferensi_temp, $data);
        }


        


        rsort($nilai_preferensi_temp);

        foreach ($solusi_ideal as $si) {
          $data = [
            'nilai' => $si['akar_dmin']/($si['akar_dplus'] + $si['akar_dmin']) ,
            'nama_alternatif' => $si['nama_alternatif'],
            'rank' =>  array_search($si['id_alternatif'], array_column($nilai_preferensi_temp, 'id_alternatif'))+1
          ];

          array_push($nilai_preferensi, $data);
        }

        $this->data['data_awal'] = $data_awal;
        $this->data['akar_awal'] = $akar_awal;
        $this->data['pangkat_awal'] = $pangkat_awal;
        $this->data['matriks_ternomalisasi'] = $matriks_ternomalisasi;
        $this->data['bobot_kriteria'] = $bobot_kriteria;
        $this->data['matriks_ternomalisasi_bobot'] = $matriks_ternomalisasi_bobot;
        $this->data['y_min'] = $y_min;
        $this->data['y_max'] = $y_max;
        $this->data['solusi_ideal'] = $solusi_ideal;
        $this->data['nilai_preferensi'] = $nilai_preferensi;
        $this->data['hasil_akhir'] = $nilai_preferensi_temp;
        $this->data['list_kriteria'] = $this->Kriteria_m->get();
        $this->data['title']  = 'Hasil Penilaian - SPK. Metode TOPSIS';
        $this->data['index'] = 2;
        $this->data['content'] = 'admin/topsis';
        $this->template($this->data,'admin');
  
      
    } 

// SPK

 
  // -----------------------------------------------------------------------------------------------------------------
       public function profil(){
       
        $this->data['title']  = 'Pengaturan';
        $this->data['index'] = 7;
        $this->data['content'] = 'admin/profil';
        $this->template($this->data,'admin');
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
          redirect('admin/profil');
          exit();

          } elseif ($this->POST('edit2')) { 
            $data = [ 
              'password' => md5($this->POST('pass1')) 
            ];
            
            $this->login_m->update($this->data['email'],$data);
        
            $this->flashmsg('KATA SANDI BARU TELAH TERSIMPAN!', 'success');
            redirect('admin/profil');
            exit();    
          }  

          else{

          redirect('admin/profil');
          exit();
          }

    }

    public function loadnalternatif(){
      if ($this->Alternatif_m->get_num_row(['status' => 0]) != 0) {
       echo   $this->Alternatif_m->get_num_row(['status' => 0]) . ' alternatif baru';
      }
    }

    public function cekpasslama(){ echo $this->login_m->cekpasslama($this->data['email'],$this->input->post('pass')); } 
    public function cekpass(){ echo $this->login_m->cek_password_length($this->input->post('pass1')); }
    public function cekpass2(){ echo $this->login_m->cek_passwords($this->input->post('pass1'),$this->input->post('pass2')); }

 
}

 ?>
