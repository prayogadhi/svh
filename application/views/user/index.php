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

    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <div class="card card-transparent">
            <div class="card-header ">
                <!-- <div class="card-title">Transaction List
                </div> -->
                <div class="pull-left">
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">Add New</button>
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive-block" id="product_table">
                    <thead>
                        <tr>
                            <th style="width: 30%">user id</th>
                            <th style="width: 30%">name</th>
                            <th style="width: 30%">username</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data->result_array() as $a) :
                            $no++;
                            $id = $a['id'];
                            $name = $a['name'];
                            $username = $a['username'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $username ?></td>
                                <!-- <td>
                                    <img src="<?= base_url('upload/product/') . $image; ?>" class="image-responsive-height">
                                </td> -->
                                <td>
                                    <div class="dropdown pull-right d-none d-lg-block d-xl-block">
                                        <a href="#" class="btn btn-primary btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false"><i class="pg-more"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right action-dropdown">
                                            <a class="dropdown-item" href="#modalHapusPelanggan<?php echo $id ?>" data-toggle="modal" title="Hapus"><i class="fa fa-trash-o"></i> Delete</a>
                                            <a class="dropdown-item" href="#modalEditPelanggan<?php echo $id ?>" data-toggle="modal" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END PLACE PAGE CONTENT HERE -->
</div>
<!-- END PAGE CONTENT -->

<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Create <span class="semi-bold">Account</span></h5>
                </div>

                <div class="modal-body">
                    <form class="p-t-15" method="post" role="form" action="<?= base_url('user/registration'); ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" placeholder="Your Fullname" class="form-control" value="<?= set_value('name'); ?>">
                                </div>
                                <?= form_error('name', '<label class="error pl-3">', '</label>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-group-default">
                                <div class="col-md-12">
                                    <label>username</label>
                                    <input type="text" name="username" placeholder="We will send loging details to you" class="form-control" value="<?= set_value('username'); ?>">
                                </div>
                            </div>
                            <?= form_error('username', '<label class="error pl-3">', '</label>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Password</label>
                                    <input type="password" name="pass1" id="pass1" placeholder="Minimum of 4 Charactors" class="form-control">
                                </div>
                                <?= form_error('pass1', '<label class="error pl-3">', '</label>'); ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Repeat Password</label>
                                    <input type="password" name="pass2" id="pass2" placeholder="Minimum of 4 Charactors" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============ MODAL HAPUS =============== -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['id'];
    $name = $a['name'];
    $username = $a['username'];
?>
    <div id="modalHapusPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Delete <span class="semi-bold">Account</span></h5>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'user/delete_user' ?>">
                    <div class="modal-body">
                        <p>Are you sure you want permanently delete <b><?= $name; ?></b> as an user?</p>
                        <input name="id" type="hidden" value="<?php echo $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes</button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>