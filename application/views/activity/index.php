<div class="banner-bottom">
    <div class="container">
        <h1>User Activity</h1>
        <div class="banner-bottom-grids">
            <?php if (isset($user_flights) && $user_flights != "") { ?>
                <div class="col-md-12 weekend-grids">
                    <div class="top-destinations-grids">
                        <div class="top-destinations-info">
                            <h4>Flights Details</h4>
                        </div>
                        <div class="top-destinations-bottom">
                            <table class="table table-hover"> 
                                <thead> 
                                    <tr>
                                        <th class="p-table-grad-heading"><h6>Provider</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Date</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Origin</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Destination</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Class</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Expected Price</h6></th> 
                                </thead> 
                                <tbody> 
                                    <?php foreach ($user_flights as $key => $flight) { ?>
                                        <tr>
                                            <td><?= $flight['provider_name'] ?></td> 
                                            <td><?= $flight['departure_time'] ?></td> 
                                            <td><?= $flight['origin'] ?></td> 
                                            <td><?= $flight['destination'] ?></td> 
                                            <td><?= $flight['class_type'] ?></td> 
                                            <td>$<?= $flight['expected_price'] ?></td> 
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
                            No flight data found
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($user_hotels) && $user_hotels != "") { ?>
                <div class="col-md-12 weekend-grids">
                    <div class="top-destinations-grids">
                        <div class="top-destinations-info">
                            <h4>Hotels Details</h4>
                        </div>
                        <div class="top-destinations-bottom">
                            <table class="table table-hover"> 
                                <thead> 
                                    <tr>
                                        <th class="p-table-grad-heading"><h6>Hotel</h6></th> 
                                        <th class="p-table-grad-heading"><h6>Room Type</h6></th>
                                        <th class="p-table-grad-heading"><h6>Expected Price</h6></th> 
                                </thead> 
                                <tbody> 
                                    <?php foreach ($user_hotels as $key => $hotel) { ?>
                                        <tr>
                                            <td><?= $hotel['name'] ?></td> 
                                            <td><?= $hotel['class_type'] ?></td> 
                                            <td>$<?= $hotel['expected_price'] ?></td> 
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
                            No hotels data found
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
