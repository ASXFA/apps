<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="<?= base_url('assets/backend/') ?>#">
            <!-- <img src="<?= base_url('assets/backend/') ?>images/icon/logo.png" alt="Cool Admin" /> -->
            LOGO
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list" id="nav">
                <li id="dashboard" class="menu">
                    <a href="<?= base_url('dashboard') ?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li id="users" class="menu">
                    <a href="<?= base_url('users') ?>">
                        <i class="fas fa-users"></i>Manajemen User</a>
                </li>
                <li id="SE" class="has-sub menu">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-pencil-square-o"></i>Penerbitan SE <span class="float-right"><i class="fa fa-chevron-down text-muted"></i></span></a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="<?= base_url('dokumen') ?>">Surat Rekomendasi SE</a>
                            </li>
                            <li>
                                <a href="<?= base_url('assets/backend/') ?>index2.html">Visualisasi TTE</a>
                            </li>
                        </ul>
                </li>
                <li id="agenda" class="menu">
                    <a href="<?= base_url('agenda') ?>">
                        <i class="fas fa-calendar-alt"></i>Agenda Penjadwalan</a>
                </li>
                <!-- <li>
                    <a href="<?= base_url('assets/backend/') ?>map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="<?= base_url('assets/backend/') ?>#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>login.html">Login</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>register.html">Register</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="<?= base_url('assets/backend/') ?>#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>button.html">Button</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>card.html">Cards</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="<?= base_url('assets/backend/') ?>typo.html">Typography</a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->