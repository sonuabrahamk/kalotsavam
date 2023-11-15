<?php
session_start();

if(!isset($_SESSION['uid'])){
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/logo.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Kalotsavam | Dashboard</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--  Material Dashboard CSS    -->
        <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

        <link href="assets/css/custom.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <style>
            .alignData{
                text-align: center;
            }

            .table > thead > tr > th{
                padding: 15px 0;
                min-width: 80px;
                text-align: center;
            }

            .card .card-header .wizard-title{
                font-size: 1.2em;
            }

            .card .card-header .btn-info.focus, .card .card-header .btn-info:focus{
                border-color: transparent;
            }

            .navbar .form-group{
                display: block;
                margin: 7px 0 0 0;
            }

            .navbar .form-group input[type='text'].form-control{
                width: 90%;
                display: inline-block;
                margin: 0;
            }

            .form-group{
                display: inline-block;
            }

            .dropdown .form-group i{
                vertical-align: middle!important;
                color: #337ab7;
            }

            .main-panel > .content{
                margin-top: 0;
            }

            .parUpt{
                margin: 5px 10px;
                background: transparent;
                border: 2px solid #fff;
                color: #fff;
            }

            .parUpt:hover{
                background: inherit;
                border: 2px solid transparent;
                color: inherit;
            }
        </style>
    </head>

    <body>

        <div class="wrapper">

            <?php include('assets/snippets/sidebar.php'); ?>

            <div class="main-panel">
                <nav class="navbar">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="dropdown">
                                    <div class="form-group form-info is-empty">
                                        <i class="material-icons">filter_list</i>
                                        <input type="text" name="name" placeholder="Chest No" class="form-control" id="chTxt" style="width: 70%">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dropdown">
                                    <div class="form-group form-info is-empty">
                                        <i class="material-icons">filter_list</i>
                                        <input type="text" class="form-control" placeholder="Participant Name" id='nameTxt'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group form-info is-empty">
                                            <i class="material-icons">filter_list</i>
                                            <input type="text" class="form-control" placeholder="Parish Name" id='parishTxt'>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res1 = mysqli_query($connect,'SELECT DISTINCT(PARISH) FROM master_data');
                                            while($row = mysqli_fetch_array($res1)){
                                                echo '<li class="parishOpt"><a href="#">'.$row[0].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group form-info  is-empty">
                                            <i class="material-icons">filter_list</i>
                                            <input type="text" class="form-control" placeholder="Forane Name" id='foraneTxt'>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res2 = mysqli_query($connect,'SELECT DISTINCT(FORANE) FROM `master_data`');
                                            while($row = mysqli_fetch_array($res2)){
                                                echo '<li class="foraneOpt"><a href="#">'.$row[0].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group form-info is-empty">
                                            <i class="material-icons">filter_list</i>  
                                            <input type="text" class="form-control" placeholder="Event Name" id='eventTxt'>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res3 = mysqli_query($connect,'SELECT DISTINCT(NAME) FROM events WHERE STATUS="PUBLISHED"');
                                            while($row = mysqli_fetch_array($res3)){
                                                echo '<li class="eventOpt"><a href="#">'.$row[0].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group form-info is-empty">
                                            <i class="material-icons">filter_list</i>
                                            <input type="text" class="form-control" placeholder="Category Name" id='catTxt'>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res4 = mysqli_query($connect,'SELECT DISTINCT(CATEGORY) FROM events WHERE STATUS="PUBLISHED"');
                                            while($row = mysqli_fetch_array($res4)){
                                                echo '<li class="catOpt"><a href="#">'.$row[0].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 pull-right">
                                <button type="submit" class="btn btn-info pull-right btn-block" id="searchBtn" style="margin: 0 20px">Search</button>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                        <div class="col-lg-10">
                                            <h3 class="wizard-title" id="wizTitle">
                                                Select Category and Event above and click on Search
                                            </h3>
                                            <h5>To download the results displayed, click on the icon to the right.</h5>
                                        </div> 
                                        <div class="col-lg-1 pull-right">
                                            <a id='export' aria-expanded="false" style="cursor: pointer">
                                                <i class="material-icons" style="font-size: 2.5em;margin: 8px 0;">save_alt</i>
                                            </a>
                                        </div>
                                        <div style="clear: both"></div>
                                    </div>
                                    <div class="card-content">  
                                        <table class="table table-hover table-bordered result-table">
                                            <thead class="text-info">
                                                <th>Chest No</th>
                                                <th>NAME</th>
                                                <th>PARISH</th>
                                                <th>FORANE</th>
                                                <th>GRADE</th>
                                                <th>RANK</th>
                                                <th>POINTS</th>
                                            </thead>
                                            <tbody id='scoreTbl'>
                                                <tr>
                                                    <td colspan="7">No Data to Display! Select a category and event!</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include('assets/snippets/footer.php'); ?>
                </div>
            </div>
        </div>

    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <!-- <script src="assets/js/chartist.min.js"></script> -->

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->

    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script src="assets/js/results.js"></script>

</html>
