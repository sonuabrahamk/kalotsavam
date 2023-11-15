<?php
session_start();

if(isset($_SESSION['uid'])){
    if(($_SESSION['category'] != 'SUPERADMIN')&&($_SESSION['category'] != 'PUBLISHER')){
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
            .modal-content .modal-footer button{
                margin: 20px 0;
                width: 100%;
            }

            .modal{
                z-index: 999;
            }
        </style>
    </head>

    <body>

        <div class="wrapper">

            <?php include('assets/snippets/sidebar.php'); ?>

            <div class="main-panel">

                <nav class="navbar navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- <a class="navbar-brand" href="#">Add Scores</a> -->
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group  is-empty">
                                            <i class="material-icons">filter_list</i>
                                            <input type="text" class="form-control" placeholder="Category" id='categoryBtn' autocomplete="off">
                                            <span class="material-input"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res = mysqli_query($connect,'SELECT DISTINCT(CATEGORY) FROM events WHERE STATUS="APPROVED"');
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<li class="catOpt"><a href="#">'.$row[0].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group  is-empty">
                                            <i class="material-icons">filter_list</i>
                                            <input type="text" class="form-control" placeholder="Event Name" id='eventBtn' autocomplete="off">
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res = mysqli_query($connect,'SELECT DISTINCT(NAME) FROM events WHERE STATUS="APPROVED"');
                                            while($row = mysqli_fetch_array($res)){
                                                echo '<li class="eventOpt"><a href="#">'.$row[0].'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-info pull-right btn-block" id="searchBtn" style="margin: 0 20px">Search</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                        <div class="col-lg-12">
                                            <h3 class="wizard-title" id="wizTitle">
                                                Select Category and Event above and click on Search
                                            </h3>
                                            <h5>The Chest number for the results to be verified would be populated automatically according to the selection made above.</h5>
                                        </div> 
                                        <div style="clear: both"></div>
                                    </div>
                                    <div class="card-content">  
                                        <form name='scores' id='scoreVals'>
                                            <input type="text" name="secDisplay" value="section" style="display:none" />
                                            <table class="table table-hover table-bordered result-table">
                                                <thead class="text-info">
                                                    <th style="width: 110px;">Chest NO</th>
                                                    <th>Status</th>
                                                    <th>Judge 1</th>
                                                    <th>Judge 2</th>
                                                    <th>Judge 3</th>
                                                    <th>MARKS</th>
                                                    <th>GRADE</th>
                                                    <th>GD PTS</th>
                                                    <th>RANK</th>
                                                    <th>RK PTS</th>
                                                    <th>TOTAL PTS</th>
                                                </thead>
                                                <tbody id='scoreTbl'>
                                                    <tr>
                                                        <td colspan="11">No Data to Display! Select a category and event!</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right">
                                            <button type="submit" class="btn btn-info pull-right btn-block" id="uptScores">PUBLISH Scores</button>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12 pull-right">
                                            <button type="submit" class="btn btn-info pull-right btn-block" id="clrScores">REJECT Scores</button>
                                        </div>
                                    <div style="clear: both;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include('assets/snippets/footer.php'); ?>
            </div>
        </div>


        <!-- Modal Design Template -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add a comment for rejection</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding: 25px 15px 0px;">
                                        <i class="material-icons">schedule</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Write a comment for rejecion (max: 700 chracters)</label>
                                        <textarea class="form-control" id="cmtBox"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                            <button type="submit" class="btn btn-info btn-block" id="cfmReject">Confirm Rejection<div class="ripple-container"></div></button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                            <button type="button" class="btn btn-default dismiss" data-dismiss="modal">Close</button>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script src="assets/js/makepublic.js"></script>

</html>
