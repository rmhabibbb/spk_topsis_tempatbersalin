
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/alternatif')?>"><i class="material-icons">location_city</i> Kelola Data alternatif </a> </li>  
                    <li>  <?=$alternatif->nama_alternatif?></li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>FORM EDIT DATA alternatif</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/tambahalternatif/') ?>
                            <input type="hidden" name="email_x" value="<?=$pemilik->email?>">
                            <input type="hidden" name="id_alternatif" value="<?=$alternatif->id_alternatif?>">
                              <fieldset>
                                <legend>Data Pengguna</legend>
                                 
                                <div class="form-group">
                                    <div class="form-line">
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label class="control-label">Nama Pemilik alternatif</label>
                                             <input type="text" name="nama_pemilik" class="form-control" placeholder="Masukkan Nama Pemilik alternatif"  required  value="<?=$pemilik->nama_pengguna?>">
                                             
                                         </div> 
                                         <div class="col-md-6">
                                             <label class="control-label">Email Pemilik alternatif</label>
                                             <input type="email" name="email" class="form-control" placeholder="Masukkan Email Pemilik alternatif"  required  value="<?=$pemilik->email?>">
                                             
                                         </div> 
                                     </div>
                                   </div>
                                 </div>
                              </fieldset>
                              <fieldset>
                                <legend>Data alternatif</legend>

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
                                             
                                             <?php if($alternatif->foto == NULL){ ?>
                                                <img src="<?=base_url('assets/img/nopic.png')?>" width="100%">
                                            <?php }else { ?>
                                                <img src="<?=base_url('assets/'.$alternatif->foto)?>" width="100%">
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
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
 