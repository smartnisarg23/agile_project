<div class="col-md-4 banner-left">
    <section class="slider2">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/5.jpg') ?>" alt="">
                    </div>
                </li>
                <li>
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/6.jpg') ?>" alt="">
                    </div>
                </li>
                <li>	
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/7.jpg') ?>" alt="">
                    </div>
                </li>
                <li>	
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/8.jpg') ?>" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--FlexSlider-->
</div>
<div class="col-md-8 banner-right">
    <div class="sap_tabs">	
        <div class="booking-info about-booking-info">
            <h2>Book Hotels</h2>
        </div>
        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">	
            <div class="facts about-facts train-facts">
                <div class="booking-form train-form">
                    <div class="online_reservation">
                        <div class="b_room">
                            <div class="booking_room">
                                <?= form_open(base_url('hotels/search'),array('name'=>'search_form','id'=>'search_form')) ?>
                                <div class="reservation">
                                    <ul>		
                                        <li class="span1_of_1 desti about-desti">
                                            <h5>Destination</h5>
                                            <div class="book_date">
                                                <select class="frm-field required" name="city">
                                                    <option value="">Select Place</option>
                                                    <?php foreach ($allCities as $key => $value) { ?>
                                                        <option value="<?= $value['id'] ?>" <?= (isset($city) && $city == $value['id']) ? "selected" : ""; ?>><?= $value['name'] ?></option>         
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="reservation">
                                    <ul>	
                                        <li class="span1_of_1">
                                            <h5>Check in</h5>
                                            <div class="book_date">
                                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                <input type="text" class="datepicker" name="check_in" value="<?= (isset($check_in) && $check_in != "") ? $check_in : '' ?>">
                                            </div>		
                                        </li>
                                        <li class="span1_of_1 left">
                                            <h5>Check out</h5>
                                            <div class="book_date">
                                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                <input type="text" class="datepicker" name="check_out" value="<?= (isset($check_out) && $check_out != "") ? $check_out : '' ?>">
                                            </div>					
                                        </li>
                                        <li class="span1_of_1 left adult">
                                            <h5>Adults (18+)</h5>
                                            <!----------start section_room----------->
                                            <div class="section_room">
                                                <select name="adults_total" class="frm-field required">
                                                    <option value="1" <?= (isset($adults_total) && $adults_total == "1") ? "selected" : ""; ?>>1</option>
                                                    <option value="2" <?= (isset($adults_total) && $adults_total == "2") ? "selected" : ""; ?>>2</option>         
                                                    <option value="3" <?= (isset($adults_total) && $adults_total == "3") ? "selected" : ""; ?>>3</option>
                                                    <option value="4" <?= (isset($adults_total) && $adults_total == "4") ? "selected" : ""; ?>>4</option>
                                                    <option value="5" <?= (isset($adults_total) && $adults_total == "5") ? "selected" : ""; ?>>5</option>
                                                    <option value="6" <?= (isset($adults_total) && $adults_total == "6") ? "selected" : ""; ?>>6</option>
                                                </select>
                                            </div>	
                                        </li>
                                        <li class="span1_of_1 left children">
                                            <h5>Children (0-17)</h5>
                                            <!----------start section_room----------->
                                            <div class="section_room">
                                                <select name="child_total" class="frm-field required">
                                                    <option value="" <?= (isset($child_total) && $child_total == "") ? "selected" : ""; ?>>0</option>
                                                    <option value="1" <?= (isset($child_total) && $child_total == "1") ? "selected" : ""; ?>>1</option>
                                                    <option value="2" <?= (isset($child_total) && $child_total == "2") ? "selected" : ""; ?>>2</option>         
                                                    <option value="3" <?= (isset($child_total) && $child_total == "3") ? "selected" : ""; ?>>3</option>
                                                    <option value="4" <?= (isset($child_total) && $child_total == "4") ? "selected" : ""; ?>>4</option>
                                                    <option value="5" <?= (isset($child_total) && $child_total == "5") ? "selected" : ""; ?>>5</option>
                                                    <option value="6" <?= (isset($child_total) && $child_total == "6") ? "selected" : ""; ?>>6</option>
                                                </select>
                                            </div>	
                                        </li>
                                        <li class="span1_of_1 h-rooms">
                                            <h5>Rooms</h5>
                                            <!----------start section_room----------->
                                            <div class="section_room">
                                                <select id="country" name="room" onchange="change_country(this.value)" class="frm-field required">
                                                    <option value="1" <?=(isset($room) && $room == 1) ? "selected" : "" ?> >1</option>
                                                    <option value="2" <?=(isset($room) && $room == 2) ? "selected" : "" ?> >2</option>         
                                                    <option value="3" <?=(isset($room) && $room == 3) ? "selected" : "" ?> >3</option>
                                                    <option value="4" <?=(isset($room) && $room == 4) ? "selected" : "" ?> >4</option>
                                                    <option value="5" <?=(isset($room) && $room == 5) ? "selected" : "" ?> >5</option>
                                                    <option value="6" <?=(isset($room) && $room == 6) ? "selected" : "" ?> >6</option>
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
                                <input type="hidden" name="search_class" id="search_class">
                                <?= form_close() ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>	
    </div>
</div>
<!---strat-date-piker---->
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css') ?>" />
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
<script>
                                                        $(function () {
                                                            $(".datepicker").datepicker();
                                                        });
</script>

<!---/End-date-piker---->
