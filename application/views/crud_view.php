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
                <table class="table table-hover table-responsive-block" id="mytable">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- END PLACE PAGE CONTENT HERE -->
</div>
<!-- END PAGE CONTENT -->

<!-- Modal Add Produk-->
<form id="add-row-form" action="<?php echo base_url() . 'index.php/crud/simpan' ?>" method="post">
    <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <select name="kategori" class="form-control" placeholder="Kode Barang" required>
                            <?php foreach ($kategori->result() as $row) : ?>
                                <option value="<?php echo $row->kategori_id; ?>"><?php echo $row->kategori_nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="harga" class="form-control" placeholder="Harga" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="add-row" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Update Produk-->
<form id="add-row-form" action="<?php echo base_url() . 'index.php/crud/update' ?>" method="post">
    <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Produk</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <select name="kategori" class="form-control" placeholder="Kode Barang" required>
                            <?php foreach ($kategori->result() as $row) : ?>
                                <option value="<?php echo $row->kategori_id; ?>"><?php echo $row->kategori_nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="harga" class="form-control" placeholder="Harga" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="add-row" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Hapus Produk-->
<form id="add-row-form" action="<?php echo base_url() . 'index.php/crud/delete' ?>" method="post">
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                    <strong>Anda yakin mau menghapus record ini?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="add-row" class="btn btn-success">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>