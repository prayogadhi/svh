            <!-- START COPYRIGHT -->
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid  container-fixed-lg footer">
                <div class="copyright sm-text-center">
                    <p class="small no-margin pull-left sm-pull-reset">
                        <span class="hint-text">&copy; <?= date('Y'); ?> </span>
                        <span class="hint-text">Memento Project</span>
                        <!-- <span class="hint-text">All rights reserved. </span> -->
                    </p>
                    <p class="small no-margin pull-right sm-pull-reset">
                        <span class="font-montserrat">SVH</span>
                        <span class="hint-text"> management site</span>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END COPYRIGHT -->
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTAINER -->

            <!-- BEGIN VENDOR JS -->
            <script src="<?= base_url('vendor/'); ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/modernizr.custom.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/popper/umd/popper.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript">
            </script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript">
            </script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-actual/jquery.actual.min.js"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
            <script type="text/javascript" src="<?= base_url('vendor/'); ?>assets/plugins/select2/js/select2.full.min.js">
            </script>
            <script type="text/javascript" src="<?= base_url('vendor/'); ?>assets/plugins/classie/classie.js"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/switchery/js/switchery.min.js" type="text/javascript">
            </script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/summernote/js/summernote.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/moment/moment.min.js"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
            <!-- END VENDOR JS -->

            <!-- START DATATABLE JS -->
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
            <script type="text/javascript" src="<?= base_url('vendor/'); ?>assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
            <script type="text/javascript" src="<?= base_url('vendor/'); ?>assets/plugins/datatables-responsive/js/lodash.min.js"></script>
            <!-- END DATATABLE JS -->

            <!-- START TYPEHEAD JS -->
            <script src="<?= base_url('vendor/'); ?>assets/plugins/bootstrap-typehead/typeahead.bundle.min.js"></script>
            <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
            <script src="<?= base_url('vendor/'); ?>assets/plugins/bootstrap-typehead/typeahead.jquery.min.js"></script>
            <!-- END TYPEHEAD JS -->

            <!-- <script src="<?php echo base_url() . 'assets/js/jquery.price_format.min.js' ?>"></script> -->
            <script src="<?php echo base_url() . 'assets/js/moment.js' ?>"></script>

            <!-- BEGIN CORE TEMPLATE JS -->
            <script src="<?= base_url('vendor/'); ?>pages/js/pages.js"></script>
            <script src="<?= base_url('vendor/'); ?>assets/js/datatables.js" type="text/javascript"></script>
            <script src="<?= base_url('vendor/'); ?>assets/js/scripts.js" type="text/javascript"></script>
            <!-- END CORE TEMPLATE JS -->


            <!-- BEGIN FUNCTION SCRIPT -->

            <script>
                $(document).ready(function() {
                    $('.autonumeric').autoNumeric('init', {
                        aSep: '.',
                        aDec: ',',
                        mDec: '0'
                    });
                });

                $('#price').autoNumeric('set', data.data);
            </script>

            <script>
                // $('.custom-file-input').on('change', function() {
                //     let fileName = $(this).val().split('\\').pop();
                //     $(this).next('.custom-file-label').addClass("selected").html(fileName);
                // });
                // $('.table-responsive').on('show.bs.dropdown', function() {
                //     $('.table-responsive').css("overflow", "inherit");
                // });

                // $('.table-responsive').on('hide.bs.dropdown', function() {
                //     $('.table-responsive').css("overflow", "auto");
                // })
            </script>

            <!-- load sales list data -->
            <script>
                $('#detail_sales').load("<?= base_url() . 'sales_list/load_sales_list' ?>");
            </script>

            <!-- load cart data -->
            <script>
                $('#detail_cart').load("<?= base_url() . 'sales/load_cart' ?>");

                $.ajax({
                    type: 'get',
                    url: '<?= base_url() . 'sales/load_total_cart' ?>',
                    dataType: 'json',
                    data: {
                        param: 'test'
                    },
                    success: function(data) {

                        $('#total_v').autoNumeric('set', data.data);
                        $('#total').val(data.data);

                    }
                });


                $(document).on('click', '.remove_cart', function() {
                    var row_id = $(this).attr("id");
                    $.ajax({
                        url: "<?php echo site_url('sales/remove/'); ?>",
                        method: "POST",
                        data: {
                            row_id: row_id
                        },
                        success: function(data) {
                            $('#detail_cart').html(data);
                        }
                    });
                });
            </script>

            <!-- upload product image -->
            <script type="text/javascript">
                $(document).ready(function() {

                    $('#submit').submit(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: '<?php echo base_url(); ?>product/add_product',
                            type: "post",
                            data: new FormData(this),
                            processData: false,
                            contentType: false,
                            cache: false,
                            async: false,
                            success: function(data) {
                                alert("Upload Image Berhasil.");
                            }
                        });
                    });


                });
            </script>


            <script type="text/javascript">
                $(document).ready(function() {
                    $('#mydata').DataTable();
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function() {

                    var table = $('#product_table').DataTable({
                        "processing": true,
                        "order": [
                            [0, "desc"]
                        ],
                        "sDom": "<t><'row'<p i>>",
                        "sPaginationType": "bootstrap",
                        "destroy": true,
                        "scrollCollapse": true,
                        "iDisplayLength": 5,
                        //Set column definition initialisation properties.
                        "columnDefs": [{
                            "targets": [-1], //last column
                            "orderable": false, //set not orderable
                        }],
                    });

                    $('#search-table').keyup(function() {
                        table.search(this.value).draw();
                    });
                });
            </script>

            <!-- BEGIN SALES SCRIPT -->

            <!-- CALCULATE FOR SALES -->
            <script type="text/javascript">
                $(function() {
                    $('#shipping_charges').on("input", function() {
                        var total = $('#total').val();
                        var sc = $('#shipping_charges').val();
                        var hsl = sc.replace(/[^\d]/g, "");
                        $('#sc2').val(hsl);
                        // $('#grand_total').val(parseInt(hsl) + parseInt(total));
                        $('#grand_total').autoNumeric('set', parseInt(hsl) + parseInt(total));
                    })
                });
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#sales_table').dataTable();
                });
            </script>

            <!-- TYPEAHEAD FOR PRODUCT -->
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#productname").focus();
                    $("#productname").on("typeahead:selected", function(evt, item) {
                        var pname = {
                            productname: $(this).val()
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'endorse/get_barang'; ?>",
                            data: pname,
                            success: function(msg) {
                                $('#product_details').html(msg);
                            }
                        });

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'sales/get_barang'; ?>",
                            data: pname,
                            success: function(msg) {
                                $('#detail_barang').html(msg);

                            }
                        });

                    });

                    $("#productname").keypress(function(e) {
                        if (e.which == 13) {
                            $("#jumlah").focus();
                        }
                    });
                });
            </script>

            <!-- TYPEAHEAD FOR PRODUCT -->
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#customer").focus();
                    $("#customer").on("typeahead:selected", function(evt, item) {
                        let pname = {
                            cust_name: $(this).val()
                        };

                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url() . 'customer/get_customer_by_name'; ?>",
                            data: pname,
                            dataType: "JSON",
                            success: function(data) {
                                var json = (data);
                                $('#text_member_id').val(data.data[0].cust_id);
                                $('#text_member_name').val(data.data[0].cust_name);
                                $('#text_member_phone').val(data.data[0].cust_phone);
                                $('#text_email_member').val(data.data[0].cust_email);
                                $('#text_member_address').val(data.data[0].cust_address);
                            }
                        });

                    });

                    $("#customer").keypress(function(e) {
                        if (e.which == 13) {
                            $("#jumlah").focus();
                        }
                    });
                });
            </script>

            <!-- <script type="text/javascript">
                $(document).ready(function() {
                    $("#codeproduct").focus();
                    $("#codeproduct").on("typeahead:selected", function(evt, item) {
                        var productcode = {
                            codeproduct: $(this).val()
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'endorse/get_barang'; ?>",
                            data: productcode,
                            success: function(msg) {
                                $('#product_details').html(msg);
                            }
                        });
                    });

                    $("#codeproduct").keypress(function(e) {
                        if (e.which == 13) {
                            $("#jumlah").focus();
                        }
                    });
                });
            </script> -->

            <!-- TYPEAHEAD GET COSTOMER -->
            <script>
                $(document).ready(function() {
                    let sample_data = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value' + '&nbsp'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        prefetch: '<?= base_url(); ?>customer/fetch',
                        remote: {
                            url: '<?php echo base_url(); ?>customer/fetch/%QUERY',
                            wildcard: '%QUERY'
                        }
                    });

                    $('.customer').typeahead(null, {
                        code: 'sample_data',
                        display: 'cust_name',
                        source: sample_data,
                        limit: 10
                    });
                });
            </script>

            <!-- TYPEAHEAD GET PRODUCT -->
            <script>
                $(document).ready(function() {
                    var sample_data = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value' + '&nbsp'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        prefetch: '<?= base_url(); ?>product/fetch',
                        remote: {
                            url: '<?php echo base_url(); ?>product/fetch/%QUERY',
                            wildcard: '%QUERY'
                        }
                    });

                    $('.product').typeahead(null, {
                        code: 'sample_data',
                        display: 'name',
                        source: sample_data,
                        limit: 10
                    });
                });
            </script>

            <!-- TYPEAHEAD FOR TALENT -->
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#talentname").focus();
                    $("#talentname").on("typeahead:selected", function(evt, item) {
                        var tname = {
                            talentname: $(this).val()
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'endorse/get_talent'; ?>",
                            data: tname,
                            success: function(msg) {
                                $('#detail_talent').html(msg);
                            }
                        });
                    });

                    $("#talentname").keypress(function(e) {
                        if (e.which == 13) {
                            $("#jumlah").focus();
                        }
                    });
                });
            </script>

            <!-- TYPEAHEAD GET TALENT -->
            <script>
                $(document).ready(function() {
                    var sample_data = new Bloodhound({
                        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value' + '&nbsp'),
                        queryTokenizer: Bloodhound.tokenizers.whitespace,
                        prefetch: '<?= base_url(); ?>talent/fetch',
                        remote: {
                            url: '<?= base_url(); ?>talent/fetch/%QUERY',
                            wildcard: '%QUERY'
                        }
                    });

                    $('.talent').typeahead(null, {
                        code: 'sample_data',
                        display: 'name',
                        source: sample_data,
                        limit: 10
                    });
                });
            </script>

            <!-- GLOBAL SCRIPT -->
            <script>
                $('#tableCart').DataTable({
                    "ordering": false,
                    "searching": false,
                    "paging": false,
                    "info": false
                });

                $('#order_date').datepicker({
                    format: 'yyyy-mm-dd'
                    // startDate: '-3d'
                })
                // $("#order_date").datepicker().datepicker('setDate', 'today');
            </script>

            <script>
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
                // Success color: #10CFBD
                elems.forEach(function(html) {
                    var switchery = new Switchery(html, {
                        color: '#10CFBD'
                    });
                });
            </script>

            <script>
                $('.form-check-input').on('change', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/')  ?>" + roleId;
                        }
                    });
                })
            </script>
            <!-- END FUNCTION SCRIPT -->


            <!-- sales status -->
            <script>
                function get_modal_status(id) {
                    save_method = 'update';
                    $('#form')[0].reset(); // reset form on modals
                    let trans_id = {
                        transaction_id: id
                    };

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url() . 'sales_list/ajax_get_sales_by_id'; ?>",
                        data: trans_id,
                        dataType: "JSON",
                        success: function(data) {
                            var json = (data);
                            $('#content_status').empty();
                            add_field_status_sales('content_status', data.data[0].transaction_id);
                            $('[name="transaction_id"]').val(data.data[0].transaction_id);
                            $('[name="status"]').val(data.data[0].status);
                            $('#modal_status_sales').modal('show');
                        }
                    });

                }

                function add_field_status_sales(params, id) {
                    $("#" + params).append("<div class='modal-body text-center m-t-20'><input type='hidden' name='transaction_id'><select class='cs-select cs-skin-slide form-control' onchange='update_status(this,`" + id + "`);' name='status'><option value='Proses'>Diproses</option><option value='Kirim'>Dikirim</option><option value='Terima'>Diterima</option></select></div>");

                }

                function update_status(sel, id) {

                    let temp_data = {
                        transaction_id: id,
                        status: sel.value,
                    };

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() . 'Sales_list/update_status'; ?>",
                        data: temp_data,
                        success: function(data) {
                            $('#detail_sales').html(data);
                            $('#modal_status_sales').modal('hide');

                        }
                    });


                }
            </script>

            </body>

            </html>