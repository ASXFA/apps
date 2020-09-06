<!-- TEMPATKAN SETELAH PAGE-CONTAINER -->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap float-right">
                <div class="header-button">
                    <div class="noti-wrap">
                        <!-- <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-comment-more"></i>
                            <span class="quantity">1</span>
                            <div class="mess-dropdown js-dropdown">
                                <div class="mess__title">
                                    <p>You have 2 news message</p>
                                </div>
                                <div class="mess__item">
                                    <div class="image img-cir img-40">
                                        <img src="<?= base_url('assets/backend/') ?>images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                    </div>
                                    <div class="content">
                                        <h6>Michelle Moreno</h6>
                                        <p>Have sent a photo</p>
                                        <span class="time">3 min ago</span>
                                    </div>
                                </div>
                                <div class="mess__item">
                                    <div class="image img-cir img-40">
                                        <img src="<?= base_url('assets/backend/') ?>images/icon/avatar-04.jpg" alt="Diane Myers" />
                                    </div>
                                    <div class="content">
                                        <h6>Diane Myers</h6>
                                        <p>You are now connected on message</p>
                                        <span class="time">Yesterday</span>
                                    </div>
                                </div>
                                <div class="mess__footer">
                                    <a href="<?= base_url('assets/backend/') ?>#">View all messages</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-email"></i>
                            <span class="quantity">1</span>
                            <div class="email-dropdown js-dropdown">
                                <div class="email__title">
                                    <p>You have 3 New Emails</p>
                                </div>
                                <div class="email__item">
                                    <div class="image img-cir img-40">
                                        <img src="<?= base_url('assets/backend/') ?>images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                    </div>
                                    <div class="content">
                                        <p>Meeting about new dashboard...</p>
                                        <span>Cynthia Harvey, 3 min ago</span>
                                    </div>
                                </div>
                                <div class="email__item">
                                    <div class="image img-cir img-40">
                                        <img src="<?= base_url('assets/backend/') ?>images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                    </div>
                                    <div class="content">
                                        <p>Meeting about new dashboard...</p>
                                        <span>Cynthia Harvey, Yesterday</span>
                                    </div>
                                </div>
                                <div class="email__item">
                                    <div class="image img-cir img-40">
                                        <img src="<?= base_url('assets/backend/') ?>images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                    </div>
                                    <div class="content">
                                        <p>Meeting about new dashboard...</p>
                                        <span>Cynthia Harvey, April 12,,2018</span>
                                    </div>
                                </div>
                                <div class="email__footer">
                                    <a href="<?= base_url('assets/backend/') ?>#">See all emails</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="quantity"><?= $reqNotification->num_rows() ?></span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have <?= $reqNotification->num_rows() ?> Notifications</p>
                                </div>
                                <?php 
                                    foreach($reqNotification->result() as $rn):
                                ?>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <a href="<?= base_url('request') ?>">
                                            <p>You got a Request Sign !</p>
                                            <span class="date"><?= date('d F Y - H:i:s', strtotime($rn->created_at)) ?></span>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="<?= base_url('assets/backend/') ?>images/icon/default-avatar.png" alt="User" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="<?= base_url('assets/backend/') ?>#"><?= $this->session->userdata('user_nama') ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="<?= base_url('assets/backend/') ?>#">
                                            <img src="<?= base_url('assets/backend/') ?>images/icon/default-avatar.png" alt="User" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="<?= base_url('assets/backend/') ?>#"><?= $this->session->userdata('user_nama') ?></a>
                                        </h5>
                                        <span class="email"><?= $this->session->userdata('user_email') ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="<?= base_url('users/profil') ?>">
                                            <i class="zmdi zmdi-account"></i>Profil</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="<?= base_url('login/logout') ?>">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>