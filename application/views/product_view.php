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
                            <th style="width: 15%">Code</th>
                            <th style="width: 15%">Product Name</th>
                            <th style="width: 15%">Price</th>
                            <th style="width: 10%">Category</th>
                            <th style="width: 5%">Stock WA</th>
                            <th style="width: 5%">Stock Shopee</th>
                            <th style="width: 5%">Stock Web</th>
                            <th style="width: 20%">Image</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data->result_array() as $a) :
                            $no++;
                            $id = $a['product_code'];
                            $name = $a['name'];
                            $price = $a['price'];
                            $category = $a['category'];
                            $stock1 = $a['stock1'];
                            $stock2 = $a['stock2'];
                            $stock3 = $a['stock3'];
                            $image = $a['image'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                <td class="autonumeric" data-a-sign="Rp " data-a-dec="," data-a-sep="."><?php echo $price; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $stock1; ?></td>
                                <td><?php echo $stock2; ?></td>
                                <td><?php echo $stock3; ?></td>
                                <td>
                                    <img src="<?= base_url('upload/product/') . $image; ?>" class="image-responsive-height">
                                </td>
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
                    <h5>Add <span class="semi-bold">Product</span></h5>
                    <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                </div>

                <?= form_open_multipart('product/add_product'); ?>
                <!-- <form method="post" action="<?php echo base_url() . 'product/add_product' ?>"> -->
                <div class="modal-body">
                    <div class="form-group-attached">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Product Code</label>
                                    <input type="text" name="product_code" class="form-control" value="<?= $productcode; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group form-group-default form-group-default-selectFx">
                                    <label>Category</label>
                                    <select name="category" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
                                        <?php foreach ($categories->result() as $row) : ?>
                                            <option value="<?php echo $row->categories_id; ?>"><?php echo $row->category; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control autonumeric" data-a-sign="Rp " data-a-dec="," data-a-sep="." id="price" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Stock WA</label>
                                    <input type="text" name="stock1" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Stock Shopee</label>
                                    <input type="text" name="stock2" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Stock Web</label>
                                    <input type="text" name="stock3" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Photo</label>
                                    <input class="form-control-file" type="file" name="image" id="image" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('image') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    $product_code = $a['product_code'];
    $name = $a['name'];
    $categories_id = $a['product_categories_id'];
    $category = $a['category'];
    $price = $a['price'];
    $stock1 = $a['stock1'];
    $stock2 = $a['stock2'];
    $stock3 = $a['stock3'];
?>
    <div id="modalEditPelanggan<?php echo $product_code ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Edit <span class="semi-bold">Product</span></h5>
                    </div>

                    <form method="post" action="<?php echo base_url() . 'product/edit_product' ?>">
                        <div class="modal-body">

                            <div class="form-group-attached">
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Product Code</label>
                                            <input type="text" name="product_code" class="form-control" value="<?= $product_code; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default form-group-default-selectFx">
                                            <label>Category</label>
                                            <select name="category" class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select">
                                                <option value="<?php echo $categories_id; ?>"> <?php echo $category; ?> </option>
                                                <?php foreach ($categories->result() as $row) : ?>
                                                    <option value="<?php echo $row->categories_id; ?>"><?php echo $row->category; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Price</label>
                                            <input type="text" name="price" value="<?php echo $price; ?>" class="form-control autonumeric" data-a-sign="Rp " data-a-dec="," data-a-sep="." id="price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Stock WA</label>
                                            <input type="text" name="stock1" value="<?php echo $stock1; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Stock Shopee</label>
                                            <input type="text" name="stock2" value="<?php echo $stock2; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Stock Web</label>
                                            <input type="text" name="stock3" value="<?php echo $stock3; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
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
    $product_code = $a['product_code'];
    $name = $a['name'];
    $category = $a['category'];
    $price = $a['price'];
    $stock = $a['stock1'];
?>
    <div id="modalHapusPelanggan<?php echo $product_code ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Delete <span class="semi-bold">Product</span></h5>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'product/delete_product' ?>">
                    <div class="modal-body">
                        <p>Are you sure you want permanently delete <b><?= $product_code; ?></b> ?</p>
                        <input name="product_code" type="hidden" value="<?php echo $product_code; ?>">
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