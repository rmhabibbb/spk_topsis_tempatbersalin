<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        
        <div class="menu">
            <ul class="list"> 
                <!-- if unconfirmed -->

                <?php if ($index == 1): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('beranda')?>">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li> 


                <?php if ($index == 2): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('beranda/spk')?>">
                        <i class="material-icons">location_city</i>
                        <span>Tempat Praktek Bersalin</span>
                    </a>
                </li> 


                <?php if ($index == 3): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('beranda/cari')?>">
                        <i class="material-icons">search</i>
                        <span>Cari Praktek Bersalin</span>
                    </a>
                </li> 
                <?php if ($index == 4): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('beranda/login')?>">
                        <i class="material-icons">input</i>
                        <span>Masuk/Daftar</span>
                    </a>
                </li> 
                  
                </li>
            </ul> 
                
        </div>


        <!-- #Menu -->
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
