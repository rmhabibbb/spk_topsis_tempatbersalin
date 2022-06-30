
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/alternatif')?>"><i class="material-icons">location_city</i> Kelola Data alternatif </a> </li>  
                    <li>  Tambah Data alternatif </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>FORM TAMBAH DATA alternatif</h2></center>                          
                        </div>
                        <div class="body"> 

                            <?= form_open_multipart('admin/tambahalternatif/') ?>
    
                              <fieldset>
                                <legend>Data Pengguna</legend>
                                 
                                <div class="form-group">
                                        <div class="form-line">
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label class="control-label">Nama Pemilik alternatif</label>
                                             <input type="text" name="nama_pemilik" class="form-control" placeholder="Masukkan Nama Pemilik alternatif"  required  >
                                             
                                         </div> 
                                         <div class="col-md-6">
                                             <label class="control-label">Email Pemilik alternatif</label>
                                             <input type="email" name="email" class="form-control" placeholder="Masukkan Email Pemilik alternatif"  required  >
                                             
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
                                             <label class="control-label">Nama alternatif</label>
                                             <input type="text" name="nama_alternatif" class="form-control" placeholder="Masukkann Nama  alternatif"  required  >
                                             
                                         </div> 
                                         <div class="col-md-6">
                                             <label class="control-label">Foto</label>
                                             <input type="file" id="foto" name="foto"  class="form-control" placeholder="" required >
                                         </div> 
                                         <div class="col-md-6">
                                             <label class="control-label">Kontak</label>
                                             <input type="text" name="kontak" class="form-control" placeholder="Masukkan Kontak alternatif"  required  >
                                             
                                         </div>
                                         
                                         <div class="col-md-6">
                                             <label class="control-label">Alamat</label>
                                             <textarea class="form-control" placeholder="Masukkan Alamat alternatif"   name="alamat"></textarea>
                                             
                                         </div> 
                                         
                                         
                                         
                                         
                                     </div>
                                 </div>
                              </fieldset>
                                
                                        
                                      
                              
                            <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="tambah" value="Simpan">  <br><br>
                             <?php echo form_close() ?> 

     
                            </div>
                        </div>
                    </div>
            </div>
           
          </div>
        </div>
    </section>
 
 