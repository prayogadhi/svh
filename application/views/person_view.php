<!-- Modal -->
<div class="modal fade slide-up disable-scroll" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <i class="pg-close fs-14"></i> </button>
                    <h5>Person <span class="semi-bold">form</span></h5>
                </div>
                <div class="modal-body">
                    <form action="#" id="form" role="form">
                        <input type="hidden" value="" name="id" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>First Name</label>
                                    <input name="firstName" placeholder="First Name" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Last Name</label>
                                    <input name="lastName" placeholder="Last Name" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <!-- <span class="help-block"></span> -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label class="control-label col-md-3">DOB</label>
                                    <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                </div>
                                <!-- <span class="help-block"></span> -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Address</label>
                                    <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                </div>
                                <!-- <span class="help-block"></span> -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" id="photo-preview">
                                    <label class="control-label col-md-3">Photo</label>
                                    <div class="col-md-9">
                                        (No photo)
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                                    <div class="col-md-9">
                                        <input name="photo" type="file">
                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 m-t-10 sm-m-t-10">
                                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-block m-t-5">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- /.modal-content -->
    </div>
</div><!-- /.modal-dialog -->

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
                    <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i><span class="font-montserrat fs-12 all-caps">add new</span></button>
                    <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i><span class="font-montserrat fs-12 all-caps">reload</span></button>
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive-block" id="table_person">
                    <thead>
                        <tr>
                            <th style="width:15%">First Name</th>
                            <th style="width:15%">Last Name</th>
                            <th style="width:10%">Gender</th>
                            <th style="width:20%">Address</th>
                            <th style="width:15%">Date of Birth</th>
                            <th style="width:15%">Photo</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END PLACE PAGE CONTENT HERE -->
</div>
<!-- END PAGE CONTENT -->