<!-- banner -->
<div class="banner">
    <!-- container -->
    <div class="container">
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
        <?php include 'search_form.php'; ?>
        <div class="clearfix"> </div>
    </div>
    <!-- //container -->
</div>
<!-- //banner -->
<div class="move-text"></div>
<div class="banner-bottom">
    <!-- container -->
    <div class="container">
        <div class="faqs-top-grids">
            <div class="product-grids">
                <?php if (isset($all_flights) && count($all_flights) > 0) { ?>
                    <div class="col-md-3 product-left">
                        <form method="post" action="<?= base_url('flights/search/' . $search_type) ?>" id="filter_form" name="filter_form">
                            <label style="color: #6FD508;margin-bottom: 1em;"><h4>Refine Search</h4></label>
                            <div class="h-class">
                                <h5>By Airline</h5>
                                <?php foreach ($all_providers as $key => $value) { ?>
                                    <div class="hotel-price">
                                        <label class="check">
                                            <input type="radio" name="airline_refine" value="<?= $value['id'] ?>" <?= (isset($airline_refine) && $airline_refine == $value['id']) ? "checked" : ""; ?>>
                                            <span class="p-day-grid"><?= $value['provider_name'] ?></span>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                            <input type="hidden" name="origin_id" value="<?= (isset($origin_id) && $origin_id != "") ? $origin_id : "" ?>">
                            <input type="hidden" name="destination_id" value="<?= (isset($destination_id) && $destination_id != "") ? $destination_id : "" ?>">
                            <input type="hidden" name="departure_date" value="<?= (isset($departure_date) && $departure_date != "") ? $departure_date : "" ?>">
                            <input type="hidden" name="return_date" value="<?= (isset($return_date) && $return_date != "") ? $return_date : "" ?>">
                            <input type="hidden" name="adults_total" value="<?= (isset($adults_total) && $adults_total != "") ? $adults_total : "" ?>">
                            <input type="hidden" name="child_total" value="<?= (isset($child_total) && $child_total != "") ? $child_total : "" ?>">
                            <input type="hidden" name="class" value="<?= (isset($class) && $class != "") ? $class : "" ?>">
                            <input type="submit" value="Refine" name="submit">
                        </form>
                        <br/>
                        <br/>
                        <a href="<?=  base_url('places/index/'.$city)?>" target="_blank"><button type="button" class="btn btn-success">Check Near By Places</button></a>
                    </div>
                    <div class="col-md-9 product-right">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Airline</th>
                                    <th>Departure</th>
                                    <th>Arrival</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if ($search_type == "oneway") { ?>
                                    <?php foreach ($all_flights as $key => $value) { ?>
                                        <tr>
                                            <td><img  class="search_provider_logo" src="<?= $value['provider_logo'] ?>">
                                                <br/>
                                                <span class="provider_name"><?= $value['provider_name'] ?></span>
                                                <br/>
                                                <span class="flight_number"><?= $value['flight_number'] ?></span>
                                            </td>
                                            <td><span class="provider_name"><?= $value['departure_time'] ?></span><br/><span class="flight_number"><?= $value['origin'] ?></span></td>
                                            <td><span class="provider_name"><?= $value['arriving_time'] ?></span><br/><span class="flight_number"><?= $value['destination'] ?></span></td>
                                            <td><span class="provider_name"><?= $value['total_time'] . "h" ?></span><br/><span class="flight_number">Non stop</span></td>
                                            <?php
                                            $base_fare = 0;
                                            if ($class == "economy") {
                                                $base_fare = intval($value['fare_economy']) * intval($adults_total);
                                                $fare = $value['fare_economy'];
                                                if (isset($child_total) && $child_total != "") {
                                                    $base_fare += intval($value['fare_economy']) * intval($child_total);
                                                }
                                            }
                                            if ($class == "business") {
                                                $base_fare = intval($value['fare_business']) * intval($adults_total);
                                                $fare = $value['fare_business'];
                                                if (isset($child_total) && $child_total != "") {
                                                    $base_fare += intval($value['fare_business']) * intval($child_total);
                                                }
                                            }
                                            ?>
                                            <td class="price">$<?= $base_fare ?><br/><span class="flight_number">$<?= $fare ?> per person</span></td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" onclick="setAlertOneWay('<?= $base_fare ?>', '<?= $value['id'] ?>', '<?= $value['provider_name'] ?>', '<?= $value['provider_logo'] ?>', '<?= $class ?>')">Set Alert</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php foreach ($all_flights as $key => $value) { ?>
                                        <tr>
                                            <td><img  class="search_provider_logo" src="<?= $value['depart']['provider_logo'] ?>">
                                                <br/>
                                                <span class="provider_name"><?= $value['depart']['provider_name'] ?></span>
                                                <br/>
                                                <span class="flight_number"><?= $value['depart']['flight_number'] ?></span>
                                            </td>
                                            <td><span class="provider_name"><?= $value['depart']['departure_time'] ?></span><br/><span class="flight_number"><?= $value['depart']['origin'] ?></span></td>
                                            <td><span class="provider_name"><?= $value['depart']['arriving_time'] ?></span><br/><span class="flight_number"><?= $value['depart']['destination'] ?></span></td>
                                            <td><span class="provider_name"><?= $value['depart']['total_time'] . "h" ?></span><br/><span class="flight_number">Non stop</span></td>
                                            <?php
                                            $base_fare = 0;
                                            if ($class == "economy") {
                                                $base_fare = intval($value['depart']['fare_economy']) * intval($adults_total);
                                                $fare = $value['depart']['fare_economy'];
                                                if (isset($child_total) && $child_total != "") {
                                                    $base_fare += intval($value['depart']['fare_economy']) * intval($child_total);
                                                }
                                            }
                                            if ($class == "business") {
                                                $base_fare = intval($value['depart']['fare_business']) * intval($adults_total);
                                                $fare = $value['depart']['fare_business'];
                                                if (isset($child_total) && $child_total != "") {
                                                    $base_fare += intval($value['depart']['fare_business']) * intval($child_total);
                                                }
                                            }
                                            if ($class == "economy") {
                                                $base_fare += intval($value['return']['fare_economy']) * intval($adults_total);
                                                if (isset($child_total) && $child_total != "") {
                                                    $base_fare += intval($value['return']['fare_economy']) * intval($child_total);
                                                }
                                            }
                                            if ($class == "business") {
                                                $base_fare += intval($value['return']['fare_business']) * intval($adults_total);
                                                if (isset($child_total) && $child_total != "") {
                                                    $base_fare += intval($value['return']['fare_business']) * intval($child_total);
                                                }
                                            }
                                            ?>
                                            <td class="price" rowspan="2" style="vertical-align: middle">$<?= $base_fare ?><br/><span class="flight_number">$<?= $fare ?> per person</span></td>
                                            <td rowspan="2" style="vertical-align: middle"><button type="button" class="btn btn-danger" onclick="setAlertTwoWay('<?= $base_fare ?>', '<?= $value['depart']['id'] ?>', '<?= $value['depart']['provider_name'] ?>', '<?= $value['depart']['provider_logo'] ?>', '<?= $class ?>')">Set Alert</button></td>
                                        </tr>
                                        <tr class="last_tr">
                                            <td><img  class="search_provider_logo" src="<?= $value['return']['provider_logo'] ?>">
                                                <br/>
                                                <span class="provider_name"><?= $value['return']['provider_name'] ?></span>
                                                <br/>
                                                <span class="flight_number"><?= $value['return']['flight_number'] ?></span>
                                            </td>
                                            <td><span class="provider_name"><?= $value['return']['departure_time'] ?></span><br/><span class="flight_number"><?= $value['return']['origin'] ?></span></td>
                                            <td><span class="provider_name"><?= $value['return']['arriving_time'] ?></span><br/><span class="flight_number"><?= $value['return']['destination'] ?></span></td>
                                            <td><span class="provider_name"><?= $value['return']['total_time'] . "h" ?></span><br/><span class="flight_number">Non stop</span></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissable">
                            Sorry!No Flights found.
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //container -->
</div>
<style type="text/css">
    .search_provider_logo{
        width: 50px;
    }
    .provider_name{
        font-size: 11px;
        line-height: 1.1em;
        color: royalblue
    }
    .flight_number{
        font-size: 9px;
        line-height: 1.1em;
    }
    .price{
        font-size: 18px;
        font-weight: bold;
    }
    .table > thead > tr > th,
    .table > tbody > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tbody > tr > td,
    .table > tfoot > tr > td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 0px;
    }
    .last_tr {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-bottom: 1px solid #ddd;
    }
</style>
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
                        <label for="exampleInputEmail1">Your Selected Date</label>
                        <span id="fl_date"><?= $departure_date ?></span>
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
                        <input type="hidden" class="form-control" id="alert_flight_id"/>
                        <input type="hidden" class="form-control" id="alert_class"/>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="submitAlert()">Submit</button>
                </div>
                <div id="login_r_div" style="display: none">
                    <h4>Please do Login or Registration and try again.</h4>
                    <a href="<?= base_url('auth/signup') ?>" target="_blank"><button type="button" class="btn btn-warning">Registration</button></a>
                    <a href="<?= base_url('auth/login') ?>" target="_blank"><button type="button" class="btn btn-success">Login</button></a>
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
    $(document).ready(function () {
//        $(".fb_share_btn").click(function () {
//            FB.ui({
//                method: 'share',
//                display: 'popup',
//                href: 'https://www.initiativewebsolutions.com',
//            }, function (response) {});
//        });
    });
    function setAlertOneWay(fare, flight_id, provider, p_logo, class_type) {
        $('#form_div').show();
        $('#msg_div').hide();
        $('#login_r_div').hide();
        $("#expected_price").val('');
        $("#fl_ac_price").html('$' + fare);
        $("#alert_flight_id").val(flight_id);
        $("#alert_class").val(class_type);
        $("#fl_p_name").html(provider);
        $('#fl_p_logo img').attr('src', p_logo);
        $("#setAlertModal").modal('show');
    }
    function setAlertTwoWay(fare, flight_id, provider, p_logo, class_type) {
        $('#form_div').show();
        $('#msg_div').hide();
        $('#login_r_div').hide();
        $("#expected_price").val('');
        $("#fl_ac_price").html('$' + fare);
        $("#alert_flight_id").val(flight_id);
        $("#alert_class").val(class_type);
        $("#fl_p_name").html(provider);
        $('#fl_p_logo img').attr('src', p_logo);
        $("#setAlertModal").modal('show');
    }
    function submitAlert() {
        var flight_id = $("#alert_flight_id").val();
        var expected_price = $("#expected_price").val();
        var class_type = $("#alert_class").val();
        $.ajax({
            url: '<?= base_url("auth/checkLogin") ?>',
            type: "GET",
            success: function (data) {
                console.log(data);
                if (data == "success") {
                    $.ajax({
                        url: '<?= base_url("flights/setAlert") ?>',
                        type: "POST",
                        data: {flight_id: flight_id, price: expected_price, flight_class: class_type},
                        success: function (data) {
                            $('#form_div').hide();
                            $('#msg_div').show();
                        }
                    });
                } else {
                    $('#form_div').hide();
                    $('#login_r_div').show();
                }
            }
        });
    }
</script>