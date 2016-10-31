<div class="banner-bottom">
    <?php if ($this->session->flashdata('success') != "") { ?>
        <div class="row form-error">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $this->session->flashdata('success') ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error') != "") { ?>
        <div class="row form-error">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $this->session->flashdata('error') ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (validation_errors() != "") { ?>
        <div class="row form-error">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- container -->
    <div class="container">
        <div class="faqs-top-grids">
            <div class="book-grids">
                <div class="col-md-6 book-left">
                    <div class="book-left-info">
                        <h3>Create Your AgileVihar Account</h3>
                    </div>
                    <div class="book-left-form">
                        <?= form_open(base_url('auth/signup')) ?>
                        <p>First Name</p>
                        <input type="text" name="first_name">
                        <p>Last Name</p>
                        <input type="text" name="last_name">
                        <p>Email Address</p>
                        <input type="email" name="email_id">
                        <p>Phone Number</p>
                        <input type="text" name="contact_no">
                        <p>Password</p>
                        <input type="password" id="password" name="password">
                        <p>Confirm Password</p>
                        <input type="password" id="password" name="re_password">
                        <!--<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>-->
                        <input type="submit" value="Register" id="login">
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