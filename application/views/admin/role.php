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
        <?= form_error('menu', '<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert"></button><strong>Success: </strong>', '</div>'); ?>

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
                                    <a href="" class="btn btn-block btn-success btn-animated from-top pg pg-plus" data-toggle="modal" data-target="#addRole">
                                        <span class="font-montserrat fs-12 all-caps">add new</span>
                                    </a>
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
                                                <th style="width:50%">Role</th>
                                                <th style="width:40%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($role as $r) : ?>
                                                <tr>
                                                    <td class="v-align-middle semi-bold"><?= $i; ?></td>
                                                    <td class="v-align-middle"><?= $r['role']; ?></td>
                                                    <td class="v-align-middle semi-bold">
                                                        <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                                                        <a href="" class="badge badge-success">edit</a>
                                                        <a href="" class="badge badge-danger">delete</a>
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

    <!-- START MODAL -->
    <!-- Modal -->
    <div class="modal fade slide-up disable-scroll" id="addRole" tabindex="-1" role="dialog" aria-labelledby="addRoleLabel" aria-hidden="false">
        <div class="modal-dialog ">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="pg-close fs-14"></i>
                        </button>
                        <h5>Add <span class="semi-bold">new role</span></h5>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="<?= base_url('admin/role'); ?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="p-t-20 clearfix p-l-10 p-r-10">
                                    </div>
                                </div>
                                <div class="col-md-4 m-t-10 sm-m-t-10">
                                    <button type="submit" class="btn btn-primary btn-block m-t-5">Add</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->
    <!-- END MODAL -->