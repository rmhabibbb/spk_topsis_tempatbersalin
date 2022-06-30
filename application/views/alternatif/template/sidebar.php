<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">

        <!-- Menu -->
        <div class="menu">
            <ul class="list"> 
                <li class="header">Menu</li>
                <!-- if unconfirmed -->

                <?php if ($index == 1): ?>
                  <li class="active">
                <?php else: ?>
                  <li>
                <?php endif; ?>
                    <a href="<?=base_url('alternatif')?>">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li> 
                <?php if ($index == 7): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('alternatif/profil')?>">
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
