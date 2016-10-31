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