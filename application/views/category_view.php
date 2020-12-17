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
                     <div class="pull-right">
                         <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><i class="glyphicon glyphicon-plus"></i><span class="font-montserrat fs-12 all-caps">add new</span></a>
                     </div>
                     <!-- <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i><span class="font-montserrat fs-12 all-caps">add new</span></button> -->
                 </div>
                 <!-- <div class="pull-right">
                     <div class="col-xs-12">
                         <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                     </div>
                 </div> -->
                 <div class="clearfix"></div>
             </div>
             <div class="card-body">
                 <table class="table table-hover table-responsive-block" id="mydata">
                     <thead>
                         <tr>
                             <th style="">No</th>
                             <th>Kategori</th>
                             <th style="">Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $no = 0;
                            foreach ($data->result_array() as $a) :
                                $no++;
                                $id = $a['categories_id'];
                                $nm = $a['category'];
                                ?>
                             <tr>
                                 <td style="text-align:center;"><?php echo $no; ?></td>
                                 <td><?php echo $nm; ?></td>
                                 <td style="text-align:center;">
                                     <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                                     <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id ?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                                 </td>
                             </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <!-- END PLACE PAGE CONTENT HERE -->
 </div>
 <!-- END PAGE CONTENT -->

 <!-- ============ MODAL ADD =============== -->
 <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 class="modal-title" id="myModalLabel">Tambah Kategori</h3>
             </div>
             <form class="form-horizontal" method="post" action="<?php echo base_url() . 'category/add_categories' ?>">
                 <div class="modal-body">

                     <div class="form-group">
                         <label class="control-label col-xs-3">Nama Kategori</label>
                         <div class="col-xs-9">
                             <input name="categories" class="form-control" type="text" placeholder="Input Nama Kategori..." style="width:280px;" required>
                         </div>
                     </div>


                 </div>

                 <div class="modal-footer">
                     <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                     <button class="btn btn-info">Simpan</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- ============ MODAL EDIT =============== -->
 <?php
    foreach ($data->result_array() as $a) {
        $id = $a['categories_id'];
        $nm = $a['category'];
        ?>
     <div id="modalEditPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
                 </div>
                 <form class="form-horizontal" method="post" action="<?php echo base_url() . 'category/edit_categories' ?>">
                     <div class="modal-body">
                         <input name="code" type="hidden" value="<?php echo $id; ?>">

                         <div class="form-group">
                             <label class="control-label col-xs-3">Kategori</label>
                             <div class="col-xs-9">
                                 <input name="category" class="form-control" type="text" value="<?php echo $nm; ?>" style="width:280px;" required>
                             </div>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                         <button type="submit" class="btn btn-info">Update</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 <?php
    }
    ?>

 <!-- ============ MODAL HAPUS =============== -->
 <?php
    foreach ($data->result_array() as $a) {
        $id = $a['categories_id'];
        $nm = $a['category'];
        ?>
     <div id="modalHapusPelanggan<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h3 class="modal-title" id="myModalLabel">Hapus Kategori</h3>
                 </div>
                 <form class="form-horizontal" method="post" action="<?php echo base_url() . 'category/delete_categories' ?>">
                     <div class="modal-body">
                         <p>Yakin mau menghapus data..?</p>
                         <input name="code" type="hidden" value="<?php echo $id; ?>">
                     </div>
                     <div class="modal-footer">
                         <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                         <button type="submit" class="btn btn-primary">Hapus</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 <?php
    }
    ?>

 <!--END MODAL-->