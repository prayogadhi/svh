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

            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left m-b-10">
                            <a href="<?php echo base_url('sales/action_sales'); ?>" class="btn btn-block btn-success btn-animated from-top pg pg-plus">
                                <span class="font-montserrat fs-12 all-caps">add new</span>
                            </a>
                        </div>
                        <div class="pull-right">
                            <div class="col-xs-12">
                                <input type="text" id="search_sale_list" class="form-control pull-right" placeholder="Search">
                            </div>
                        </div>
                        <table class="table table-hover table-responsive-block" id="product_table">
                            <thead>
                                <tr>
                                    <th style="width:15%">Tanggal</th>
                                    <th style="width:25%">No Transaksi</th>
                                    <th style="width:20%">Customer</th>
                                    <th style="width:15%">Platform</th>
                                    <th style="width:15%">Total</th>
                                    <th style="width:10%">Status</th>
                                    <th style="width:5%"></th>
                                </tr>
                            </thead>
                            <tbody id="detail_sales">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>
<!-- END PAGE CONTENT -->

<!-- MODAL STICK UP  -->
<div class="modal fade slide-up disable-scroll" id="modal_status_sales" tabindex="-1" role="dialog" aria-labelledby="modal_status_change" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <form action="post" id="form" class="form-horizontal">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="pg-close fs-14"></i>
                        </button>
                        <h5 class="font-monstreat">Status <span class="semi-bold">Transaksi</span></h5>
                    </div>
                    <div id="content_status">
                    </div>
                    <!-- <div class="modal-body text-center m-t-20">
                        <input type="hidden" name="transaction_id">
                        <select class="cs-select cs-skin-slide form-control" name="status">
                            <option value="Proses">Diproses</option>
                            <option value="Kirim">Dikirim</option>
                            <option value="Terima">Diterima</option>
                        </select>
                    </div> -->
                    
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP  -->