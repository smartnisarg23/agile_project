<div class="banner-bottom">
    <!-- container -->
    <div class="container">
        <div class="faqs-top-grids">
            <!--single-page-->
            <div class="single-page">
                <div class="col-md-12 single-gd-lt">
                    <div class="single-pg-hdr">
                        <h2>Morbi mollis mattis dolor</h2>
                        <p>Eiusmod Tempor inc , St Dolore Place,Kingsport 56777</p>
                        <p>Jump to: <a href="#">Over View</a>|<a href="#">Room Choices</a>|<a href="#">Hotel Information</a></p>
                    </div>
                    <div class="flexslider">
                        <ul class="slides">
                            <?php foreach ($place_images as $key => $value) { ?>
                                <li data-thumb="<?= base_url('assets/images/'.$value['image_src']) ?>">
                                    <img src="<?= base_url('assets/images/'.$value['image_src']) ?>" alt=""/>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- FlexSlider -->
                    <script defer src="<?= base_url('assets/js/jquery.flexslider.js') ?>"></script>
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function () {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>

                </div>
                <div class="clearfix"></div>
            </div>
            <!--//single-page-->
        </div>
    </div>
    <!-- //container -->
</div>