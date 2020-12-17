    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
        <!-- BEGIN SIDEBAR MENU HEADER-->
        <div class="sidebar-header">
            <img src="assets/img/logo_white.png" alt="logo" class="brand" data-src="<?= base_url(); ?>/assets/img/logo_white.png" data-src-retina="<?= base_url(); ?>/assets/img/logo_white_2x.png" width="78" height="22">
            <div class="sidebar-header-controls">
                <button type="button" class="btn btn-link d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none m-l-50" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
                </button>
            </div>
        </div>
        <!-- END SIDEBAR MENU HEADER-->
        <!-- START SIDEBAR MENU -->
        <div class="sidebar-menu m-t-30">

            <!-- START Query for menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu` 
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC
                         ";

            $menu = $this->db->query($queryMenu)->result_array();

            ?>
            <!-- END Query for menu -->

            <!-- BEGIN SIDEBAR MENU ITEMS-->
            <ul class="menu-items">
                <?php foreach ($menu as $m) : ?>
                    <?php
                        $menuId =  $m['id'];
                        $querySubMenu = "SELECT *
                                    FROM `user_sub_menu` JOIN `user_menu` 
                                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                    WHERE `user_sub_menu`.`menu_id` = $menuId
                                    AND `user_sub_menu`.`is_active` = 1
                                    ";

                        $subMenu = $this->db->query($querySubMenu)->result_array();
                        ?>

                    <?php foreach ($subMenu as $sm) : ?>

                        <?php if ($title == $sm['title']) : ?>
                            <li class="active">
                            <?php else : ?>
                            <li class="">
                            <?php endif; ?>
                            <a href="<?= base_url($sm['url']); ?>" class="detailed">
                                <?= $sm['title']; ?>
                            </a>
                            <?php if ($title == $sm['title']) : ?>
                                <span class="bg-success icon-thumbnail">
                                <?php else : ?>
                                    <span class="icon-thumbnail">
                                    <?php endif; ?>
                                    <i class="<?= $sm['icon']; ?>"></i>
                                    </span>
                            </li>
                        <?php endforeach; ?>

                    <?php endforeach; ?>


                    <!-- <li>
                        <a href="javascript:;"><span class="title">Calendar</span>
                            <span class=" arrow"></span></a>
                        <span class="icon-thumbnail"><i class="pg-calender"></i></span>
                        <ul class="sub-menu">
                            <li class="">
                                <a href="calendar.html">Basic</a>
                                <span class="icon-thumbnail">c</span>
                            </li>
                            <li class="">
                                <a href="calendar_lang.html">Languages</a>
                                <span class="icon-thumbnail">L</span>
                            </li>
                            <li class="">
                                <a href="calendar_month.html">Month</a>
                                <span class="icon-thumbnail">M</span>
                            </li>
                            <li class="">
                                <a href="calendar_lazy.html">Lazy load</a>
                                <span class="icon-thumbnail">La</span>
                            </li>
                        </ul>
                    </li> -->
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->