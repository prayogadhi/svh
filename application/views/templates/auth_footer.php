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
    <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-ios-list/jquery.ioslist.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url('vendor/'); ?>assets/plugins/select2/js/select2.full.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url('vendor/'); ?>assets/plugins/classie/classie.js"></script>
    <script src="<?= base_url('vendor/'); ?>assets/plugins/switchery/js/switchery.min.js" type="text/javascript">
    </script>
    <script src="<?= base_url('vendor/'); ?>assets/plugins/jquery-validation/js/jquery.validate.min.js"
        type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <script src="<?= base_url('vendor/'); ?>pages/js/pages.min.js"></script>
    <script>
$(function() {
    $('#form-login').validate()
})
    </script>
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url('vendor/'); ?>assets/js/notifications.js" type="text/javascript"></script>
    <script src="<?= base_url('vendor/'); ?>assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script>
$(document).ready(function() {
    // Apply the plugin to the body 
    $('body').pgNotification(options).show();
});
    </script>
    </body>

    </html>