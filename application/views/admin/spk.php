
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">trending_up</i> SPK. Metode TOPSIS </li> 
                    <li> Data Penilaian </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>DATA PENILAIAN (<?=sizeof($list_alternatif)?> dari <?=$this->Alternatif_m->get_num_row([''])?> alternatif)</h2></center>                          
                        </div>
                        <div class="body">

                        <a  data-toggle="modal" data-target="#tambah"  href=""><button class="btn bg-cyan">Tambah Penilaian</button></a>
                        <a    href="<?=base_url('admin/topsis')?>"><button class="btn bg-green">Lihat Hasil Penilaian</button></a>

                       <hr>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_alternatif as $row): ?> 

                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama_alternatif?>  </td> 
                                               <?php   foreach ($list_kriteria as $k): ?>   
                                                  <td> 
                                                    <?php

                                                      $id = $this->Penilaian_m->get_row(['id_alternatif' => $row->id_alternatif, 'id_kriteria' => $k->id_kriteria])->id_subkriteria;

                                                      echo $this->Subkriteria_m->get_row(['id_subkriteria' => $id])->nama_subkriteria;

                                                    ?>
                                                  </td>
                                              <?php endforeach; ?>
                                               <td>
                                                   <a data-toggle="modal" data-target="#edit-<?=$row->id_alternatif?>"  href=""><button class="btn btn-block bg-blue">Edit</button></a> <br>
                                                    <a data-toggle="modal" data-target="#delete-<?=$row->id_alternatif?>"  href=""><button class="btn btn-block bg-red">Hapus</button></a>
                                               </td>        
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
 
 
<?php $i = 1; foreach ($list_alternatif as $row): ?> 
 <div class="modal fade" id="delete-<?=$row->id_alternatif?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data penilaian alternatif?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan penilaian alternatif ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/spk')?>" method="Post" >  
                                        <input type="hidden" value="<?=$row->id_alternatif?>" name="id_alternatif">  
                                        <input  type="submit" class="btn bg-red btn-block "  name="hapus" value="Ya">
                                         
                                    </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <button type="button"  class="btn bg-green btn-block" data-dismiss="modal">Tidak</button>
                                    </div>
                            <?php echo form_close() ?> 
                                </div>
                        </div> 
                    </div>
                </div>
    </div>

   <div class="modal fade" id="edit-<?=$row->id_alternatif?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM EDIT DATA PENILAIAN</center></h4>
                        </div>
                        <div class="modal-body">
                         <form action="<?= base_url('admin/spk')?>" method="Post" enctype="multipart/form-data"> 
                         <table class="table table-bordered table-striped table-hover" style="max-height: 300px">
                          <input type="hidden" name="id_alternatif" value="<?=$row->id_alternatif?>">
                                <tbody>
          
                                      <tr>   
                                          <th width="30%">Nama alternatif</th> 
                                          <td width="70%"> 
                                              [<?=$row->id_alternatif?>] <?=$row->nama_alternatif?>
                                          </td> 

                                      </tr>  
                                      <?php $i= 1; foreach ($list_kriteria as $row2): ?>  
 
                                <tr>
                                    <th><?=$row2->nama_kriteria?></th>
                                    <td>
                                        <select class="form-control"  required name="c<?=$row2->id_kriteria?>">
                                           
                                             <?php 
                                             if ( $this->Penilaian_m->get_row(['id_kriteria' => $row2->id_kriteria, 'id_alternatif' => $row->id_alternatif]) == 0) { ?>

                                                <option value="">Pilih</option> 
                                             <?php }else{ 
                                             $nilaix = $this->Penilaian_m->get_row(['id_kriteria' => $row2->id_kriteria, 'id_alternatif' => $row->id_alternatif])->id_subkriteria; ?> ?>
                                             <option value="<?=$nilaix?>"><?=$this->Subkriteria_m->get_row(['id_subkriteria' => $nilaix])->nama_subkriteria?></option> 

                                           <?php } ?>
                                            
                                            <?php $list_param = $this->Subkriteria_m->get(['id_kriteria' => $row2->id_kriteria]);?>
                                              <?php foreach ($list_param as $row2): ?> 
                                              <?php if ($row2->id_subkriteria != $nilaix) { ?>
                                                <option value="<?=$row2->id_subkriteria?>"><?=$row2->nama_subkriteria?></option> 
                                              <?php } endforeach; ?> 

                                         </select> 
                                    </td>
                                </tr>
                                <?php   endforeach; ?>
  
                                </tbody>

                            </table>  

                          <input  type="submit" class="btn bg-cyan btn-block  "  name="edit" value="Simpan">   
                        </form>
                           
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                </div>
  </div> 
<?php endforeach; ?>

 <div class="modal fade" id="tambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>FORM TAMBAH DATA PENILAIAN</center></h4>
                        </div>
                        <div class="modal-body">
                         <form action="<?= base_url('admin/spk')?>" method="Post" enctype="multipart/form-data"> 
                         <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
          
                                      <tr>   
                                          <th width="30%">Nama alternatif</th> 
                                          <td width="70%"> 
                                              <select name="id_alternatif" id="id_alternatif_datapenilaian" class="form-control show-tick" required>
                                                  <option value="">Pilih alternatif</option>
                                                 <?php $i = 1; foreach ($list_alternatif_0 as $row): ?> 
                                                 
                                                     
                                                     <option value="<?=$row->id_alternatif?>" style="text-transform:uppercase">[<?=$row->id_alternatif?>] <?=$row->nama_alternatif?></option>
                                                
                                                  <?php endforeach; ?>
                                                </select>

                                          </td> 
                                      </tr>  
                                    
                                     <?php   foreach ($list_kriteria as $k): ?> 
                                      <tr>   
                                          <th width="50%"><?=$k->nama_kriteria?></th> 
                                          <td width="50%"> 
                                             
                                             <select name="c<?=$k->id_kriteria?>" id="c<?=$k->id_kriteria?>" class="form-control show-tick" required>
                                                  <option value=""> --- Pilih --- </option>  
                                                  <?php $opt = $this->Subkriteria_m->get(['id_kriteria' => $k->id_kriteria]); 
                                                  foreach ($opt as $o) { ?>
                                                     <option value="<?=$o->id_subkriteria?>"><?=$o->nama_subkriteria?></option>  
                                                   <?php } ?>                                                      
                                                </select>

                                          </td> 
                                      </tr> 
                                      <?php endforeach; ?>
                                       
                                </tbody>

                            </table>  

                          <input  type="submit" class="btn bg-cyan btn-block  "  name="tambah" value="Tambah">   
                        </form>
                           
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                </div>
  </div> 