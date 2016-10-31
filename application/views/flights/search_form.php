<div class="col-md-4 banner-left">
    <section class="slider2">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/1.jpg') ?>" alt="">
                    </div>
                </li>
                <li>
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/2.jpg') ?>" alt="">
                    </div>
                </li>
                <li>	
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/3.jpg') ?>" alt="">
                    </div>
                </li>
                <li>	
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/4.jpg') ?>" alt="">
                    </div>
                </li>
                <li>	
                    <div class="slider-info">
                        <img src="<?php echo base_url('assets/images/2.jpg') ?>" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--FlexSlider-->
</div>
<div class="col-md-8 banner-right">
    <div class="sap_tabs">	
        <div class="booking-info">
            <h2>Book Domestic & International Flight Tickets</h2>
        </div>
        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
            <ul class="resp-tabs-list">
                <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Return</span></li>
                <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>One way</span></li>
                <div class="clearfix"></div>
            </ul>		
            <!---->		  	 
            <div class="resp-tabs-container">
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                    <div class="facts">
                        <div class="booking-form">
                            <div class="online_reservation">
                                <div class="b_room">
                                    <div class="booking_room">
                                        <?= form_open(base_url('flights/search/twoway'),array('name'=>'search_form','id'=>'search_form')) ?>
                                        <div class="reservation">
                                            <ul>		
                                                <li  class="span1_of_1 desti">
                                                    <h5>Flying from</h5>
                                                    <div class="book_date">
                                                        <select class="frm-field required" name="origin_id">
                                                            <option value="">Select Origin Place</option>
                                                            <?php foreach ($allCities as $key => $value) { ?>
                                                                <option value="<?= $value['id'] ?>" <?= (isset($origin_id) && $origin_id == $value['id']) ? "selected" : ""; ?>><?= $value['name'] ?></option>         
                                                            <?php } ?>
                                                        </select>
                                                    </div>					
                                                </li>
                                                <li  class="span1_of_1 left desti">
                                                    <h5>Flying to</h5>
                                                    <div class="book_date">
                                                        <select class="frm-field required" name="destination_id">
                                                            <option value="">Select Origin Place</option>
                                                            <?php foreach ($allCities as $key => $value) { ?>
                                                                <option value="<?= $value['id'] ?>" <?= (isset($destination_id) && $destination_id == $value['id']) ? "selected" : ""; ?>><?= $value['name'] ?></option>         
                                                            <?php } ?>
                                                        </select>
                                                    </div>		
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="reservation">
                                            <ul>	
                                                <li  class="span1_of_1">
                                                    <h5>Departure</h5>
                                                    <div class="book_date">
                                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                        <input type="text"  name="departure_date" class="datepicker" value="<?= (isset($departure_date) && $departure_date != "") ? $departure_date : ""; ?>">
                                                    </div>		
                                                </li>
                                                <li  class="span1_of_1 left">
                                                    <h5>Return</h5>
                                                    <div class="book_date">
                                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                        <input type="text"  name="return_date" class="datepicker" value="<?= (isset($return_date) && $return_date != "") ? $return_date : ""; ?>">
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
                                                <li class="span1_of_1 economy">
                                                    <h5>Class</h5>
                                                    <!----------start section_room----------->
                                                    <div class="section_room">
                                                        <select name="class" class="frm-field required">
                                                            <option value="economy" <?= (isset($class) && $class == "economy") ? "selected" : ""; ?>>Economy</option>
                                                            <option value="business" <?= (isset($class) && $class == "business") ? "selected" : ""; ?>>Business</option>     
                                                        </select>
                                                    </div>	
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="reservation">
                                            <ul>	
                                                <li class="span1_of_3">
                                                    <div class="date_btn">
                                                        <input type="submit" value="Search" name="twoway_search"/>
                                                    </div>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!---->
                        </div>	
                    </div>
                </div>		
                <div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
                    <div class="facts">
                        <div class="booking-form">
                            <div class="online_reservation">
                                <div class="b_room">
                                    <div class="booking_room">
                                        <?= form_open(base_url('flights/search/oneway')) ?>
                                        <div class="reservation">
                                            <ul>		
                                                <li  class="span1_of_1 desti">
                                                    <h5>Flying from</h5>
                                                    <div class="book_date">
                                                        <select class="frm-field required" name="origin_id">
                                                            <option value="">Select Origin Place</option>
                                                            <?php foreach ($allCities as $key => $value) { ?>
                                                                <option value="<?= $value['id'] ?>" <?= (isset($origin_id) && $origin_id == $value['id']) ? "selected" : ""; ?>><?= $value['name'] ?></option>         
                                                            <?php } ?>
                                                        </select>
                                                    </div>					
                                                </li>
                                                <li  class="span1_of_1 left desti">
                                                    <h5>Flying to</h5>
                                                    <div class="book_date">
                                                        <select class="frm-field required" name="destination_id">
                                                            <option value="">Select Destination Place</option>
                                                            <?php foreach ($allCities as $key => $value) { ?>
                                                                <option value="<?= $value['id'] ?>" <?= (isset($destination_id) && $destination_id == $value['id']) ? "selected" : ""; ?>><?= $value['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>		
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="reservation">
                                            <ul>
                                                <li  class="span1_of_1">
                                                    <h5>Departure</h5>
                                                    <div class="book_date">
                                                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                                        <input type="date"  name="departure_date" class="datepicker" value="<?= (isset($departure_date) && $departure_date != "") ? $departure_date : ""; ?>">
                                                    </div>		
                                                </li>
                                                <li class="span1_of_1 left">
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
                                                <li class="span1_of_1 left tab-children">
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
                                                <li class="span1_of_1 economy">
                                                    <h5>Class</h5>
                                                    <!----------start section_room----------->
                                                    <div class="section_room">
                                                        <select name="class" class="frm-field required">
                                                            <option value="economy">Economy</option>
                                                            <option value="business">Business</option>     
                                                        </select>
                                                    </div>	
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                        <div class="reservation">
                                            <ul>	
                                                <li class="span1_of_3">
                                                    <div class="date_btn">
                                                        <input type="submit" value="Search" />
                                                    </div>
                                                </li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!---->
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
