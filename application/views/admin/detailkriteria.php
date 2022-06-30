 
 <section class="content" >
    <div class="container-fluid"> 
        <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
          
               
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                        <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                        <li> <a href="<?=base_url('admin/kriteria')?>"><i class="material-icons">assessment</i> Kelola Data Kriteria</a> </li> 
                        <li> <i class="material-icons">class</i> <?=$kriteria->nama_kriteria?> </li>  
                    </ol>
                    <div class="card">
                        
                        <div class="body"> 
                            <table class="table table-bordered table-striped table-hover" style="max-height: 300px">

                                <tbody>
                                    
                                     <tr>
                                         <th style="width: 30%">
                                             ID Kriteria
                                         </th>
                                         <td> 
                                          
                                            <?=$kriteria->id_kriteria?>

                                         </td>
                                     </tr>
                                     <tr>
                                         <th style="width: 30%">
                                             Nama Kriteria
                                         </th>
                                         <td> 
                                          
                                            <?=$kriteria->nama_kriteria?>
 
                                         </td>
                                     </tr>  
                                     <tr>
                                         <th style="width: 30%">
                                             Bobot
                                         </th>
                                         <td> 
                                          
                                            <?=$kriteria->bobot?>
 
                                         </td>
                                     </tr>   
                                   
                                </tbody>

                            </table>  
                            <center>
                            <a data-toggle="modal" data-target="#edit"  href=""><button class="btn bg-cyan">Edit Bobot</button></a> 
                             </center>
                         </div>
                    </div>
                    <div class="card">
                      <div class="header">
                            <center><h2>SUB KRITERIA</h2></center>                          
                        </div>
                        <div class="body">
                        <a data-toggle="modal" data-target="#tambahsub"  href=""><button class="btn bg-cyan">Tambah Sub Kriteria</button></a>

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>NAMA SUB KRITERIA</th> 
                                            <th>BOBOT</th> 
                                            <th>AKSI</th>  
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_sub as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?></a></td>  
                                              <td><?=$row->nama_subkriteria?></td>  
                                              <td><?=$row->bobot?></td>
                                               <td>
                                                    <a data-toggle="modal" data-target="#edit-<?=$row->id_subkriteria?>"  href=""><button class="btn bg-blue">Edit</button></a>
                                                    <a data-toggle="modal" data-target="#delete-<?=$row->id_subkriteria?>"  href=""><button class="btn bg-red">Hapus</button></a>
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
</section>
 
 
 <div class="modal fade" id="edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT DATA KRITERIA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/kriteria')?>" method="Post"  >   
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_kriteria" placeholder="ID Kriteria" required  value="<?=$kriteria->id_kriteria?>" readonly >
                                    </div>
                          </div> 
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">account_box</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bobot" placeholder="Bobot" required  value="<?=$kriteria->bobot?>" step="any" >
                                    </div>
                          </div> 
                         
                          
                        <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="edit" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
    </div> 
 
<div class="modal fade" id="tambahsub" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>TAMBAH DATA SUB KRITERIA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/subkriteria')?>" method="Post"  >  
                            <input type="hidden" class="form-control" name="id_kriteria"   required autofocus  value="<?=$kriteria->id_kriteria?>" >
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Sub Kriteria" required autofocus  >
                                    </div>
                          </div> 
                       
                         <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bobot" placeholder="Bobot" required autofocus   step="any">
                                    </div>
                          </div> 
                        <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="tambah" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 
 

 
<div class="modal fade" id="tambahket" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT DATA SUB KRITERIA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('komisioner/keterangan')?>" method="Post"  >  
                            <input type="hidden" class="form-control" name="id_kriteria"   required autofocus  value="<?=$kriteria->id_kriteria?>" >
                            <input type="hidden" class="form-control" name="id_subkriteria"   required autofocus  value="<?=$id_subkriteria?>" >
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Sub Kriteria" required autofocus  >
                                    </div>
                          </div> 
                          
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="nilai" placeholder="Nilai" required autofocus  >
                                    </div>
                          </div>  
                        <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="tambah" value="Simpan">  <br><br>
                  
                            <?php echo form_close() ?> 
                        </div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
</div> 
 


<?php $i = 1; foreach ($list_sub as $row): ?> 
  <div class="modal fade" id="edit-<?=$row->id_subkriteria?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>EDIT DATA SUBKRITERIA</center></h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url('admin/subkriteria')?>" method="Post"  > 

                            <input type="hidden" value="<?=$kriteria->id_kriteria?>" name="id_kriteria">   
                            <input type="hidden" value="<?=$row->id_subkriteria?>" name="id_subkriteria">   
                            
                            
                          <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Sub Kriteria" required autofocus value="<?=$row->nama_subkriteria?>"  >
                                    </div>
                          </div> 

 
                         <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="bobot" placeholder="Bobot" required autofocus   step="any" value="<?=$row->bobot?>">
                                    </div>
                          </div> 


                            <input  type="submit" class="btn bg-cyan btn-block btn-lg"  name="edit" value="Simpan">  <br><br>
                      
                                <?php echo form_close() ?> 
                            </div> 
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                            </div>
                    </div>
                </div>
    </div> 
<?php endforeach; ?>



<?php $i = 1; foreach ($list_sub as $row): ?> 
 <div class="modal fade" id="delete-<?=$row->id_subkriteria?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data subkriteria?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan subkriteria ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/subkriteria')?>" method="Post" > 
                                        <input type="hidden" value="<?=$kriteria->id_kriteria?>" name="id_kriteria"> 
                                        <input type="hidden" value="<?=$row->id_subkriteria?>" name="id_subkriteria">  
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
<?php endforeach; ?>