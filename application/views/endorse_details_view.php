<?php
error_reporting(0);
$b = $brg->row_array();
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default input-group">
            <div class="form-input-group">
                <label>Product Code</label>
                <input type="text" name="name" value="<?php echo $b['product_code']; ?>" class="form-control" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default input-group">
            <div class="form-input-group">
                <label>Stock</label>
                <input type="text" name="stock" value="<?php echo $b['stock']; ?>" class="form-control" readonly>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default input-group">
            <div class="form-input-group">
                <label>Qty</label>
                <input type="number" name="qty" id="qty" value="1" min="1" max="<?php echo $b['stock']; ?>" class="form-control">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-block btn-primary">add to list</button>
    </div>
</div>
<!-- <div style="padding-left: 5px; padding-bottom: 12px;"><button type="submit" class="btn btn-rounded btn-success btn-animated from-top fa fa-check" style="padding: 6px 12px;"><span><i class="fa fa-plus"></i></span></button></div> -->