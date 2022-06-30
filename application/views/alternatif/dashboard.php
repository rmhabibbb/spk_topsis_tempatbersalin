  
    <section class="content">
        
          <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?= $this->session->flashdata('msg') ?>
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li> 
                </ol>
                    <div class="card"> 
                        <div class="body">
                            <!-- Nav tabs -->

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                
                                    

                                     
                                        <?php 
                                            if ($alternatif->status == 9) {
                                                echo "<tr><th>Status</th><td>Lengkapi informasi alternatif</td></tr>";
                                            }elseif ($alternatif->status == 0) {
                                                echo "<tr><th>Status</th><td>Menunggu penilaian admin</td></tr>";
                                            }elseif ($alternatif->status == 1) {
                                            ?>
                                            <tr>
                                                <th>Status</th>
                                                <td colspan="<?=sizeof($list_kriteria)?>">Sudah dinilai</td>
                                            </tr>
                                            <tr>
                                                <th>Kriteria</th>
                                                <?php   foreach ($list_kriteria as $k): ?>   
                                                  <th> 
                                                      <?=$k->nama_kriteria?>
                                                  </th>  
                                              <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <th>Nilai</th>
                                                <?php   foreach ($list_kriteria as $k): ?>   
                                                  <td> 
                                                    <?php

                                                      $id = $this->Penilaian_m->get_row(['id_alternatif' => $alternatif->id_alternatif, 'id_kriteria' => $k->id_kriteria])->id_subkriteria;

                                                      echo $this->Subkriteria_m->get_row(['id_subkriteria' => $id])->bobot;

                                                    ?>
                                                  </td>
                                              <?php endforeach; ?>
                                            </tr>
                                        <?php
                                         }

                                        ?> 
                                </tr>
                            </table>
                        </div>
                        
                        <?= form_open_multipart('alternatif/index/') ?>
                        <fieldset> 
                                <div class="form-group">
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label class="control-label">ID alternatif : <?=$alternatif->id_alternatif?></label>
                                             
                                             <hr>


                                             <label class="control-label">Nama alternatif</label>
                                             <input type="text" name="nama_alternatif" class="form-control" placeholder="Masukkann Nama  alternatif"  required  value="<?=$alternatif->nama_alternatif?>">
                                            <hr>

                                            <label class="control-label">Kontak</label>
                                             <input type="text" name="kontak" class="form-control" placeholder="Masukkan Kontak alternatif"  required   value="<?=$alternatif->kontak?>">
                                             <hr>

                                              <label class="control-label">Alamat</label>
                                             <textarea class="form-control" placeholder="Masukkan Alamat alternatif" required  name="alamat"><?=$alternatif->alamat?></textarea>
                                         </div> 
                                         <div class="col-md-6">
                                             <label class="control-label">Foto</label>
                                             <?php if ($alternatif->foto != NULL) { ?> 
                                                <img src="<?=base_url('assets/'.$alternatif->foto)?>" style="width:100%">
                                             <?php }else{ ?>
                                                <img src="<?=base_url('assets/img/nopic.png')?>" style="width:100%">
                                             <?php } ?>
                                             <input type="file" id="foto" name="foto"  class="form-control" placeholder=""  >
                                         </div>  
                                      
                                     </div>
                                 </div>
                              </fieldset>
                                
                            <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="edit" value="Simpan">  <br><br>
                             <?php echo form_close() ?> 

                             
                        </div>
                    </div>

              
       
    </section>


 