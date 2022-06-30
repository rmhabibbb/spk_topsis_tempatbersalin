
    
<section class="content">
    <div class="container-fluid">
            <?= $this->session->flashdata('msg') ?>
        <div class="row clearfix">
                 
            <div class="col-xs-12   col-sm-12  col-md-12   col-lg-12 ">
                <ol class="breadcrumb breadcrumb-bg-cyan align-left">
                    <li><a href="<?=base_url()?>"><i class="material-icons">apps</i> Beranda</a></li>
                    <li> <i class="material-icons">location_city</i> Kelola Data Alternatif </li> 
                </ol>
                <div class="card">
                      <div class="header">
                            <center><h2>KELOLA DATA ALTERNATIF</h2></center>                          
                        </div>
                        <div class="body">

                        <a    href="<?=base_url('admin/tambahalternatif')?>"><button class="btn bg-cyan">Tambah alternatif</button></a>

                       

                            <div class="table-responsive">
                                 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>   
                                            <th>NO</th> 
                                            <th>Nama alternatif </th>
                                            <th>Email</th> 
                                            <th>Nama Pemilik</th>   
                                            <th>Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                      <?php $i = 1; foreach ($list_alternatif as $row): ?> 
                                          <tr>   
                                              <td><?=$i++?> </td>  
                                              <td><?=$row->nama_alternatif?>  </td> 
                                              <td> <?=$row->email?></td>   
                                               <td><?=$this->login_m->get_row(['email' => $row->email])->nama_pengguna?></td> 
                                               <td>
                                                  <a href="<?=base_url('admin/alternatif/'.$row->id_alternatif)?>"> 
                                                    <button class="btn bg-cyan ">
                                                      Lihat
                                                    </button>
                                                  </a>
                                                   <a data-toggle="modal" data-target="#delete-<?=$row->id_alternatif?>"  href=""><button class="btn bg-red">Hapus</button></a>
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
                            <h4 class="modal-title" id="defaultModalLabel"><center>Hapus data alternatif?</center></h4> 
                            <center><span style="color :red"><i>Semua data yang terkait dengan alternatif ini akan dihapus.</i></span></center>
                        </div>
                        <div class="modal-body"> 
                       
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                        <form action="<?= base_url('admin/tambahalternatif')?>" method="Post" >  
                                        <input type="hidden" value="<?=$row->email?>" name="email">  
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