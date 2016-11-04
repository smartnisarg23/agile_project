<!-- banner-bottom -->
<div class="banner-bottom">
    <!-- container -->
    <div class="container">
        <div class="faqs-top-grids">
            <!--single-page-->
            <div class="single-page">
                <div class="col-md-12 single-gd-lt">
                    <div class="single-pg-hdr">
                        <h2><?php echo $hotel['name']; ?></h2>
                        <p><?php echo $hotel['addreaa_line1'] . ',' . $hotel['addreaa_line2'] ?></p>
                    </div>
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                            foreach ($hotel_images as $key => $img) {
                                ?>
                                <li data-thumb="<?php echo base_url('assets/images/') . ((!empty($img['image_source'])) ? $img['image_source'] : 'p1.jpg'); ?>">
                                    <img class="hotel-img" src="<?php echo base_url('assets/images/') . ((!empty($img['image_source'])) ? $img['image_source'] : 'p1.jpg'); ?>" alt=""/>
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
                <div class="col-md-12 single-gd-lt" style="margin-top: 20px">
                    <h2>Room Details</h2>
                </div>
                <div class="col-md-12 single-gd-lt" style="margin-top: 20px">
                    <table class="table table-hover"> 
                        <thead> 
                            <tr>
                                <th class="p-table-grad-heading"><h6>Room Type</h6></th> 
                                <th class="p-table-grad-heading"><h6>Price</h6></th> 
                                <th class="p-table-grad-heading"><h6>Action</h6></th> 
                        </thead> 
                        <tbody> 
                            <?php foreach ($hotel_rooms as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['room_type'] ?></td> 
                                    <td>$<?= $value['price'] ?></td> 
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" onclick="setAlert('<?php echo $value['id']; ?>', '<?php echo $value['room_type']; ?>', '<?php echo $value['price']; ?>')">Set Alert</button>
                                    </td> 
                                </tr> 
                            <?php } ?>

                        </tbody> 
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
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
                        <label>Your Selected Hotel: <span id="fl_p_name"></span></label>

                    </div>
                    <div class="form-group">
                        <label>Room Type: <span id="fl_pm_name"></span></label>
                    </div>
                    <div class="form-group">
                        <label>Actual Price</label>
                        <span id="fl_ac_price"></span>
                    </div>
                    <div class="form-group">
                        <label>Enter your expected price</label>
                        <input type="text" class="form-control" id="expected_price" placeholder="Enter price" required=""/>
                        <input type="hidden" class="form-control" id="alert_hotel_id"/>
                        <input type="hidden" class="form-control" id="alert_hotel_room_id"/>
                        <input type="hidden" class="form-control" id="alert_class"/>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="submitAlert()">Submit</button>
                </div>
                <div id="login_r_div" style="display: none">
                    <h4>Please do Login or Registration and try again.</h4>
                    <br>
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
    function setAlert(room_id, room_type, price) {
        $('#form_div').show();
        $('#msg_div').hide();
        $('#login_r_div').hide();
        $("#expected_price").val('');
        $("#fl_ac_price").html('$' + price);
        $("#fl_p_name").html('<?= $hotel['name'] ?>');
        $("#fl_pm_name").html(room_type);
        $("#alert_hotel_id").val('<?= $hotel_id ?>');
        $("#alert_hotel_room_id").val(room_id);
        $("#setAlertModal").modal('show');
    }
    function submitAlert() {
        var hotel_id = $("#alert_hotel_id").val();
        var hotel_room_id = $("#alert_hotel_room_id").val();
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
                        data: {hotel_id: hotel_id, hotel_room_id: hotel_room_id, price: expected_price},
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
<style>
    .hotel-img{
        height: 500px;
    }
</style>