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
                <div class="col-md-6">
                    <div class="book-left-info">
                        <h3>Your Profile</h3>
                    </div>
                    <div class="book-left-form">
                        <?= form_open(base_url('auth/profile')) ?>
                        <p>First Name</p>
                        <input type="text" name="first_name" value="<?= $user_data['first_name'] ?>">
                        <p>Last Name</p>
                        <input type="text" name="last_name" value="<?= $user_data['last_name'] ?>">
                        <p>Email Address</p>
                        <input type="email" name="email_id" value="<?= $user_data['email_id'] ?>">
                        <p>Phone Number</p>
                        <input type="text" name="contact_no" value="<?= $user_data['contact_no'] ?>">
                        <p>Password</p>
                        <input type="password" id="password" name="password">
                        <input type="submit" value="Update" id="profile_update">
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //container -->
</div>