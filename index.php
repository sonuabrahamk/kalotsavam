<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="assets/img/logo.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Kalotsavam 2019 | Carmelaram Mount Carmel Parish</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <link rel="canonical" href="http://www.creative-tim.com/product/material-kit-pro" />

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-kit.css" rel="stylesheet"/>

        <link href="assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
        <link href="assets/assets-for-demo/demo.css" rel="stylesheet" />

        <link href="assets/css/custom.css" rel="stylesheet" />


    </head>

    <body class="index-page" ng-app="shellsApp" style="overflow-x: hidden;" id="top">

        <?php include('includes/alerts.php'); ?>
        <?php include('includes/navbar.php'); ?>
        <?php include('includes/hero.php'); ?>
        <?php include('includes/feature.php'); ?>
        <?php include('includes/events.php'); ?>
        <?php // include('includes/schedule.php'); ?>
        <?php // include('includes/team.php'); ?>
        <?php // include('includes/sponsor.php'); ?>
        <?php // include('includes/contact.php'); ?>
        <?php include('includes/footer.php'); ?>

        <?php /*include('includes/bot.php'); */?>

    </body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js"></script>
    <script src="assets/js/angularJS/angular.min.js"></script>
    <script src="assets/js/angularJS/angular-route.min.js"></script>
    <script src="assets/js/nouislider.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/js/jquery.dropdown.js" type="text/javascript"></script>
    <script src="assets/js/jquery.tagsinput.js"></script>
    <script src="assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script>
    <script src="assets/assets-for-demo/modernizr.js" type="text/javascript"></script>
    <script src="assets/assets-for-demo/vertical-nav.js" type="text/javascript"></script>
    <script src="assets/js/particles.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/js/controllers.js" type="text/javascript"></script>

    <script type="text/javascript">
        $().ready(function(){

            $(document).scroll(function(){
                if($(document).scrollTop() > 100){
                    $('nav').removeClass('navbar-transparent');
                    $('#navLogo').attr('src','assets/img/mandya_flag_blue.png');
                }
                else{
                    $('nav').addClass('navbar-transparent');
                    $('#navLogo').attr('src','assets/img/mandya_flag.png');
                }
            });
            var count = 0;
            setInterval(() => {
                if(count == 8){
                    count=0;
                }
                count+=1;
                $(".page-header").css("background-image","url('assets/img/sample/"+count+".JPG')");
            }, 5000);

            materialKitDemo.initContactUs2Map();

            particlesJS.load('particles-js', 'assets/particles.json', function() {
                console.log('callback - particles.js config loaded');
            });
            
            $('#contact-form').on('submit',function(e){
                
                $.ajax({
                    url: "includes/sendMessage.php",
                    type: "post",
                    data: $('#contact-form').serialize(),
                    success: function(data){
                        if(data == "1"){
                            $('#smallAlertModal').modal('show');
                            $('#uname').val("");
                            $('#uemail').val("");
                            $('#message').val("");
                            $('#utype').val("");
                        }
                        else{
//                            alert('error sending mail');
                            $('#smallAlertModalMailErr').modal('show');
                            $('#uname').val("");
                            $('#uemail').val("");
                            $('#message').val("");
                            $('#utype').val("");
                        }
                    },
                    error: function(){
                        $('#smallAlertModalError').modal('show');
                    }
                    
                });
                
            });

        });


    </script>
</html>