
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">trending_up</i> SPK. Metode TOPSIS </li> 
                    <li> Hasil Penilaian </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>SPK. METODE TOPSIS</h2></center>                          
                        </div>
                        <div class="body">

                         
                            <h3>Data Awal : <?=sizeof($data_awal)?> alternatif</h3>
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>No.</th> 
                                            <th>Nama alternatif </th> 
                                            <?php   foreach ($list_kriteria as $k): ?>   
                                                  <th> 
                                                      <?=$k->nama_kriteria?>
                                                  </th>  
                                              <?php endforeach; ?>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($data_awal as $row): ?> 

                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row['nama_alternatif']?>  </td>  
                                               <?php for ($x=0; $x < sizeof($list_kriteria); $x++) { 
                                                  echo "<th>".$row['nilai'][$x]."</th>";
                                                } 
                                                ?>
                                               
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-striped table-hover ">
                                    
                                        <tr>   
                                            <th>Pangkat</th> 
                                            <?php for ($i=0; $i < sizeof($list_kriteria) ; $i++) { 
                                              echo "<th>".$pangkat_awal[$i]."</th>";
                                            } 
                                            ?>
                                        </tr>
                                        <tr>   
                                            <th>Akar</th>  
                                            <?php for ($i=0; $i < sizeof($list_kriteria); $i++) { 
                                              echo "<th>".number_format($akar_awal[$i],4)."</th>";
                                            } 
                                            ?>
                                        </tr>
                                    
                                </table>
                                 
                            </div>
                            <hr>
                            <h3>Langkah 1 : Matriks Ternomalisasi</h3>
                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>No.</th> 
                                            <th>Nama alternatif </th> 
                                            <?php   foreach ($list_kriteria as $k): ?>   
                                                  <th> 
                                                      <?=$k->nama_kriteria?>
                                                  </th>  
                                              <?php endforeach; ?>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($matriks_ternomalisasi as $row): ?> 

                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row['nama_alternatif']?>  </td>  
                                               <?php for ($x=0; $x < sizeof($list_kriteria); $x++) { 
                                                  echo "<th>".$row['nilai'][$x]."</th>";
                                                } 
                                                ?>
                                               
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>  
                            </div>
                            <hr>
                            <h3>Langkah 2 : Matriks Ternomalisasi Bobot</h3>

                            <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                    
                                        <tr>   
                                            <th></th> 
                                            <?php   foreach ($list_kriteria as $k): ?>   
                                                  <th> 
                                                      <?=$k->nama_kriteria?>
                                                  </th>  
                                              <?php endforeach; ?>
                                        </tr>
                                        <tr>   
                                            <th>Bobot Kriteria</th>  
                                            <?php for ($i=0; $i < sizeof($list_kriteria); $i++) { 
                                              echo "<th>".$bobot_kriteria[$i]."</th>";
                                            } 
                                            ?>
                                        </tr>
                                    
                                </table>
                              </div>
                              <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>No.</th> 
                                            <th>Nama alternatif </th> 
                                            <?php   foreach ($list_kriteria as $k): ?>   
                                                  <th> 
                                                      <?=$k->nama_kriteria?>
                                                  </th>  
                                              <?php endforeach; ?>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($matriks_ternomalisasi_bobot as $row): ?> 

                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row['nama_alternatif']?>  </td>  
                                               <?php for ($x=0; $x < sizeof($list_kriteria); $x++) { 
                                                  echo "<th>".$row['nilai'][$x]."</th>";
                                                } 
                                                ?>
                                          </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                </table>  
                            </div>
                            <hr>
                            <h3>Langkah 3 : Matriks Solusi Positif dan Negatif</h3>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                    
                                        <tr>   
                                            <th rowspan="2" style="vertical-align: middle;"><center>Y<sup>+</sup></th> 
                                            
                                            <?php for ($i=0; $i < sizeof($list_kriteria); $i++) { 
                                                 echo "<th><center>Y".$i."<sup>+</sup></th> ";
                                               } 
                                            ?>
                                        </tr>
                                         <tr>    
                                            
                                            <?php for ($i=0; $i < sizeof($list_kriteria); $i++) { 
                                                 echo "<td>".number_format($y_max[$i],5)."</td> ";
                                               } 
                                            ?>
                                        </tr>

                                         <tr>   
                                            <th rowspan="2" style="vertical-align: middle;"><center>Y<sup>-</sup></th> 
                                            
                                            <?php for ($i=0; $i < sizeof($list_kriteria); $i++) { 
                                                 echo "<th><center>Y".$i."<sup>-</sup></th> ";
                                               } 
                                            ?>
                                        </tr>
                                         <tr>    
                                            
                                            <?php for ($i=0; $i < sizeof($list_kriteria); $i++) { 
                                                 echo "<td>".number_format($y_min[$i],5)."</td> ";
                                               } 
                                            ?>
                                        </tr>
                                </table>
                              </div>

                              <hr>
                              <h3>Langkah 4 : Jarak Alternatif Solusi Ideal Positif & Negatif</h3>
                              <div class="row">
                                     
                                <div class="col-xs-6   col-sm-6  col-md-6   col-lg-6 ">
                                    <div class="table-responsive">
                                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                          <thead>
                                              <tr>   
                                                  <th>No.</th> 
                                                  <th>Nama alternatif </th>
                                                  <th>Pangkat</th> 
                                                  <th>D<sup>+</sup></th>   
                                              </tr>
                                          </thead> 
                                          <tbody>
                                            <?php $i = 1; foreach ($solusi_ideal as $row): ?> 

                                                <tr>   
                                                    <td><?=$i++?> </td>  
                                                    <td><?=$row['nama_alternatif']?>  </td> 
                                                    <td><?= number_format($row['pangkat_dplus'],4) ?>  </td> 
                                                    <td><?=$row['akar_dplus']?>  </td>  
                                                     
                                                </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                      </table>  
                                  </div>
                                </div>
                                <div class="col-xs-6   col-sm-6  col-md-6   col-lg-6 ">
                                    <div class="table-responsive">
                                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                          <thead>
                                              <tr>   
                                                  <th>No.</th> 
                                                  <th>Nama alternatif </th>
                                                  <th>Pangkat</th> 
                                                  <th>D<sup>-</sup></th>   
                                              </tr>
                                          </thead> 
                                          <tbody>
                                            <?php $i = 1; foreach ($solusi_ideal as $row): ?> 

                                                <tr>   
                                                    <td><?=$i++?> </td>  
                                                    <td><?=$row['nama_alternatif']?>  </td> 
                                                    <td><?= number_format($row['pangkat_dmin'],4) ?>  </td> 
                                                    <td><?=$row['akar_dmin']?>  </td>  
                                                     
                                                </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                      </table>  
                                  </div>
                                </div>
                              </div>

                              <hr>
                              <h3>Langkah 5 : Nilai Preferensi </h3>
                              <div class="table-responsive">
                                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                          <thead>
                                              <tr>   
                                                  <th>No.</th> 
                                                  <th>Nama alternatif </th>
                                                  <th>D</th> 
                                                  <th>Ranking</th>   
                                              </tr>
                                          </thead> 
                                          <tbody>
                                            <?php $i = 1; foreach ($nilai_preferensi as $row): ?> 

                                                <tr>   
                                                    <td><?=$i++?> </td>  
                                                    <td><?=$row['nama_alternatif']?>  </td> 
                                                    <td><?= $row['nilai'] ?>  </td> 
                                                    <td><?=$row['rank']?>  </td>  
                                                     
                                                </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                      </table>  
                                  </div>
                                <hr>
                              <h3>Perankingan</h3>
                              <div class="table-responsive">
                                       <table class="table table-bordered table-striped table-hover  dataTable js-exportable">
                                          <thead>
                                              <tr>   
                                                  <th>Rank.</th> 
                                                  <th>Nama alternatif </th> 
                                                  <th>Nama Pemilik </th> 
                                                  <th>Email </th> 
                                                  <th>Kontak</th> 
                                                  <th>Alamat</th> 
                                              </tr>
                                          </thead> 
                                          <tbody>
                                            <?php $i = 1; foreach ($hasil_akhir as $row): ?> 

                                            <?php $alternatif = $this->Alternatif_m->get_row(['id_alternatif' => $row['id_alternatif']]) ?>

                                                <tr>   
                                                    <td><?=$i++?> </td>  
                                                    <td><?=$row['nama_alternatif']?>  </td>  
                                                    <td><?=$this->login_m->get_row(['email' => $alternatif->email])->nama_pengguna?></td>
                                                    <td><?=$alternatif->email?></td>
                                                    <td><?=$alternatif->kontak?></td>
                                                    <td><?=$alternatif->alamat?></td>
                                                     
                                                </tr>
                                            <?php endforeach; ?>
                                          </tbody>
                                      </table>  
                                  </div>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
  