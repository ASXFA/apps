<!-- ALERT GAGAL LOGIN -->
<?php 
    if ($this->session->flashdata('add_users_check')) {
        if($this->session->flashdata('cond')=='0'){
?>
        <script>
            swal({
                title: "Failed !",
                text: "<?= $this->session->flashdata('add_users_check') ?>",
                icon: "error",
            });
        </script>
<?php
        }else{
?>
        <script>
            swal({
                title: "Success !",
                text: "<?= $this->session->flashdata('add_users_check') ?>",
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
                    <!-- USER DATA-->
                    <div class="card">
                        <div class="overview-wrap">
                            <h3 class="ml-5 mt-4 mb-2 d-inline font-weight-normal">
                                <i class="zmdi zmdi-edit mr-3"></i>Edit Data User
                            </h3>
                            <span class="float-right mr-3 mt-3">
                                <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / <a href="<?= base_url('users') ?>"><?= ucfirst(substr($title,13)) ?></a> / edit
                            </span>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?= base_url('assets/backend/images/Headhunters.png') ?>" class="img-add" alt="add-user">
                                </div>
                                    <div class="col-md-3">
                                    <?php 
                                        //encrypt ID USER
                                        $encrypt_id = $this->encrypt->encode($user->user_id);
                                    ?>
                                <form action="<?= base_url('users/action_edit/'.str_replace(array('=','+','/'),array('-','_','~'),$encrypt_id.'')) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="user_nama" class="form-control-label">Nama</label>
                                            <input type="text" name="user_nama" class="form-control" value="<?= $user->user_nama ?>" required>
                                            <small class="text-danger"><?= form_error('user_nama') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_nik" class="form-control-label">NIK</label>
                                            <input type="text" name="user_nik" class="form-control" value="<?= $user->user_nik ?>" maxlength="16" required>
                                            <small class="text-danger"><?= form_error('user_nik') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_nip" class="form-control-label">NIP</label>
                                            <input type="text" name="user_nip" class="form-control" value="<?= $user->user_nip ?>" maxlength="18" required>
                                            <small class="text-danger"><?= form_error('user_nip') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_email" class="form-control-label">Email</label>
                                            <input type="email" name="user_email" class="form-control" value="<?= $user->user_email ?>" required>
                                            <small class="text-danger"><?= form_error('user_email') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_pangkat" class="form-control-label">Pangkat / Golongan</label>
                                            <input type="text" name="user_pangkat" class="form-control" value="<?= $user->user_pangkat ?>" required>
                                            <small class="text-danger"><?= form_error('user_pangkat') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_jabatan" class="form-control-label">Jabatan <small> <span class="text-italic">( optional )</span></small></label>
                                            <input type="text" name="user_jabatan" value="<?= $user->user_jabatan ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_unit_organisasi" class="form-control-label">Unit Organisasi</label>
                                            <input type="text" name="user_unit_organisasi" class="form-control" value="<?= $user->user_unit_organisasi ?>" required>
                                            <small class="text-danger"><?= form_error('user_unit_organisasi') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_unit_kerja" class="form-control-label">Unit Kerja</label>
                                            <input type="text" name="user_unit_kerja" class="form-control" value="<?= $user->user_unit_kerja ?>" required>
                                            <small class="text-danger"><?= form_error('user_unit_kerja') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_organisasi" class="form-control-label">Organisasi</label>
                                            <input type="text" name="user_organisasi" class="form-control" value="Pemerintah Provinsi Jawa Barat" readonly required>
                                            <small class="text-danger"><?= form_error('user_organisasi') ?></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="user_kota" class="form-control-label">Kota</label>
                                            <input type="text" name="user_kota" class="form-control" value="<?= $user->user_kota ?>" required>
                                            <small class="text-danger"><?= form_error('user_kota') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_provinsi" class="form-control-label">Provinsi</label>
                                            <input type="text" name="user_provinsi" class="form-control" value="<?= $user->user_provinsi ?>" required>
                                            <small class="text-danger"><?= form_error('user_provinsi') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_telepon" class="form-control-label">Telepon</label>
                                            <input type="text" name="user_telepon" class="form-control" value="<?= $user->user_telepon ?>" required>
                                            <small class="text-danger"><?= form_error('user_telepon') ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_role" class="form-control-label">Role</label>
                                            <select name="user_role" class="form-control">
                                                <option value="1" <?php if($user->user_role == 1){ echo "selected";} ?>>Admin</option>
                                                <option value="2" <?php if($user->user_role == 2){ echo "selected";} ?>>Verifikator</option>
                                                <option value="3" <?php if($user->user_role == 3){ echo "selected";} ?>>User</option>
                                            </select>
                                            <small class="text-danger"><?= form_error('user_role') ?></small>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="user_email" class="form-control-label">Email</label>
                                            <input type="email" name="user_email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_jabatan" class="form-control-label">Jabatan <small> <span class="text-italic">( optional )</span></small></label>
                                            <input type="text" name="user_email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_unit_organisasi" class="form-control-label">Unit Organisasi</label>
                                            <input type="text" name="user_unit_organisasi" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_organisasi" class="form-control-label">Organisasi</label>
                                            <input type="text" name="user_organisasi" class="form-control" required>
                                        </div> -->
                                    </div>
                                    <div class="card-footer ml-auto">
                                        <input name="submit" type="submit" class="btn btn-success float-right" value="Simpan">
                                        <a href="<?= base_url('users') ?>" class="btn btn-secondary float-right mr-2"> Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END USER DATA-->
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
            $(".table tr").filter(function() {
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
