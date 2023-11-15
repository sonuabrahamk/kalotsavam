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
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> -->

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-kit.css" rel="stylesheet"/>

        <link href="assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
        <link href="assets/assets-for-demo/demo.css" rel="stylesheet" />

        <link href="assets/css/custom.css" rel="stylesheet" />
        <link href="assets/css/results.css" rel="stylesheet" />


    </head>

    <body class="index-page" ng-app="shellsApp" style="overflow-x: hidden;">

        <?php include('includes/alerts.php'); ?>
        <nav class="navbar navbar-transparent navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img class="logo" id="navLogo" src="assets/img/mandya_flag.png">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navigation-example">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="index.php#section-events">
                                Events
                            </a>
                        </li>
                        <li>
                            <a href="index.php#section-teams">
                                Maps
                            </a>
                        </li>
                        <li>
                            <a href="index.php#section-schedule">
                                Schedule
                            </a>
                        </li>
                        <li>
                            <a href="results.php">
                                Results
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hide">
                        <li>
                            <a href="https://www.facebook.com/">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="row" style="margin-top: 100px;">
                <div class="col-lg-12 col-md-12">
                    <h2 style="text-align: center;">10<sup>th</sup> Bible Kalotsavam Results 2022</h2>
                </div>               
                <div class="col-lg-12 col-md-12">
                    <!-- Tabs with icons on Card -->
                    <div class="card card-nav-tabs">
                        <div class="header header-info">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                            <div class="nav-tabs-navigation hidden-xs hidden-sm">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs text-center" data-tabs="tabs">
                                        <li class="active">
                                            <a href="index.html#lower" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                Lower Primary
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#upper" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                Upper Primary
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#high" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                High School
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#higher" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                Higher Secondary School
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#group" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                Group
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="nav-tabs-navigation hidden-md hidden-lg">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs text-center" data-tabs="tabs">
                                        <li class="active">
                                            <a href="index.html#lower" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                LP
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#upper" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                UP
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#high" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                HS
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#higher" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                HSS
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#group" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                Group
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="lower">
                                    <div class="row">
                                        <?php

                                            require ('dashboard/assets/snippets/connect.php');
                                            if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE STATUS='PUBLISHED' AND CATEGORY='Lower Primary' ORDER BY `NAME`")){
                                                if(mysqli_num_rows($res) > 0){
                                                    
                                                
                                                    while($row = mysqli_fetch_array($res)){
                                                        
                                                    ?>

                                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                                            <div class="card card-pricing">
                                                                <a href="bkresults.php?section=<?php echo $row['SECTION']; ?>">
                                                                    <div class="content">
                                                                        <h3 class="card-title"><?php echo $row['NAME']; ?></h3>
                                                                        <img alt="Circle Image" class="img-circle img-responsive" src="assets/img/events/<?php echo $row['NAME'];?>.jpg">
                                                                        <h6 class="category text-gray">View Result</h6>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                }
                                                else{
                                                    echo '<h3>Results are yet to be published!!</h3>';
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="upper">
                                <div class="row">
                                        <?php

                                            require ('dashboard/assets/snippets/connect.php');
                                            if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE STATUS='PUBLISHED' AND CATEGORY='Upper Primary' ORDER BY `NAME`")){
                                                if(mysqli_num_rows($res) > 0){
                                                    
                                                
                                                    while($row = mysqli_fetch_array($res)){
                                                        
                                                    ?>

                                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                                            <div class="card card-pricing">
                                                                <a href="bkresults.php?section=<?php echo $row['SECTION']; ?>">
                                                                    <div class="content">
                                                                        <h3 class="card-title"><?php echo $row['NAME']; ?></h3>
                                                                        <img alt="Circle Image" class="img-circle img-responsive" src="assets/img/events/<?php echo $row['NAME'];?>.jpg">
                                                                        <h6 class="category text-gray">View Result</h6>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                }
                                                else{
                                                    echo '<h3>Results are yet to be published!!</h3>';
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="high">
                                    <div class="row">
                                        <?php

                                            require ('dashboard/assets/snippets/connect.php');
                                            if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE STATUS='PUBLISHED' AND CATEGORY='High School' ORDER BY `NAME`")){
                                                if(mysqli_num_rows($res) > 0){
                                                    
                                                
                                                    while($row = mysqli_fetch_array($res)){
                                                        
                                                    ?>

                                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                                            <div class="card card-pricing">
                                                                <a href="bkresults.php?section=<?php echo $row['SECTION']; ?>">
                                                                    <div class="content">
                                                                        <h3 class="card-title"><?php echo $row['NAME']; ?></h3>
                                                                        <img alt="Circle Image" class="img-circle img-responsive" src="assets/img/events/<?php echo $row['NAME'];?>.jpg">
                                                                        <h6 class="category text-gray">View Result</h6>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                }
                                                else{
                                                    echo '<h3>Results are yet to be published!!</h3>';
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="higher">
                                    <div class="row">
                                        <?php

                                            require ('dashboard/assets/snippets/connect.php');
                                            if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE STATUS='PUBLISHED' AND CATEGORY='Higher Secondary School' ORDER BY `NAME`")){
                                                if(mysqli_num_rows($res) > 0){
                                                    
                                                
                                                    while($row = mysqli_fetch_array($res)){
                                                        
                                                    ?>

                                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                                            <div class="card card-pricing">
                                                                <a href="bkresults.php?section=<?php echo $row['SECTION']; ?>">
                                                                    <div class="content">
                                                                        <h3 class="card-title"><?php echo $row['NAME']; ?></h3>
                                                                        <img alt="Circle Image" class="img-circle img-responsive" src="assets/img/events/<?php echo $row['NAME'];?>.jpg">
                                                                        <h6 class="category text-gray">View Result</h6>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                }
                                                else{
                                                    echo '<h3>Results are yet to be published!!</h3>';
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="group">
                                    <div class="row">
                                        <?php

                                            require ('dashboard/assets/snippets/connect.php');
                                            if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE STATUS='PUBLISHED' AND CATEGORY='Group' AND SECTION <> 'GD-G' ORDER BY `NAME`")){
                                                if(mysqli_num_rows($res) > 0){
                                                    
                                                
                                                    while($row = mysqli_fetch_array($res)){
                                                        
                                                    ?>

                                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                                            <div class="card card-pricing">
                                                                <a href="bkresults.php?section=<?php echo $row['SECTION']; ?>">
                                                                    <div class="content">
                                                                        <h3 class="card-title"><?php echo $row['NAME']; ?></h3>
                                                                        <img alt="Circle Image" class="img-circle img-responsive" src="assets/img/events/<?php echo $row['NAME'];?>.jpg">
                                                                        <h6 class="category text-gray">View Result</h6>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                }
                                                else{
                                                    echo '<h3>Results are yet to be published!!</h3>';
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tabs with icons on Card -->
                </div>

            </div>
        </div>


        <?php include('includes/footer.php'); ?>

    </body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script>

    <script type="text/javascript">
        $().ready(function(){
            // materialKitDemo.initContactUs2Map();

            $('nav').removeClass('navbar-transparent');
            $('#navLogo').attr('src','assets/img/mandya_flag_blue.png');


        
        });


    </script>
</html>