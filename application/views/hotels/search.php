<div class="banner hotels-banner">
    <!-- container -->
    <div class="container">
        <div class="col-md-4 banner-left">
            <section class="slider2">
                <div class="flexslider">

                    <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1400%; transition-duration: 0.6s; transform: translate3d(-1400px, 0px, 0px);"><li class="clone" style="width: 350px; float: left; display: block;">	
                                <div class="slider-info">
                                    <img src="images/6.jpg" alt="">
                                </div>
                            </li>
                            <li style="width: 350px; float: left; display: block;" class="">
                                <div class="slider-info">
                                    <img src="images/5.jpg" alt="">
                                </div>
                            </li>
                            <li style="width: 350px; float: left; display: block;" class="">
                                <div class="slider-info">
                                    <img src="images/6.jpg" alt="">
                                </div>
                            </li>
                            <li style="width: 350px; float: left; display: block;" class="">	
                                <div class="slider-info">
                                    <img src="images/7.jpg" alt="">
                                </div>
                            </li>
                            <li style="width: 350px; float: left; display: block;" class="flex-active-slide">	
                                <div class="slider-info">
                                    <img src="images/8.jpg" alt="">
                                </div>
                            </li>
                            <li style="width: 350px; float: left; display: block;">	
                                <div class="slider-info">
                                    <img src="images/6.jpg" alt="">
                                </div>
                            </li>
                            <li style="width: 350px; float: left; display: block;" class="clone">
                                <div class="slider-info">
                                    <img src="images/5.jpg" alt="">
                                </div>
                            </li></ul></div><ol class="flex-control-nav flex-control-paging"><li><a class="">1</a></li><li><a class="">2</a></li><li><a class="">3</a></li><li><a class="flex-active">4</a></li><li><a>5</a></li></ol><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul></div>
            </section>
            <!--FlexSlider-->
        </div>
        <div class="col-md-8 banner-right">
            <div class="sap_tabs">	
                <div class="booking-info about-booking-info">
                    <h2>Book Domestic &amp; International Hotels</h2>
                </div>
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">	
                    <!---->		  	 
                    <div class="facts about-facts train-facts">
                        <div class="booking-form train-form">
                            <link rel="stylesheet" href="css/jquery-ui.css">
                            <!---strat-date-piker---->
                            <script>
                                $(function () {
                                    $("#datepicker,#datepicker1").datepicker();
                                });
                            </script>
                            <!---/End-date-piker---->
                            <!-- Set here the key for your domain in order to hide the watermark on the web server -->
                            <form method="get" name="searchForm" id="searchForm">
                                <div class="online_reservation">
                                    <div class="b_room">
                                        <div class="booking_room">
                                            <div class="reservation">
                                                <ul>		
                                                    <li class="span1_of_1 desti about-desti">
                                                        <h5>Going to</h5>
                                                        <div class="book_date">
                                                            <form>
                                                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                                                <input placeholder="City, Area or Hotel Name" class="typeahead1 input-md form-control tt-input"  name="city" type="text" value="<?php echo (!empty($_GET['city'])) ? $_GET['city'] : '' ?>">
                                                            </form>
                                                        </div>					
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="reservation">
                                                <ul>	
                                                    <li class="span1_of_1">
                                                        <h5>Check in</h5>
                                                        <div class="book_date">
                                                            <form>
                                                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                                <input value="Select date" name="check_in" value="<?php echo (!empty($_GET['check_in'])) ? $_GET['check_in'] : '' ?>" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                            this.value = 'Select date';
                                                                        }" type="date">
                                                            </form>
                                                        </div>		
                                                    </li>
                                                    <li class="span1_of_1 left">
                                                        <h5>Check out</h5>
                                                        <div class="book_date">
                                                            <form>
                                                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                                <input value="Select date" name="check_out" value="<?php echo (!empty($_GET['check_out'])) ? $_GET['check_out'] : '' ?>" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                            this.value = 'Select date';
                                                                        }" type="date">
                                                            </form>
                                                        </div>					
                                                    </li>
                                                    <li class="span1_of_1 left adult">
                                                        <h5>Adults (18+)</h5>
                                                        <!----------start section_room----------->
                                                        <div class="section_room">
                                                            <select id="country" name="adult" onchange="change_country(this.value)" class="frm-field required">
                                                                <option value="1" <?php echo (!empty($_GET['adult']) && $_GET['adult'] == 1) ? "selected" : "" ?> >1</option>
                                                                <option value="2" <?php echo (!empty($_GET['adult']) && $_GET['adult'] == 2) ? "selected" : "" ?>>2</option>         
                                                                <option value="3" <?php echo (!empty($_GET['adult']) && $_GET['adult'] == 3) ? "selected" : "" ?> >3</option>
                                                                <option value="4" <?php echo (!empty($_GET['adult']) && $_GET['adult'] == 4) ? "selected" : "" ?> >4</option>
                                                                <option value="5" <?php echo (!empty($_GET['adult']) && $_GET['adult'] == 5) ? "selected" : "" ?> >5</option>
                                                                <option value="6" <?php echo (!empty($_GET['adult']) && $_GET['adult'] == 6) ? "selected" : "" ?> >6</option>
                                                            </select>
                                                        </div>	
                                                    </li>
                                                    <li class="span1_of_1 left h-child">
                                                        <h5>Children (0-17)</h5>
                                                        <!----------start section_room----------->
                                                        <div class="section_room">
                                                            <select id="country" name="children" onchange="change_country(this.value)" class="frm-field required">
                                                                <option value="1" <?php echo (!empty($_GET['children']) && $_GET['children'] == 1) ? "selected" : "" ?>>1</option>
                                                                <option value="2" <?php echo (!empty($_GET['children']) && $_GET['children'] == 2) ? "selected" : "" ?>>2</option>         
                                                                <option value="3" <?php echo (!empty($_GET['children']) && $_GET['children'] == 3) ? "selected" : "" ?>>3</option>
                                                                <option value="4" <?php echo (!empty($_GET['children']) && $_GET['children'] == 4) ? "selected" : "" ?>>4</option>
                                                                <option value="5" <?php echo (!empty($_GET['children']) && $_GET['children'] == 5) ? "selected" : "" ?>>5</option>
                                                                <option value="6" <?php echo (!empty($_GET['children']) && $_GET['children'] == 6) ? "selected" : "" ?>>6</option>
                                                            </select>
                                                        </div>	
                                                    </li>
                                                    <li class="span1_of_1 h-rooms">
                                                        <h5>Rooms</h5>
                                                        <!----------start section_room----------->
                                                        <div class="section_room">
                                                            <select id="country" name="room" onchange="change_country(this.value)" class="frm-field required">
                                                                <option value="1" <?php echo (!empty($_GET['room']) && $_GET['room'] == 1) ? "selected" : "" ?> >1</option>
                                                                <option value="2" <?php echo (!empty($_GET['room']) && $_GET['room'] == 2) ? "selected" : "" ?> >2</option>         
                                                                <option value="3" <?php echo (!empty($_GET['room']) && $_GET['room'] == 3) ? "selected" : "" ?> >3</option>
                                                                <option value="4" <?php echo (!empty($_GET['room']) && $_GET['room'] == 4) ? "selected" : "" ?> >4</option>
                                                                <option value="5" <?php echo (!empty($_GET['room']) && $_GET['room'] == 5) ? "selected" : "" ?> >5</option>
                                                                <option value="6" <?php echo (!empty($_GET['room']) && $_GET['room'] == 6) ? "selected" : "" ?> >6</option>
                                                            </select>
                                                        </div>	
                                                    </li>
                                                    <div class="clearfix"></div>
                                                </ul>
                                            </div>
                                            <div class="reservation">
                                                <ul>

                                                    <div class="clearfix"></div>
                                                </ul>
                                            </div>
                                            <div class="reservation">
                                                <ul>	
                                                    <li class="span1_of_3">
                                                        <div class="date_btn">

                                                            <input value="Search" type="submit">

                                                        </div>
                                                    </li>
                                                    <div class="clearfix"></div>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                            <!---->
                        </div>	
                    </div>
                </div>	
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //container -->
</div>
<div class="container">
    <div class="faqs-top-grids">
        <div class="product-grids">
            <div class="col-md-3 product-left">
                <div class="h-class">
                    <h5>Hotel Class</h5>
                    <?php
                    for ($s = 5; $s >= 1; $s--) {
                        ?>
                        <div class="hotel-price">
                            <label class="check">
                                <input type="checkbox" form="searchForm" name="hotel_class[]"  value="<?php echo $s ?>" <?php echo (!empty($_GET['hotel_class']) && in_array($s, $_GET['hotel_class'])) ? "checked" : "" ?> >
                                <?php
                                for ($i = 0; $i < $s; $i++) {
                                    ?>
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    <?php
                                }
                                ?>

                                <span class="starTextLabel"><?php echo $s; ?> Stars (<?php echo (!empty($hotels_stars_count[$s])) ? $hotels_stars_count[$s] : 0; ?>)</span>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <script>
                    $(document).ready(function () {
                        $("[name='hotel_class[]']").on("click", function () {
                            $('#searchForm').submit();
                        });
                    });
                </script>
                <div class="h-class p-day">
                    <h5>Price per day</h5>
                    <div class="hotel-price">
                        <label class="check">
                            <input checked="checked" data-track="HOT:SR:StarRating:5Star" type="checkbox">
                            <span class="p-day-grid">Less than $100 (76)</span>
                        </label>
                    </div>
                    <div class="hotel-price">
                        <label class="check">
                            <input type="checkbox">
                            <span class="p-day-grid">$100 to $200 (132)</span>
                        </label>
                    </div>
                    <div class="hotel-price">
                        <label class="check">
                            <input type="checkbox">
                            <span class="p-day-grid">$300 to $300 (223)</span>
                        </label>
                    </div>
                    <div class="hotel-price">
                        <label class="check">
                            <input type="checkbox">
                            <span class="p-day-grid">$300 to $400 (84)</span>
                        </label>
                    </div>
                    <div class="hotel-price">
                        <label class="check">
                            <input type="checkbox">
                            <span class="p-day-grid">$500 to $600 (23)</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-9 product-right">
                <?php
                foreach ($all_hotels as $key => $hotel) {
                    ?>
                    <div class="product-right-grids">
                        <div class="product-right-top">
                            <div class="p-left">
                                <div class="">
                                    <a href="<?php echo base_url('hotels/viewHotel/'.$hotel['id']); ?>"> 
                                        <img src="<?php echo base_url('assets/images/') . ((!empty($hotel['image'])) ? $hotel['image'] : 'p1.jpg'); ?>" style="width: 100%" />
                                    </a>
                                </div>
                            </div>
                            <div class="p-right">
                                <div class="col-md-6 p-right-left">
                                    <a href="p-single.html"><?php echo $hotel['name']; ?></a>
                                    <div class="p-right-price">
                                        <?php
                                        for ($i = 0; $i < $hotel['class']; $i++) {
                                            ?>
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                    <p><?php echo $hotel['addreaa_line1'] . ',' . $hotel['addreaa_line2']; ?></p>
                                    <p class="p-call"><?php echo $hotel['phone_number']; ?></p>
                                </div>
                                <div class="col-md-6 p-right-right">
                                    <span class="p-offer">$<?php echo $hotel['minimum_rate']; ?></span><br>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" onclick="setAlert(<?php echo $hotel['id']; ?>, '<?php echo $hotel['name']; ?>',<?php echo $hotel['minimum_rate']; ?>)">Set Alert</button>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>	
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="modal fade" id="setAlertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Set Alert
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div id="form_div">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your Selected Hotel</label>
                        <span id="fl_p_name" style="float: right;margin-top: 15px;"></span>
                        <span id="fl_p_logo" style="float: right"><img src="" class="search_provider_logo"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Actual Price</label>
                        <span id="fl_ac_price"></span>
                    </div>
                    <div class="form-group">
                        <label>Enter your expected price</label>
                        <input type="text" class="form-control" id="expected_price" placeholder="Enter price" required=""/>
                        <input type="hidden" class="form-control" id="alert_hotel_id"/>
                        <input type="hidden" class="form-control" id="alert_class"/>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="submitAlert()">Submit</button>
                </div>
                <div id="msg_div" style="display: none">
                    <h4>Price alert is successfully created.</h4>
                    <br/>
                    <h5>You will notify by email once price meets your expectation.</h5>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function setAlert(id, name, price) {
        $('#form_div').show();
        $('#msg_div').hide();
        $("#expected_price").val('');
        $("#fl_ac_price").html('$' + price);
        $("#fl_p_name").html(name);
        $("#alert_hotel_id").val(id);
//            $("#alert_flight_id").val(flight_id);
//            $("#alert_class").val(class_type);
//            $('#fl_p_logo img').attr('src', p_logo);
        $("#setAlertModal").modal('show');
    }
    function submitAlert() {
//        alert($('#expected_price').val());
        var hotel_id = $("#alert_hotel_id").val();
        var expected_price = $("#expected_price").val();
        $.ajax({
            url: '<?= base_url("hotels/setAlert") ?>', // Controller URL
            type: "POST", // Type of request to be send, called as method
            data: {hotel_id: hotel_id, price: expected_price},
            success: function (data) {
                console.log(data);
                $('#form_div').hide();
                $('#msg_div').show();
            }
        });
    }
</script>