<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        
                <div class="menu">
                    <ul class="list">
                        <li class="header">Menu </li>
                        <!-- if unconfirmed -->

                        <?php if ($index == 1): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin')?>">
                                <i class="material-icons">home</i>
                                <span>Beranda</span>
                            </a>
                         </li>  

                        <?php if ($index == 2): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/spk')?>">
                                <i class="material-icons">trending_up</i>
                                <span>SPK. Metode TOPSIS</span>  
                                <?php if ($newalternatif != 0) { ?>
                                    <span class="badge bg-cyan" style="color:white" id="newklinik"><?=$newalternatif?> baru</span>
                                <?php } ?>
                            </a>
                        </li>  

                        <li class="header">Kelola</li>
                        <?php if ($index == 3): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/alternatif')?>">
                                <i class="material-icons">location_city</i>
                                <span>Alternatif</span>
                            </a>
                        </li>  
                        <?php if ($index == 4): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/kriteria')?>">
                                <i class="material-icons">view_list</i>
                                <span>Kriteria</span>
                            </a>
                        </li>  
                        

                        <li class="header">Pengaturan</li>
                        <?php if ($index == 7): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/profil')?>">
                                <i class="material-icons">person</i>
                                <span>Profil</span>
                            </a>
                        </li>  




         
                          <li> 
                            <a href="<?=base_url('logout')?>">
                                <i class="material-icons">input</i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div> 
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                 
            </div>
            <div class="version">
                
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    
    <!-- #END# Right Sidebar -->
</section>
