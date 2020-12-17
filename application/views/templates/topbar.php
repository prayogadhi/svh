    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
        <!-- START HEADER -->
        <div class="header">
            <!-- START MOBILE SIDEBAR TOGGLE -->
            <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
            </a>
            <!-- END MOBILE SIDEBAR TOGGLE -->
            <div class="">
                <div class="brand inline   ">
                    <img src="<?= base_url(); ?>/assets/img/logo.png" alt="logo" data-src="<?= base_url(); ?>/assets/img/logo.png" data-src-retina="<?= base_url(); ?>/assets/img/logo_2x.png" width="78" height="22">
                </div>
                <a href="#" class="search-link d-lg-inline-block d-none" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a>
            </div>
            <div class="d-flex align-items-center">
                <!-- START User Info-->
                <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
                    <span class="semi-bold"> <?= $user['name']; ?> </span>
                </div>
                <div class="dropdown pull-right d-lg-block d-none">
                    <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="thumbnail-wrapper d32 circular inline">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="" data-src="<?= base_url('assets/img/profile/') . $user['image']; ?>" data-src-retina="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="32" height="32">
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                        <a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
                        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item"><i class="pg-power"></i> Logout</a>
                    </div>
                </div>
                <!-- END User Info-->
            </div>
        </div>
        <!-- END HEADER -->
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">