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
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div id="card-linear-color" class="card card-default">
                            <div class="card-body">
                                <!-- <form action="<?= base_url() . 'sales/add_to_cart' ?>" method="post"> -->
                                <form role="form" id="form-sales">
                                    <p class="font-montserrat fs-11 all-caps bold m-t-10">basic information</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                    <label>Publish Date</label>
                                                    <input type="text" name="order_date" class="form-control" placeholder="Pick a date" id="order_date">
                                                </div>
                                                <div class="input-group-append ">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default input-group required">
                                                <div class="form-input-group">
                                                    <label>Biaya</label>
                                                    <input type="text" class="form-control autonumeric" data-a-sign="Rp " data-a-dec="," data-a-sep="." id="text_promo_budget">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                    <label>Feedback</label>
                                                    <input type="text" class="form-control" id="text_feedback">
                                                </div>
                                                <div class="input-group-append ">
                                                    <span class="input-group-text"><i class="fa fa-heart"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="font-montserrat fs-11 all-caps bold m-t-10">choose talent</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default typehead">
                                                <label>Nama</label>
                                                <input type="text" name="talentname" id="talentname" class="form-control talent" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="detail_talent">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Product List -->
                    <div class="col-lg-8">
                        <div id="card-circular-color" class="card card-default">
                            <div class="card-header">
                                <div class="card-title">Item List
                                </div>
                                <!-- <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a> -->
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <form action="<?= base_url() . 'sales/add_to_cart' ?>" method="post">
                                            <div class="row">
                                                <div class="form-group form-group-default input-group typehead">
                                                    <div class="form-input-group">
                                                        <label>Product Name</label>
                                                        <input type="text" name="productname" id="productname" class="form-control product" placeholder="Ketikan kode produk">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="product_details">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-9">
                                        <table class="table table-condensed no-footer" id="tableCart">
                                            <thead>
                                                <tr>
                                                    <th style="width:15%"></th>
                                                    <th style="width:35%">Product Code</th>
                                                    <th style="width:35%">Nama Barang</th>
                                                    <th style="width:15%">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($this->cart->contents() as $items) : ?>
                                                    <?= form_hidden($i . '[rowid]', $items['rowid']); ?>
                                                    <tr>
                                                        <td><a href="<?= base_url() . 'sales/remove/' . $items['rowid']; ?>" class="remove-item"><i class="pg-close"></i></a></td>
                                                        <td><?= $items['id']; ?></td>
                                                        <td><?= $items['name']; ?></td>
                                                        <td><?= $items['qty']; ?></td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <form action="<?= base_url() . 'sales/simpan_penjualan' ?>" method="post">
                                        <div class="row m-t-40">
                                            <div class="col-md-3 text-center">
                                                <!-- <button type="submit" class="btn btn-success btn-lg"> Simpan</button> -->
                                            </div>
                                        </div>
                                    </form>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>
<!-- END PAGE CONTENT -->