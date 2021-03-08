 <!-- BEGIN Left Aside -->
 <aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="<?php echo base_url('asset/img/logo.png');?>" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">Welcome</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fa fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <img src="<?php echo base_url('asset/img/demo/avatars/avatar-admin.png');?>" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                    <span class="text-truncate text-truncate-sm d-inline-block">
                        <?php 
                            if($this->session->userdata('role') == 1)
                            {
                                echo "Administrator";
                            }
                            else{
                                echo "User";
                            }
                        ?>
                    </span>
                </a>
                <span class="d-inline-block text-truncate text-truncate-sm">Aplikasi Mudik Gratis</span>
            </div>
            <img src="<?php echo base_url('asset/img/card-backgrounds/cover-2-lg.png');?>" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fa fa-angle-down"></i>
            </a>
        </div>
        <ul id="js-nav-menu" class="nav-menu">
            <li>
                <a href="<?php echo site_url('dashboard'); ?>" title="Dashboard">
                    <i class="fa fa-home"></i>
                    <span class="nav-link-text">Beranda</span>
                </a>
            </li>
            <?php 
                if($this->session->userdata('role')==1)
                {
            ?>
                <li>
                    <a href="#" title="Data Master">
                        <i class="fa fa-archive"></i>
                        <span class="nav-link-text">Data Master</span>
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo site_url('moda_transportasi');?>" title="Moda Transportasi" data-filter-tags="application intel introduction">
                                <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Moda Transportasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('rute');?>" title="Rute" data-filter-tags="application intel privacy">
                                <span class="nav-link-text" data-i18n="nav.application_intel_privacy">Rute</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php
                }
                else 
                {
            ?>
                    <li>
                        <a href="<?php echo site_url('tiket/pengajuan_tiket');?>" title="Pengajuan Tiket">
                            <i class="fa fa-credit-card"></i>
                            <span class="nav-link-text">Pengajuan Tiket</span>
                        </a>
                    </li>
            <?php
                }
            ?>
            <?php 
                if($this->session->userdata('role')==1)
                {
            ?>
                    <li>
                        <a href="<?php echo site_url('tiket');?>" title="Konfirmasi Tiket">
                            <i class="fa fa-credit-card"></i>
                            <span class="nav-link-text">Konfirmasi Tiket</span>
                        </a>
                    </li>
            <?php 
                }
            ?>
            
        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>
</aside>
<!-- END Left Aside -->