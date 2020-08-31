<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php $this->load->view('backend/include/header_dekstop') ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row m-b-30">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Users</h2>
                            <span class="float-right">
                                <i class="fa fa-home"></i> <a href="<?= base_url('dashboard') ?>"> Dashboard</a> / <a href="<?= base_url('users') ?>"><?= ucfirst(substr($title,13)) ?></a> / add
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <!-- USER DATA-->
                        <div class="card">
                            <h3 class="ml-5 mt-4 mb-2 font-weight-normal">
                                <i class="zmdi zmdi-account-add mr-3"></i>Tambah Data User
                            </h3>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?= base_url('assets/backend/images/Headhunters.png') ?>" class="img-add" alt="add-user">
                                    </div>
                                        <div class="col-md-3">
                                    <form action="<?= base_url('users/action_add') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="user_nama" class="form-control-label">Nama</label>
                                                <input type="text" name="user_nama" class="form-control" required>
                                                <small class="text-danger"><?= form_error('user_nama') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_nik" class="form-control-label">NIK</label>
                                                <input type="text" name="user_nik" class="form-control" maxlength="16" required>
                                                <small class="text-danger"><?= form_error('user_nik') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_nip" class="form-control-label">NIP</label>
                                                <input type="text" name="user_nip" class="form-control" maxlength="18" required>
                                                <small class="text-danger"><?= form_error('user_nip') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_email" class="form-control-label">Email</label>
                                                <input type="email" name="user_email" class="form-control" required>
                                                <small class="text-danger"><?= form_error('user_email') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_jabatan" class="form-control-label">Jabatan <small> <span class="text-italic">( optional )</span></small></label>
                                                <input type="text" name="user_jabatan" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="user_unit_organisasi" class="form-control-label">Unit Organisasi</label>
                                                <input type="text" name="user_unit_organisasi" class="form-control" required>
                                                <small class="text-danger"><?= form_error('user_unit_organisasi') ?></small>
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
                                                <input type="text" name="user_kota" class="form-control" required>
                                                <small class="text-danger"><?= form_error('user_kota') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_provinsi" class="form-control-label">Provinsi</label>
                                                <input type="text" name="user_provinsi" class="form-control" required>
                                                <small class="text-danger"><?= form_error('user_provinsi') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_telepon" class="form-control-label">Telepon</label>
                                                <input type="text" name="user_telepon" class="form-control" required>
                                                <small class="text-danger"><?= form_error('user_telepon') ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="user_role" class="form-control-label">Role</label>
                                                <select name="user_role" class="form-control">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Verifikator</option>
                                                    <option value="3">User</option>
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
                                            <input name="submit" type="submit" class="btn btn-success float-right" value="Tambah">
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
