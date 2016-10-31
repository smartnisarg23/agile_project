<!-- banner-bottom -->
<div class="banner-bottom">
    <!-- container -->
    <div class="container">
        <div class="faqs-top-grids">
            <!--single-page-->
            <div class="single-page">
                <div class="col-md-8 single-gd-lt">
                    <div class="single-pg-hdr">
                        <h2><?php echo $hotel['name']; ?></h2>
                        <p><?php echo $hotel['addreaa_line1'] . ',' . $hotel['addreaa_line2'] ?></p>
                        <p>Jump to: <a href="#">Over View</a>|<a href="#">Room Choices</a>
                            <!--|<a href="#">Hotel Information</a>-->
                        </p>
                    </div>
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                            foreach ($hotel_images as $key => $img) {
                                ?>
                                <li data-thumb="<?php echo base_url('assets/images/') . ((!empty($img['image'])) ? $img['image'] : 'p1.jpg'); ?>">
                                    <img src="<?php echo base_url('assets/images/') . ((!empty($img['image'])) ? $img['image'] : 'p1.jpg'); ?>" alt=""/>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <!-- FlexSlider -->
                    <script defer src="js/jquery.flexslider.js"></script>
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
                <div class="col-md-4 single-gd-rt">
                    <div class="spl-btn">
                        <div class="spl-btn-bor">
                            <a href="#">
                                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>											
                            </a>
                            <p>Special Offer</p>	
                            <script>
                                $(document).ready(function () {
                                    $('[data-toggle="tooltip"]').tooltip();
                                });
                            </script>
                        </div>
                        <div class="sp-bor-btn text-right">
                            <h4> $<?php echo $hotel['minimum_rate']; ?></h4>
                            <p class="best-pri">Best price</p>
                            <!--<a class="best-btn" href="booking.html">Book Now</a>-->
                        </div>
                    </div>
                    <div class="map-gd">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63718.72916803739!2d102.31975295000002!3d3.489618449999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31ceba2007355f81%3A0xd2ff1ad6a3ca801!2sMentakab%2C+Pahang%2C+Malaysia!5e0!3m2!1sen!2sin!4v1439535856431"></iframe>
                    </div>
<!--                    <div class="other-comments">
                        <div class="comments-head">
                            <h3>Excellent</h3>
                            <p>4.5/5</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="comments-bot">
                            <p>"Vestibulum ullamcorper condimentum luctus. Ut ullamcorper elit eu auctor commodo."</p>
                            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> John Doe</h4>
                        </div>
                        <div class="comments-bot">
                            <p>"Aliquam non purus quis tellus varius egestas ut vitae tellus. Pellentesque non est ac tortor maximus imperdiet at id quam."</p>
                            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Luther</h4>
                        </div>
                        <div class="comments-bot">
                            <p>"Vestibulum sapien quam, interdum quis bibendum quis, malesuada a nisi. Proin at blandit justo."</p>
                            <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Patrick</h4>
                        </div>
                    </div>-->
                </div>
                <div class="clearfix"></div>
            </div>
            <!--//single-page-->
        </div>
        <div class="c-rooms">
            <div class="p-table">
                <div class="p-table-grids">
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Room type</h6>
                        </div>
                        <div class="p-table-grid-info">
                            <a href="#"><img src="images/p2.jpg" alt=""></a>
                            <div class="room-basic-info">
                                <a href="#">Fusce vestibulum ultricies rutrum</a>
                                <h6>1 king bed or  2 single beds</h6>
                                <p>Vestibulum ullamcorper(condimentum luctus)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Options</h6>
                        </div>
                        <div class="rate-features">
                            <ul>
                                <li>Morbi mollis mattis</li>
                                <li>Donec egestas</li>
                                <li>Donec non risus</li>
                                <li>Pellentesque sem</li>
                                <li>Sed ut urna id metus</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Avg rate per night</h6>
                        </div>
                        <div class="avg-rate">
                            <h5>Recommended for you</h5>
                            <p>Price is now:</p>
                            <span class="p-offer">$140</span>
                            <span class="p-last-price">$230</span>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Book</h6>
                        </div>
                        <div class="book-button-column">
                            <a href="#">Book</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="p-table">
                <div class="p-table-grids">
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Room type</h6>
                        </div>
                        <div class="p-table-grid-info">
                            <a href="#"><img src="images/p1.jpg" alt=""></a>
                            <div class="room-basic-info">
                                <a href="#">Fusce vestibulum ultricies rutrum</a>
                                <h6>1 king bed or  2 single beds</h6>
                                <p>Vestibulum ullamcorper(condimentum luctus)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Options</h6>
                        </div>
                        <div class="rate-features">
                            <ul>
                                <li>Morbi mollis mattis</li>
                                <li>Donec egestas</li>
                                <li>Donec non risus</li>
                                <li>Pellentesque sem</li>
                                <li>Sed ut urna id metus</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Avg rate per night</h6>
                        </div>
                        <div class="avg-rate">
                            <h5>Recommended for you</h5>
                            <p>Price is now:</p>
                            <span class="p-offer">$140</span>
                            <span class="p-last-price">$230</span>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Book</h6>
                        </div>
                        <div class="book-button-column">
                            <a href="#">Book</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="p-table">
                <div class="p-table-grids">
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Room type</h6>
                        </div>
                        <div class="p-table-grid-info">
                            <a href="#"><img src="images/p2.jpg" alt=""></a>
                            <div class="room-basic-info">
                                <a href="#">Fusce vestibulum ultricies rutrum</a>
                                <h6>1 king bed or  2 single beds</h6>
                                <p>Vestibulum ullamcorper(condimentum luctus)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Options</h6>
                        </div>
                        <div class="rate-features">
                            <ul>
                                <li>Morbi mollis mattis</li>
                                <li>Donec egestas</li>
                                <li>Donec non risus</li>
                                <li>Pellentesque sem</li>
                                <li>Sed ut urna id metus</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Avg rate per night</h6>
                        </div>
                        <div class="avg-rate">
                            <h5>Recommended for you</h5>
                            <p>Price is now:</p>
                            <span class="p-offer">$140</span>
                            <span class="p-last-price">$230</span>
                        </div>
                    </div>
                    <div class="col-md-3 p-table-grid">
                        <div class="p-table-grad-heading">
                            <h6>Book</h6>
                        </div>
                        <div class="book-button-column">
                            <a href="#">Book</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //container -->
</div>
<!-- //banner-bottom -->