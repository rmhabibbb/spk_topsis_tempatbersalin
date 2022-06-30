<?php 
class Penilaian_m extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->data['primary_key'] = 'id';
    $this->data['table_name'] = 'penilaian';
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
        return $this->data;
  }
}

 ?>
