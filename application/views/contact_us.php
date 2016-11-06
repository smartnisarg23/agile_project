<div class="banner-bottom">
    <!-- container -->
    <div class="container">
        <div class="about-info">
            <h2>Contact Us</h2>
        </div>
        <div class="faqs-top-grids">
            <div class="contact-grids">
                <div class="col-md-7 contact-para">
                    <h5>Contact Form</h5>
                    <form>
                        <div class="grid-contact">
                            <div class="col-md-6 contact-grid">
                                <p>First Name</p>		
                                <input type="text" name="first_name" id="first_name" required="required">
                            </div>
                            <div class="col-md-6 contact-grid">
                                <p>Last Name</p>		
                                <input type="text" name="last_name" id="last_name" required="required">						
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="grid-contact">
                            <div class="col-md-6 contact-grid">
                                <p>Email</p>						
                                <input type="email" name="email_id" id="email_id" required="required">							
                            </div>
                            <div class="col-md-6 contact-grid">						
                                <p>Phone (Optional)</p>						
                                <input type="text" name="phone" id="phone">							
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <p class="your-para">Message</p>
                        <textarea cols="77" rows="6" name="message" id="message"></textarea>
                        <div class="send">
                            <input type="submit" value="Send" id="contact_submit">
                        </div>
                    </form>
                </div>
                <div class="col-md-5 contact-map">
                    <h5>Loaction</h5>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBkMMpeICC-2B-0658cwSaBumIAyAWdQ54&q=Unitech+Institute+of+technology,Auckland,NZ"></iframe>
                        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59247.84555941436!2d-74.00101359585908!3d40.691888370076846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1440747755360" allowfullscreen=""></iframe>-->
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //container -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#contact_submit').submit(function () {
            var error = 0;
            if ($('#first_name').val() == "") {
                alert("Please enter first name");
                error = 1;
            }
            if ($('#last_name').val() == "" && error == 0) {
                alert("Please enter last name");
                error = 1;
            }
            if ($('#email_id').val() == "" && error == 0) {
                alert("Please enter email id");
                error = 1;
            }
            if ($('#message').val() == "" && error == 0) {
                alert("Please enter message");
                error = 1;
            }
            if (error == 0) {
                alert("We got your request. We will get back you soon");
            }
        });
    });
</script>