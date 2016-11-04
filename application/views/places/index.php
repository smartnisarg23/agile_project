<div class="banner-bottom">
    <div class="container">
        <div class="banner-bottom-grids">
            <?php foreach ($places as $key => $value) { ?>
                <div class="col-md-4 weekend-grids">
                    <div class="weekend-grid">
                        <img src="<?= base_url('assets/images/' . $value['image_src']) ?>" alt="" style="width: 350px;height: 200px"/>
                        <div class="deals-info-grid">
                            <div class="deals-grids">
                                <div class="col-md-12 deals-rating" style="padding-left: 0px;">
                                    <h3><?= $value['name']; ?></h3>
                                </div>
                                <br/>
                                <p><?=$value['details']?></p>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
