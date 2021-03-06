<div class="page-content--bge5">
    <div class="container">

        <!-- ALERT GAGAL LOGIN -->
        <?php 
            if ($this->session->flashdata('login_check')) {
        ?>
                <script>
                    swal({
                        title: "Gagal !",
                        text: "<?= $this->session->flashdata('login_check') ?>",
                        icon: "error",
                    });
                </script>
        <?php
            }
        ?>
        <!-- END OF ALERT -->

        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <h2 class="display-5">LOGIN</h2>
                </div>
                <div class="login-form">
                    <form action="<?= base_url('login/action_login') ?>" method="post">
                        <div class="form-group">
                            <label><b>NIP</b></label>
                            <input class="au-input au-input--full" id="l_nip" type="text" name="l_nip" value="<?= set_value('l_nip') ?>" placeholder="NIP" required>
                            <small class="text-danger"><?= form_error('l_nip') ?></small>
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input class="au-input au-input--full" id="l_password" type="password" name="l_password" placeholder="Password" required>
                            <small class="text-danger"><?= form_error('l_password') ?></small>
                        </div>
                        <div class="login-checkbox m-b-20">
                            <label>
                                <a class="m-t-10" href="#">Forgotten Password?</a>
                            </label>
                            <label>
                                <button class="au-btn au-btn--block au-btn--blue au-btn--small"> Login</button>
                            </label>
                        </div>
                    </form>
                    <!-- <div class="register-link">
                        <p>
                            Don't you have account?
                            <a href="#">Sign Up Here</a>
                        </p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>