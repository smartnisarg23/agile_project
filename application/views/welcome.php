<!-- banner -->
<div class="banner">
    <!-- container -->
    <div class="container">
        <div class="col-md-12">
            <?php if ($this->session->flashdata('success') != "") { ?>
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?= $this->session->flashdata('success') ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('error') != "") { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?= $this->session->flashdata('error') ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (validation_errors() != "") { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo validation_errors(); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php include 'flights/search_form.php'; ?>
        <div class="clearfix"> </div>
    </div>
    <!-- //container -->
</div>
<!-- //banner -->
<div class="move-text"></div>