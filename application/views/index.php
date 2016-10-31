<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $page_title; ?> | Agile Project</title>
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //Custom Theme files -->
        <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?php echo base_url('assets/css/style.css') ?>" type="text/css" rel="stylesheet" media="all">
        <link href="<?php echo base_url('assets/css/flexslider.css') ?>" type="text/css" rel="stylesheet" media="screen" />
        <link href="<?php echo base_url('assets/css/JFFormStyle-1.css') ?>" type="text/css" rel="stylesheet" />
        <!-- js -->
        <script src="<?php echo base_url('assets/js/jquery-2.1.1.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/modernizr.custom.js') ?>"></script>
        <!-- //js -->
        <!-- fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,500italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- //fonts -->	
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script>
        <!--pop-up-->
        <script src="<?php echo base_url('assets/js/menu_jquery.js') ?>"></script>
        <!--//pop-up-->	
    </head>
    <body>
        <!--header-->
        <?php include 'header.php'; ?>
        <!--//header-->
        <?php include $page_name.'.php'; ?>
        <!-- footer -->
        <?php include 'footer.php'; ?>
        <!-- //footer -->
        <script defer src="<?php echo base_url('assets/js/jquery.flexslider.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/easyResponsiveTabs.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/script.js') ?>"></script>
        <script type="text/javascript">
                                        $(function () {
                                            SyntaxHighlighter.all();
                                        });
                                        $(window).load(function () {
                                            $('.flexslider').flexslider({
                                                animation: "slide",
                                                start: function (slider) {
                                                    $('body').removeClass('loading');
                                                }
                                            });
                                        });
        </script>		
    </body>
</html>