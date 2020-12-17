<?php
error_reporting(0);
$b = $brg->row_array();
?>


<table>
    <tr>
        <td style="width: 35%;">
            <div class="form-group form-group-default form-group-default-select2 required">
                <label class="">Stock</label>
                <select id="stock_order" name="stock_order" class="full-width" data-placeholder="Pilih Stock" onchange="get_stock(this,'<?php echo $b['product_code']; ?>');" data-init-plugin="select2" required>
                    <option value="" selected disabled hidden>Pilih Stock</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Shopee">Shopee</option>
                    <option value="Websites">Websites</option>
                </select>
                <input type="hidden" name="name" id="name" value="<?php echo $b['name']; ?>" class="form-control" readonly>
            </div>
        </td>
        <td style="width: 20%;">
            <div class="form-group form-group-default input-group">
                <div class="form-input-group">
                    <label>Jumlah Stock</label>
                    <input type="text" name="stock" id="stock" value="0" class="form-control" readonly>
                </div>
            </div>
        </td>
        <td style="width: 20%;">
            <div class="form-group form-group-default input-group">
                <div class="form-input-group">
                    <label>Harga</label>
                    <input type="hidden" name="price" id="price" value="<?php echo $b['price']; ?>" class="form-control" readonly>
                    <input type="text" value="<?php echo "Rp " . number_format($b['price'],0,',','.'); ?>" class="form-control" readonly>
                </div>
            </div>
        </td>
        <td style="width: 15%;">
            <div class="form-group form-group-default input-group">
                <div class="form-input-group">
                    <label>Discount</label>
                    <input type="number" name="disc" id="disc" value="0" min="0" class="form-control">
                </div>
            </div>
        </td>
        <td style="width: 15%;">
            <div class="form-group form-group-default input-group">
                <div class="form-input-group">
                    <label>Qty</label>
                    <input type="number" name="qty" id="qty" value="1" min="1" max="<?php echo $b['stock']; ?>" class="form-control">
                </div>
            </div>
        </td>
        <td style="width: 9%; padding-left: 5px; padding-bottom: 12px;">
    
             <button type="button" class="add_cart btn btn-rounded btn-success btn-animated from-top fa fa-check" style="padding: 6px 12px;"><span><i class="fa fa-plus"></i></span>
             </button>
             
        </td>
    </tr>
</table>

<!-- Add data sales -->
<script>
                $(document).ready(function(){
                    $(".add_cart").click(function(e){
                        e.preventDefault();
                        var productname = $("#productname").val();;
                        var name        = $("#name").val();
                        var stock       = $("#stock").val();
                        var price       = $("#price").val();
                        var disc        = $("#disc").val();
                        var qty         = $("#qty").val();
                        var stock_order = $("#stock_order").val();
                 
                        $.ajax({
                            type: "POST",
                            url: '<?= base_url() . 'sales/add_to_cart' ?>',
                            data: {productname:productname,name:name,stock:stock,price:price,disc:disc,qty:qty,stock_order:stock_order},
                            success:function(data)
                            {
                                $('#detail_cart').html(data);
                                $("#detail_barang").empty();
                                $.ajax({
                                    type: 'get',
                                    url: '<?= base_url() . 'sales/load_total_cart' ?>',
                                    dataType: 'json',
                                    data: { param: 'test' },
                                    success: function(data) {
                                        $('#total_v').autoNumeric('set', data.data);             
                                        $('#total').val(data.data);
                
                                    }
                                });
                            },
                            error:function()
                            {
                                alert('fail');
                            }
                        });
                    });
                    
                    $(document).on('click','.remove_cart',function(){
                        var row_id=$(this).attr("id"); 
                        $.ajax({
                            url : "<?php echo site_url('sales/remove/');?>",
                            method : "POST",
                            data : {row_id : row_id},
                            success :function(data){
                                $('#detail_cart').html(data);
                                $.ajax({
                                    type: 'get',
                                    url: '<?= base_url() . 'sales/load_total_cart' ?>',
                                    dataType: 'json',
                                    data: { param: 'test' },
                                    success: function(data) {
                                        $('#total_v').autoNumeric('set', data.data);               
                                        $('#total').val(data.data);
                
                                    }
                                });
                            }
                        });
                    });

                });
            </script>
            <!-- End Data sales -->
            <script>
                function get_stock(sel,id) {
                        //                             dataType: 'json'
                        let temp_data = {
                            id_product: id,
                            stock:sel.value,
                        };

                        $.ajax({
                            type: "get",
                            url: "<?php echo base_url() . 'sales/get_stock_barang'; ?>",
                            data: temp_data,
                            dataType: 'json',
                            success: function(data) {
                                $('#stock').val(data.data);
                                $('#qty').val(1);
                                $("#qty").attr({
                                    "max" : data.data,        // substitute your own
                                    "min" : 1          // values (or variables) here
                                });
                                // $('#detail_sales').html(data);
                                // $('#modal_status_sales').modal('hide'); 

                            }
                        });

                       
                }

            </script>
           
             <!-- BEGIN CORE TEMPLATE JS -->
             <script src="<?= base_url('vendor/'); ?>pages/js/pages.js"></script>
            <!-- END CORE TEMPLATE JS -->