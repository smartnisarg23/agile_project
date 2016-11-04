<div class="header">
    <div class="container">
        <div class="header-grids">
            <div class="logo">
                <h1><a  href="<?= base_url() ?>"><span>Agile</span>vihar</a></h1>
            </div>
            <!--navbar-header-->
            <div class="header-dropdown">
                <div class="emergency-grid">
                    <ul>
                        <li class="call"><a href="<?= base_url('contact/index') ?>">Contact us</a></li>
                        <!--<li class="call">+1 234 567 8901</li>-->
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="nav-top">
            <div class="top-nav">
                <span class="menu"><img src="<?php echo base_url('assets/images/menu.png') ?>" alt="" /></span>
                <ul class="nav1">
                    <li class="<?= ($this->router->fetch_class() == "welcome" || $this->router->fetch_class() == "flights") ? "active" : ""; ?>"><a href="<?= base_url('welcome/index') ?>">Flights</a></li>
                    <li class="<?= ($this->router->fetch_class() == "hotels") ? "active" : ""; ?>"><a href="<?= base_url('hotels/search') ?>">Hotels</a></li>
                </ul>
                <!--<div class="clearfix"> </div>-->
                <div class="dropdown-grids">
                    <?php if (isset($this->session->userdata['login_uer_data']) && $this->session->userdata['login_uer_data'] != "") { ?>
                        <label class="call" style="padding-top: 10px;">Hi, <?= $this->session->userdata['login_uer_data']['first_name'] ?></label>
                    <?php } ?>
                    <div id="loginContainer">
                        <?php if (isset($this->session->userdata['login_uer_data']) && $this->session->userdata['login_uer_data'] != "") { ?>
                            <a id="loginButton" onclick="window.location = '<?= base_url("auth/logout") ?>'"><span>Logout</span></a>
                        <?php } else { ?>
                            <a id="loginButton" onclick="window.location = '<?= base_url("auth/login") ?>'"><span>Login</span></a>
                        <?php } ?>
                    </div>
                    <?php if (!isset($this->session->userdata['login_uer_data'])) { ?>
                        <div id="loginContainer" style="margin-right: 10px;background-color: #ED403A;border: 1px solid #ED403A">
                            <a id="loginButton" onclick="window.location = '<?= base_url("auth/signup") ?>'"><span>Signup</span></a>
                        </div>
                    <?php } ?>

                </div>
                <!-- script-for-menu -->
                <script>
                    $("span.menu").click(function () {
                        $("ul.nav1").slideToggle(300, function () {
// Animation complete.
                        });
                    });

                </script>
                <!-- /script-for-menu -->
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>