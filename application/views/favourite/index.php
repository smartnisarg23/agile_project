<div class="banner-bottom">
    <div class="container">
        <?php if ($this->session->flashdata('success') != "") { ?>
            <br/>
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $this->session->flashdata('success') ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error') != "") { ?>
            <br/>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?= $this->session->flashdata('error') ?>
                </div>
            </div>
        <?php } ?>
        <?php if (validation_errors() != "") { ?>
            <br/>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"> </div>

        <h1>Favourites</h1>
        <div class="banner-bottom-grids">
            <?php if (isset($fav_data) && count($fav_data) > 0) { ?>
                <div class="col-md-12 weekend-grids">
                    <div class="top-destinations-grids">
                        <div class="top-destinations-bottom">
                            <table class="table table-hover"> 
                                <thead> 
                                    <tr>
                                        <th class="p-table-grad-heading"><h6>Name</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Address</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Phone Number</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Minimum Rate</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Action</h6></th>
                                </thead> 
                                <tbody> 
                                    <?php foreach ($fav_data as $key => $fav) { ?>
                                        <tr>
                                            <td><?= $fav['name'] ?></td> 
                                            <td>
                                                <?= $fav['addreaa_line1'] . ', ' . $fav['addreaa_line2'] ?>
                                                <br/>
                                                <?= $fav['subhurb'] . ', ' . $fav['city'] ?>
                                            </td> 
                                            <td><?= $fav['phone_number'] ?></td> 
                                            <td>$<?= $fav['minimum_rate'] ?></td>
                                            <td><a href="<?= base_url('favourite/rmFavourite/' . $fav['hotel_id']) ?>" class="btn btn-danger" role="button">Remove from Favourite</a></td>
                                        </tr> 
                                    <?php } ?>
                                </tbody> 
                            </table>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-12 weekend-grids">
                    <div class="top-destinations-grids">
                        <div class="top-destinations-bottom">
                            No favourite data found
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
