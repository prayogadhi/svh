<!-- START PAGE CONTENT -->
<div class="content ">
    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax">
        <div class="container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
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
                            <th style="width: 21.5%">Name</th>
                            <th style="width: 21.5%">contact</th>
                            <th style="width: 21.5%">Type</th>
                            <th style="width: 25.5%">Address</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data->result_array() as $a) :
                            $no++;
                            $id = $a['talent_id'];
                            $name = $a['name'];
                            $contact = $a['contact'];
                            $type = $a['type'];
                            $address = $a['address'];
                        ?>
                            <tr>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $contact; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $address; ?></td>
                                <td>
                                    <div class="dropdown pull-right d-none d-lg-block d-xl-block">
                                        <a href="#" class="btn btn-primary btn-sm btn-rounded" data-toggle="dropdown" aria-expanded="false"><i class="pg-more"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right action-dropdown">
                                            <a class="dropdown-item" href="#modalHapusPelanggan<?php echo $id ?>" data-toggle="modal" title="Hapus"><i class="fa fa-trash-o"></i> Delete</a>
                                            <a class="dropdown-item" href="#modalEditPelanggan<?php echo $id ?>" data-toggle="modal" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                            <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#" onclick="modal_status(13)"><i class="fa fa-leaf"></i> Status</a> -->
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

<!-- START MODAL ADD -->
<div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Add <span class="semi-bold">talent</span></h5>
                    <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                </div>

                <form method="post" action="<?php echo base_url() . 'talent/add_talent' ?>">
                    <div class="modal-body">
                        <div class="form-group form-group-default">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label style="z-index: 9999 !important;">Phone</label>
                                    <input type="text" name="contact" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default form-group-default-select2">
                                    <label class="">Kategori</label>
                                    <select class="full-width" placeholder="Pilih platform yang digunakan" data-init-plugin="select2" id="select_platform">
                                        <option value="Lazada">Endorse</option>
                                        <option value="Shoopee">Lookbook</option>
                                        <option value="Tokopedia">Peminjam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-default">
                            <label>Address</label>
                            <textarea class="form-control" name="address" id="address" placeholder="Briefly Describe your Abilities" aria-invalid="false"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ============ MODAL EDIT =============== -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['talent_id'];
    $name = $a['name'];
    $contact = $a['contact'];
    $type = $a['type'];
    $address = $a['address'];
?>
    <div id="modalEditPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Edit <span class="semi-bold">talent</span></h5>
                    </div>

                    <form method="post" action="<?php echo base_url() . 'talent/edit_talent' ?>">
                        <div class="modal-body">
                            <div class="form-group form-group-default">
                                <input name="talent_id" type="hidden" value="<?= $id; ?>">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $name; ?>" required>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>contact</label>
                                        <input type="text" name="contact" class="form-control" value="<?= $contact; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>type</label>
                                        <input type="text" name="type" class="form-control" value="<?= $type; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Address</label>
                                <textarea class="form-control" name="address" id="address" aria-invalid="false"><?= $address; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<!-- ============ MODAL HAPUS =============== -->
<?php
foreach ($data->result_array() as $a) {
    $id = $a['talent_id'];
    $name = $a['name'];
    $contact = $a['contact'];
    $type = $a['type'];
    $address = $a['address'];
?>
    <div id="modalHapusPelanggan<?= $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Delete talent</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'talent/delete_talent' ?>">
                    <div class="modal-body">
                        <p>Are you sure?</p>
                        <input name="talent_id" type="hidden" value="<?= $id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>