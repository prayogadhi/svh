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
                    <div class="col-lg-3">
                        <div id="card-linear-color" class="card card-default">
                            <div class="card-body">
                                <!-- <form role="form" id="form-sales"> -->
                                <!-- <p class="font-montserrat fs-11 all-caps bold m-t-10">Informasi Dasar</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default disabled" style="background: #fff; color: #626262;">
                                                <label>Nomor Transaksi</label>
                                                <input type="text" name="transaction_id" class="form-control" style="color: #000;" value="<?= $transaction_id; ?>" id="transaction_id" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default input-group">
                                                <div class="form-input-group">
                                                    <label>Tanggal Order</label>
                                                    <input type="text" name="order_date" class="form-control" placeholder="Pick a date" id="order_date">
                                                </div>
                                                <div class="input-group-append ">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default form-group-default-select2 required">
                                                <label class="">Order from</label>
                                                <select class="full-width" placeholder="Pilih platform yang digunakan" data-init-plugin="select2" id="select_platform">
                                                    <option value="Lazada">Lazada</option>
                                                    <option value="Shoopee">Shoopee</option>
                                                    <option value="Tokopedia">Tokopedia</option>
                                                    <option value="Bukalapak">Bukalapak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                <form action="<?= base_url() . 'sales/simpan_penjualan' ?>" method="post">
                                    <div class="form-group form-group-default input-group typehead">
                                        <div class="form-input-group">
                                            <label>Customer</label>
                                            <input type="text" name="customer" id="customer" class="customer form-control" placeholder="Ketikan nama customer">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                        </div>
                                    </div>
                                    <p class="font-montserrat fs-11 all-caps bold m-t-10">Informasi Customer</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Nama Customer</label>
                                                <input type="text" class="form-control" id="text_member_name" name="cust_name" value="" required>
                                                <input type="hidden" class="form-control" id="text_member_id" name="cust_id" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Nomor Telepon/HP</label>
                                                <input type="text" class="form-control" id="text_member_phone" name="cust_phone" pattern="\d+" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" id="text_email_member" name="cust_email" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="cust_address" id="text_member_address" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /form before -->
                            </div>
                        </div>
                    </div>
                    <!-- Product List -->
                    <div class="col-lg-9">
                        <div id="card-circular-color" class="card card-default">
                            <div class="card-header  ">
                                <div class="card-title">Item List
                                </div>
                                <!-- <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a> -->
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3" style="padding-top: 0.5px; padding-right: 0px;">
                                        <div class="form-group form-group-default input-group typehead">
                                            <div class="form-input-group">
                                                <label>Product Code</label>
                                                <input type="text" name="productname" id="productname" class="form-control product" placeholder="Ketikan kode produk">
                                            </div>
                                            <div class="input-group-append ">
                                                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9" id="detail_barang">
                                    </div>
                                </div>

                                <hr class="my-2" style="display: block; height: 1px; border: 0; border-top: 2px solid red;margin: 1em 0; padding: 0;">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default disabled" style="background: #fff; color: #626262;">
                                            <label>Nomor Transaksi</label>
                                            <input type="text" name="transaction_id" class="form-control" style="color: #000;" value="<?= $transaction_id; ?>" id="transaction_id" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default input-group">
                                            <div class="form-input-group">
                                                <label>Tanggal Order</label>
                                                <input type="text" name="order_date" class="form-control" placeholder="Pick a date" id="order_date" autocomplete="off" required>
                                            </div>
                                            <div class="input-group-append ">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default form-group-default-select2 required">
                                            <label class="">Order from</label>
                                            <select class="full-width" name="order_from" placeholder="Pilih platform yang digunakan" data-init-plugin="select2" id="select_platform">
                                                <option value="WhatsApp">WhatsApp</option>
                                                <option value="Shoopee">Shoopee</option>
                                                <option value="Websites">Websites</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <table class="table table-condensed no-footer" width="100%" id="tableCart">
                                    <thead>
                                        <tr>
                                            <th style="width:6.75%"></th>
                                            <th style="width:18.75%">Nama Barang</th>
                                            <th style="width:18.75%">Stock</th>
                                            <th style="width:16%">Harga</th>
                                            <th style="width:15%">Diskon(Rp)</th>
                                            <th style="width:8.25%">Qty</th>
                                            <th style="width:16%">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detail_cart">

                                    </tbody>
                                </table>
                                <div class="row m-t-40">
                                    <div class="col-md-6 m-b-25">
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default disabled" style="background: #fff; color: #626262;">
                                                        <label>Total</label>
                                                        <input type="text" id="total_v" class="form-control bold autonumeric text-right" data-a-sign="Rp " data-a-dec="," data-a-sep="." style="color: red;" name="total2" readonly>
                                                        <input type="hidden" id="total" name="total" class="form-control" style="text-align:right;margin-bottom:5px;" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label class="fade">Ongkos Kirim</label>
                                                        <!-- <input type="text" class="shipping_charges form-control bold autonumeric text-right" data-a-sign="Rp " data-a-dec="," data-a-sep="." style="color: red;" id="shipping_charges" name="shipping_charges"  required> -->
                                                        <input type="text" id="shipping_charges" name="shipping_charges" class="shipping_charges form-control text-right bold" style="color:#000;" required>
                                                        <input type="hidden" id="shipping_charges2" name="shipping_charges2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h5 class="font-montserrat all-caps small no-margin bold">Grand Total</h5>
                                        <input type="text" readonly="" id="grand_total" name="grand_total" value="" class="no-margin autonumeric text-primary bold BalanceAmount" data-a-sign="Rp " data-a-dec="," data-a-sep="." />
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <button type="submit" class="btn btn-success btn-lg"> Simpan</button>
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
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>
<!-- END PAGE CONTENT -->