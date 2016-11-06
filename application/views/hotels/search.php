<div class="banner hotels-banner">
    <!-- container -->
    <div class="container">
        <?php include 'search_form.php'; ?>
        <div class="clearfix"> </div>
    </div>
    <!-- //container -->
</div>
<div class="container">
    <?php if (isset($all_hotels) && $all_hotels != "") { ?>
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
                                    <input type="radio" class="hotel_class" name="hotel_class"  value="<?php echo $s ?>" <?= (isset($search_class) && $search_class == $s) ? "checked" : "" ?> >
                                    <?php
                                    for ($i = 0; $i < $s; $i++) {
                                        ?>
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        <?php
                                    }
                                    ?>

                                    <!--<span class="starTextLabel"><?php echo $s; ?> Stars (<?php echo (!empty($hotels_stars_count[$s])) ? $hotels_stars_count[$s] : 0; ?>)</span>-->
                                    <span class="starTextLabel"><?php echo $s; ?> Stars</span>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <br>
                    <a href="<?=  base_url('places/index/'.$city)?>" target="_blank"><button type="button" class="btn btn-success">Check Near By Places</button></a>
                    <script>
                        $(document).ready(function () {
                            $(".hotel_class").on("click", function () {
                                $("#search_class").val($(this).val());
                                $('#search_form').submit();
                            });
                        });
                    </script>
                </div>
                <div class="col-md-9 product-right">
                    <?php foreach ($all_hotels as $key => $hotel) { ?>
                        <div class="product-right-grids">
                            <div class="product-right-top">
                                <div class="p-left">
                                    <div class="">
                                        <a href="<?php echo base_url('hotels/viewHotel/' . $hotel['id']); ?>"> 
                                            <img src="<?php echo base_url('assets/images/') . ((!empty($hotel['image'])) ? $hotel['image'] : 'p1.jpg'); ?>" style="width: 100%" />
                                        </a>
                                    </div>
                                </div>
                                <div class="p-right">
                                    <div class="col-md-6 p-right-left">
                                        <a href="<?php echo base_url('hotels/viewHotel/' . $hotel['id']); ?>"><?php echo $hotel['name']; ?></a>
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
    <?php } ?>

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
    function setAlert(id, name, price) {
        $('#form_div').show();
        $('#msg_div').hide();
        $('#login_r_div').hide();
        $("#expected_price").val('');
        $("#fl_ac_price").html('$' + price);
        $("#fl_p_name").html(name);
        $("#alert_hotel_id").val(id);
        $("#setAlertModal").modal('show');
    }
    function submitAlert() {
        var hotel_id = $("#alert_hotel_id").val();
        var expected_price = $("#expected_price").val();

        $.ajax({
            url: '<?= base_url("auth/checkLogin") ?>',
            type: "GET",
            success: function (data) {
                console.log(data);
                if (data == "success") {
                    $.ajax({
                        url: '<?= base_url("hotels/setAlert") ?>',
                        type: "POST",
                        data: {hotel_id: hotel_id, price: expected_price},
                        success: function (data) {
                            console.log(data);
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