<!-- ALERT GAGAL LOGIN -->
<?php 
    if ($this->session->flashdata('request_check')) {
        if($this->session->flashdata('cond')=='0'){
?>
        <script>
            swal({
                title: "Failed !",
                text: "<?= $this->session->flashdata('request_check') ?>",
                icon: "error",
            });
        </script>
<?php
        }else{
?>
        <script>
            swal({
                title: "Success !",
                text: "<?= $this->session->flashdata('request_check') ?>",
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
                                    <i class="zmdi zmdi-file-text mr-3"></i>Request
                                </h3>
                                <span class="float-right mr-3 mt-3">
                                    <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / Request
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
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-data">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>Request Dari</th>
                                            <th>Pesan</th>
                                            <th>Specimen</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if (empty($req)) {
                                            ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center"> Data tidak ditemukan ! </td>
                                                    </tr>
                                            <?php 
                                                }else{
                                                    $no = 1;
                                                    foreach($req as $r):
                                                        $id_encrypt = str_replace(array('=','+','/'),array('-','_','~'),$this->encrypt->encode($r->req_id).'');
                                                        $id_encrypt_surat = str_replace(array('=','+','/'),array('-','_','~'),$this->encrypt->encode($r->req_surat).'');
                                            ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td>
                                                                <?php 
                                                                    foreach($users as $user):
                                                                        if($user->user_id == $r->req_user_id){
                                                                            echo $user->user_nama;
                                                                        }
                                                                    endforeach
                                                                ?>
                                                            </td>
                                                            <td><?= $r->req_message ?></td>
                                                            <td>
                                                                <?php 
                                                                    if($r->req_specimen == 1){
                                                                        echo "IMAGE";
                                                                    }else if($r->req_specimen == 2){
                                                                        echo "INVISIBLE";
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if ($r->req_status == 0) {
                                                                        echo "<span class='badge badge-danger p-2'> Perlu ditandatangani ";
                                                                    }else if($r->req_status == 1){
                                                                        echo "<span class='badge badge-success p-2'> Telah ditandatangani ";
                                                                    }
                                                                ?>
                                                                </span> 
                                                            </td>
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    <?php 
                                                                        if ($r->req_status == 0) {
                                                                    ?>
                                                                    <a href="<?= base_url('request/sign/'.$id_encrypt.'/'.$id_encrypt_surat) ?>" class="btn btn-outline-success"  title="Detail"> Tandatangan Sekarang 
                                                                    </a>
                                                                    <?php }else{ ?>
                                                                    <a href="<?= base_url('request/sign/'.$id_encrypt.'/'.$id_encrypt_surat) ?>" class="btn btn-outline-primary"  title="Detail"> Lihat Dokumen 
                                                                    </a>
                                                                    <?php } ?>
                                                                    <!-- <a id="delete-se<?= $no ?>" href="<?= base_url('Surat_rekomendasi_SE/delete/'.$id_encrypt) ?>" class="item item-danger"  title="Hapus">
                                                                        <i class="zmdi zmdi-delete"></i>
                                                                    </a> -->
                                                                    <!-- script ALERT DELETE -->
                                                                    <!-- <script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
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
                                                                    </script> -->
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