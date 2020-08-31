<!-- ALERT GAGAL LOGIN -->
<?php 
    if ($this->session->flashdata('users_check')) {
        if($this->session->flashdata('cond')=='0'){
?>
        <script>
            swal({
                title: "Failed !",
                text: "<?= $this->session->flashdata('users_check') ?>",
                icon: "error",
            });
        </script>
<?php
        }else{
?>
        <script>
            swal({
                title: "Success !",
                text: "<?= $this->session->flashdata('users_check') ?>",
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
                                    <i class="zmdi zmdi-time-restore mr-3"></i>List Deleted Users
                                </h3>
                                <span class="float-right mr-3 mt-3">
                                    <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / <a href="<?= base_url('users') ?>"><?= ucfirst(substr($title,13)) ?></a> / list deleted users
                                </span>
                            </div>
                            <div class="overwiew-wrap">
                                <!-- <span class="m-l-20">
                                    <form action="" class="d-inline">
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
                                <span class="float-right mr-3">
                                    <input class="form-control" id="searchInput" type="text" placeholder="Search..">
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-data">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>NIP</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(empty($datas)){
                                                    echo "<tr> <td colspan='8' class='text-center'> Data tidak tersedia ! </td></tr>";
                                                }else{

                                                $no = 1;
                                                foreach($datas as $data): 
                                                // encrypt id
                                                $encrypt_id = $this->encrypt->encode($data->user_id);
                                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $data->user_nama ?></td>
                                                <td><?= $data->user_nik ?></td>
                                                <td><?= $data->user_nip ?></td>
                                                <td><?= $data->user_email ?></td>
                                                <td><?= $data->user_telepon ?></td>
                                                <td>
                                                    <?php 
                                                        if($data->user_status == 0){
                                                            echo "<span class='badge badge-danger p-2'> Passpharse";
                                                        }else {
                                                            echo "<span class='badge badge-success p-2'> issue";
                                                        }
                                                    ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="<?= base_url('users/restoreData/'.str_replace(array('=','+','/'),array('-','_','~'),$encrypt_id.'')) ?>" class="item item-success" id="restore-user<?= $no ?>" title="Kembalikan data ">
                                                            <i class="zmdi zmdi-time-restore"></i>
                                                        </a>
                                                        <a href="<?= base_url('users/deletePermanent/'.str_replace(array('=','+','/'),array('-','_','~'),$encrypt_id.'')) ?>" class="item item-danger" id="delete-user<?= $no ?>" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                        <!-- script ALERT DELETE -->
                                                        <script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
                                                        <!-- RESTORE BUTTON -->
                                                        <script>
                                                            $('#restore-user<?= $no ?>').on('click', function (e) {
                                                                e.preventDefault();
                                                                const url = $(this).attr('href');
                                                                swal({
                                                                    title: 'Are you sure?',
                                                                    text: 'This records will be add to list Users Again !',
                                                                    icon: 'warning',
                                                                    buttons: ["Cancel", "Yes!"],
                                                                }).then(function(value) {
                                                                    if (value) {
                                                                        swal({
                                                                            title: "Your Data has been restored !",
                                                                            text: "Please wait, This alert will close automaticly and reload the page :) ",
                                                                            icon: "success",
                                                                            showConfirmButton: false
                                                                        });
                                                                        setTimeout(function(){
                                                                            window.location.href = url;
                                                                        },2000);
                                                                    }else{
                                                                        swal("your data is still here ! ");
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <!-- DELETE BUTTON -->
                                                        <script>
                                                            $('#delete-user<?= $no ?>').on('click', function (e) {
                                                                e.preventDefault();
                                                                const url = $(this).attr('href');
                                                                swal({
                                                                    title: 'Are you sure?',
                                                                    text: 'Bercareful, this records will be deleted permanently !',
                                                                    icon: 'warning',
                                                                    buttons: ["Cancel", "Yes!"],
                                                                }).then(function(value) {
                                                                    if (value) {
                                                                        swal({
                                                                            title: "Your Data has been deleted permanently !",
                                                                            text: "Please wait, This alert will close automaticly and reload the page :) ",
                                                                            icon: "success",
                                                                            showConfirmButton: false
                                                                        });
                                                                        setTimeout(function(){
                                                                            window.location.href = url;
                                                                        },2000);
                                                                    }else{
                                                                        swal("your data is safe now :) ");
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        
                                                        <!-- END SCRIPT ALERT DELETE -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                                $no++; endforeach;
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
<!-- function PAGINATION -->
<script src="<?= base_url('assets/backend/') ?>vendor/jquery.tablePagination.js"></script>
<script>
    $('table').tablePagination({
        perPage: 5,
        paginationClass:'tablePagination'
    });
</script>
