<?php

session_start();

if(isset($_SESSION['uid'])){
    if(($_SESSION['category'] != 'SUPERADMIN')&&($_SESSION['category'] != 'DATA_ENTRY')){
        header('Location: login.php');
    }
}
else{
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

            .navbar{
                position: relative;
                z-index: 999;
            }

            .navbar::after{
                content: '';
                z-index: -1;
                position:absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('assets/img/bg7.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: bottom;
            }


            .navbar::before{
                content: '';
                z-index: 0;
                position:absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(250,250,250,0.9);
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

            /* .footer{
                background-color: #eeeeee;
                color: #3C4858;
            } */

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
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group form-info is-empty">
                                            <i class="material-icons">filter_list</i>  
                                            <input type="text" class="form-control" placeholder="Event Name" id='eventTxt'>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res3 = mysqli_query($connect,'SELECT DISTINCT(NAME) FROM events WHERE STATUS="PENDING" ');
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
                                            $res4 = mysqli_query($connect,'SELECT DISTINCT(CATEGORY) FROM events WHERE STATUS="PENDING" ');
                                            while($row = mysqli_fetch_array($res4)){
                                                echo '<li class="catOpt"><a href="#">'.$row[0].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
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
                                        <div class="col-lg-8">
                                            <h3 class="wizard-title" id="wizTitle">
                                                Participant List
                                            </h3>
                                            <h5>Fill the required search filters and click on search</h5>
                                        </div> 
                                        <div class="col-lg-2 pull-right">
                                            <button type="submit" class="btn btn-info btn-block parUpt" id="partUpt">Update</button>
                                        </div>
                                        <div style="clear: both"></div>
                                    </div>
                                    <div class="card-content">  
                                        <form name='scores' id='scoreVals'>
                                            <input type="text" name="secDisplay" value="section" style="display:none" />
                                            <table class="table table-hover table-bordered partTable">
                                                <thead class="text-info">
                                                    <th style="min-width: 40px;"></th>
                                                    <th style="min-width: 80px;">Chest No</th>
                                                    <th>Event</th>
                                                    <th>Category</th>
                                                    <th>SECTION</th>
                                                    <th style="min-width: 100px;">ACTION</th>
                                                </thead>
                                                <tbody id='scoreTbl'>
                                                    <tr>
                                                        <td colspan="7">No Data to Display! Select a category and event!</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include('assets/snippets/footer.php'); ?>
            </div>
        </div>

    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script src="assets/js/absense.js"></script>

</html>
