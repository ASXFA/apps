<!-- ALERT GAGAL LOGIN -->
<?php 
    if ($this->session->flashdata('SE_check')) {
        if($this->session->flashdata('cond')=='0'){
?>
        <script>
            swal({
                title: "Failed !",
                text: "<?= $this->session->flashdata('SE_check') ?>",
                icon: "error",
            });
        </script>
<?php
        }else{
?>
        <script>
            swal({
                title: "Success !",
                text: "<?= $this->session->flashdata('SE_check') ?>",
                icon: "success",
            });
        </script>
<?php
        }
    } 
?>  
<!-- END OF ALERT -->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php $this->load->view('backend/include/header_dekstop') ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="overview-wrap mb-3">
                                <h3 class="ml-4 mt-4 mb-2 d-inline font-weight-normal">
                                    <i class="zmdi zmdi-file-text mr-3"></i>Surat Rekomendasi SE
                                </h3>
                                <span class="float-right mr-3 mt-3">
                                    <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / surat rekomendasi SE
                                </span>
                            </div>
                            <div class="overwiew-wrap">
                                <!-- <span class="m-l-20">
                                    <form action="#" class="d-inline">
                                        <select name="" id="" class="form-control form-control-sm filter">
                                            <option value="nama">Nama</option>
                                            <option value="nik">NIK</option>
                                            <option value="nip">NIP</option>
                                        </select>
                                        <select name="" id="" class="form-control form-control-sm filter">
                                            <option value="nama">Nama</option>
                                            <option value="nik">NIK</option>
                                            <option value="nip">NIP</option>
                                        </select>
                                        <input type="submit" class="btn btn-success btn-sm mt-1" value="Filters">
                                    </form>
                                </span> -->
                                <span class="float-right mr-2">
                                    <input class="form-control" id="searchInput" type="text" placeholder="Search..">
                                </span>
                                <!-- <span class="float-right mr-2">
                                    <a href="<?= base_url('users/listSoftDeleted') ?>" class="btn btn-danger btn-sm mt-1"><i class="zmdi zmdi-time-restore mr-2"></i>List Surat Deleted</a>
                                </span> -->
                                <span class="float-right mr-2">
                                    <a href="#" data-toggle="modal" data-target="#tambahSE" class="btn btn-primary btn-sm mt-1"><i class="fa fa-plus mr-2"></i>Tambah Surat Baru</a>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-data">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>ID Surat</th>
                                            <th>Tipe Surat</th>
                                            <th>Dibuat Pada</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if (empty($se)) {
                                            ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center"> Data tidak ditemukan ! </td>
                                                    </tr>
                                            <?php 
                                                }else{
                                                    date_default_timezone_set('Asia/Bangkok');
                                                    $no = 1;
                                                    foreach($se as $s):
                                                        // encrypt id
                                                        $id_encrypt = str_replace(array('=','+','/'),array('-','_','~'),$this->encrypt->encode($s->se_id).'');
                                            ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $id_encrypt ?></td>
                                                            <td><?= 'Tipe '.$s->se_tipe ?></td>
                                                            <td><?= date('d F Y - H:i:s',strtotime($s->created_at)).' wib' ?></td>
                                                            <td>
                                                                <?php 
                                                                    if ($s->se_status == 0) {
                                                                        echo "<span class='badge badge-danger p-2'> Belum ditandatangani ";
                                                                    }else if($s->se_status == 1){
                                                                        echo "<span class='badge badge-info p-2'> Menunggu ditandatangani ";
                                                                    }else if ($s->se_status == 2) {
                                                                        echo "<span class='badge badge-success p-2'> Sudah ditandatangani ";
                                                                    }
                                                                ?>
                                                                </span> 
                                                            </td>
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    <a href="<?= base_url('Surat_rekomendasi_SE/detail/'.$id_encrypt) ?>" class="item item-info"  title="Detail">
                                                                        <i class="zmdi zmdi-eye"></i>
                                                                    </a>
                                                                    <a id="delete-se<?= $no ?>" href="<?= base_url('Surat_rekomendasi_SE/delete/'.$id_encrypt) ?>" class="item item-danger"  title="Hapus">
                                                                        <i class="zmdi zmdi-delete"></i>
                                                                    </a>
                                                                    <!-- script ALERT DELETE -->
                                                                    <script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
                                                                    <script>
                                                                        $('#delete-se<?= $no ?>').on('click', function (e) {
                                                                            e.preventDefault();
                                                                            const url = $(this).attr('href');
                                                                            swal({
                                                                                title: 'Are you sure?',
                                                                                text: 'This record and it`s details will be deleted but not permanently !',
                                                                                icon: 'warning',
                                                                                buttons: ["Cancel", "Yes!"],
                                                                            }).then(function(value) {
                                                                                if (value) {
                                                                                    swal({
                                                                                        title: "Your Data has been deleted! but not permanently ",
                                                                                        text: "Please wait, This alert will close automaticly and reload the page :) ",
                                                                                        icon: "success",
                                                                                        showConfirmButton: false
                                                                                    });
                                                                                    setTimeout(function(){
                                                                                        window.location.href = url;
                                                                                    },1000);
                                                                                }else{
                                                                                    swal("Okay :) ");
                                                                                }
                                                                            });
                                                                        });
                                                                    </script>
                                                                    <!-- END SCRIPT ALERT DELETE -->
                                                                </div>
                                                            </td>
                                                        </tr>
                                            <?php
                                                    $no++;
                                                    endforeach;
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>

<!-- modal Tambah TTE -->
<div class="modal fade" id="tambahSE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="exampleModalLabel">Surat Rekomendasi SE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= base_url('Surat_rekomendasi_SE/add') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tipeSE" class="form-control-label">Pilih Tipe Surat </label>
                <select name="tipeSE" id="tipeSE" class="form-control" required>
                    <option value="">-- PILIH --</option>
                    <option value="1">Tipe 1</option>
                    <option value="2">Tipe 2</option>
                </select>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="kop_surat" class="form-control-label">Upload Kop Surat </label>
                        <input type="file" name="kop_surat" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="unit_organisasi" class="form-control-label">Masukan Unit Organisasi : </label>
                        <input type="text" name="unit_organisasi" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sistem" class="form-control-label">Sistem : </label>
                        <input type="text" name="sistem" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="unit_organisasi" class="form-control-label">Kegunaan : </label>
                        <select name="kegunaan" id="kegunaan" class="form-control" required>
                            <option value="">-- PILIH --</option>
                            <option value="Tanda Tangan Elektronik">1.	Tanda Tangan Elektronik</option>
                            <option value="Proteksi Email">2.	Proteksi Email</option>
                            <option value="SSL Client Authentication">3.	SSL Client Authentication</option>
                            <option value="SSL Server Authentication">4.	SSL Server Authentication</option>
                            <option value="Proteksi Email & Tanda Tangan Elektronik">5.     Proteksi Email & Tanda Tangan Elektronik</option>
                            <option value="Tanda Tangan Elektronik & SSL Client Authentication">6.	Tanda Tangan Elektronik & SSL Client Authentication</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" id="userTipe1">
                <div class="col-lg">
                    <label for="userTip1" class="form-control-label">Pilih 1 User</label>
                    <select name="userTipe1" id="" class="form-control" required>
                        <?php foreach($usersModal as $u): ?>
                            <option value="<?= $u->user_id ?>"><?= $u->user_nama." - ".$u->user_nik ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row" id="userTipe2">
                <div class="col-lg">
                    <label for="userTip1" class="form-control-label">Pilih User</label>
                    <span class="float-right mr-2">
                        <input class="form-control form-control-sm" id="searchInputModal" type="text" placeholder="Search..">
                    </span>
                    <table class="table" id="table">
                        <thead>
                            <th></th>
                            <th>Nama</th>
                            <th>NIK</th>
                        </thead>
                        <tbody>
                            <?php foreach($usersModal as $u): ?>
                            <tr>
                                <td><input type="checkbox" name="userTipe2[]" value="<?= $u->user_id ?>"></td>
                                <td><?= $u->user_nama ?></td>
                                <td><?= $u->user_nik ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-success" value="Simpan">
        </div>
    </form>
    </div>
  </div>
</div>
<!-- end modal Tambah TTE -->

<script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
<!-- function SEARCH -->
<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!-- function SEARCH -->
<script>
    $(document).ready(function(){
        $("#searchInputModal").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!-- function PAGINATION -->
<script src="<?= base_url('assets/backend/') ?>vendor/jquery.tablePagination.js"></script>
<script>
    $('table').tablePagination({
        perPage: 5,
        paginationClass:'tablePagination'
    });
</script>
<script>
    $(document).ready(function(){
        $('#userTipe1').hide();
        $('#userTipe2').hide();
      $('#tipeSE').on('change', function(){
          var get = $('#tipeSE').val();
          if (get == 1) {
              $('#userTipe1').show();
              $('#userTipe2').hide();
          }else{
              $('#userTipe1').hide();
              $('#userTipe2').show();
          }
      })  
    })
</script>
