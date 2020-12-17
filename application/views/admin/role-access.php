<!-- START PAGE CONTENT WRAPPER -->
<div class="page-content-wrapper ">
    <!-- START PAGE CONTENT -->
    <div class="content ">
        <!-- START JUMBOTRON -->
        <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                <div class="inner">
                    <!-- START BREADCRUMB -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                    <!-- END BREADCRUMB -->
                </div>
            </div>
        </div>
        <!-- END JUMBOTRON -->
        <?= $this->session->flashdata('message'); ?>
        <!-- START CONTAINER FLUID -->
        <div class=" container-fluid   container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid   container-fixed-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <div class="card-header ">
                                <div class="card-title">
                                    Role : <?= $role['role']; ?>
                                </div>
                                <div class="tools">
                                    <a class="collapse" href="javascript:;"></a>
                                    <a class="config" data-toggle="modal" href="#grid-config"></a>
                                    <a class="reload" href="javascript:;"></a>
                                    <a class="remove" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-condensed" id="condensedTable">
                                        <thead>
                                            <tr>
                                                <th style="width:10%">#</th>
                                                <th style="width:50%">Menu</th>
                                                <th style="width:40%">Access</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($menu as $m) : ?>
                                                <tr>
                                                    <td class="v-align-middle semi-bold"><?= $i; ?></td>
                                                    <td class="v-align-middle"><?= $m['menu']; ?></td>
                                                    <td class="v-align-middle semi-bold">
                                                        <input class="form-check-input" type="checkbox" data-init-plugin="switchery" data-size="small" data-color="primary" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" />
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END card -->
                    </div>
                </div>
            </div>
            <!-- END PLACE PAGE CONTENT HERE -->
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
    <!-- END PAGE CONTENT -->