<!-- ALERT LOGIN SUCCESS -->
<?php 
    if($this->session->flashdata('login_success')){
?>
        <script>
            swal({
                title: "SUCCESS !",
                text: "<?= $this->session->flashdata('login_success').' '.$this->session->userdata('username'); ?>",
                icon: "success",
            });
        </script>
<?php
    }
?>
<!-- END OF ALERT LOGIN SUCCESS -->

        
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <?php $this->load->view('backend/include/header_dekstop') ?>
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row m-t-25">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mx-auto d-block">
                                        <img class="rounded-circle mx-auto d-block" width="30%" src="<?= base_url('assets/backend/') ?>images/icon/default-avatar.png" alt="User" />
                                        <hr>
                                        <h5 class="text-sm-center mt-2 mb-1">Users 1</h5>
                                        <div class="location text-sm-center">
                                            <i class="fa fa-id-card"></i> username
                                        </div>
                                        <div class="location text-sm-center">
                                            <i class="fab fa-whatsapp"></i> 089726382321
                                        </div>
                                        <div class="location text-sm-center">
                                            <i class="fa fa-map-marker"></i> Jalan Buahbatu no 120
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama" class="form-control-label">Nama</label>
                                                    <input type="text" name="nama" class="form-control form-control-sm" value="Users 1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="form-control-label">Username</label>
                                                    <input type="text" name="nama" class="form-control form-control-sm" value="username">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama" class="form-control-label">Telepon</label>
                                                    <input type="text" name="nama" class="form-control form-control-sm" value="089726382321">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="form-control-label">Alamat</label>
                                                    <input type="text" name="nama" class="form-control form-control-sm" value="Jalan Buahbatu no 120">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="btn btn-primary btn-sm float-right" value="Edit Profil">
                                        </div>
                                    </form>
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


