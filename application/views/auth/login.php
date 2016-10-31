<div class="banner-bottom">
    <!-- container -->
    <div class="container">
        <?php if ($this->session->flashdata('success') != "") { ?>
            <div class="col-md-12" style="margin-top: 15px">
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $this->session->flashdata('success') ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error') != "") { ?>
            <div class="col-md-12" style="margin-top: 15px">
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $this->session->flashdata('error') ?>
                </div>
            </div>
        <?php } ?>
        <?php if (validation_errors() != "") { ?>
            <div class="col-md-12" style="margin-top: 15px">
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="faqs-top-grids">
            <div class="book-grids">
                <div class="col-md-6 book-left">
                    <div class="book-left-info">
                        <h3>Please enter your login details</h3>
                    </div>
                    <div class="book-left-form">
                        <?= form_open(base_url('auth/login')) ?>
                        <p>Email Address</p>
                        <input type="email" name="email_id" id="emil_id">
                        <p>Password</p>
                        <input type="password" id="password" name="password">
                        <!--<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>-->
                        <input type="submit" value="Login" id="login" name="submit">
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="col-md-6 book-left book-right">
                    <div class="book-left-info">
                        <h3>Recommended</h3>
                    </div>
                    <div class="book-left-bottom">
                        <div class="book-left-facebook">
                            <a href="<?= base_url('social/session/facebook') ?>">Connect with Facebook</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //container -->
</div>