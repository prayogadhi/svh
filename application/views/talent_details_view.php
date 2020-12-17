<?php
error_reporting(0);
$t = $tln->row_array();
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default input-group">
            <div class="form-input-group">
                <label>Contact</label>
                <input type="text" name="contact" value="<?php echo $t['contact']; ?>" class="form-control" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-group-default input-group">
            <div class="form-input-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $t['address']; ?>" class="form-control" readonly>
            </div>
        </div>
    </div>
</div>