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
        <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet"/>

        <link href="assets/css/custom.css" rel="stylesheet" />
        <link href="assets/css/dataEntry.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
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
                                            <input type="text" class="form-control" placeholder="Category" id='categoryBtn'  autocomplete="off">
                                            <span class="material-input"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                            require('assets/snippets/connect.php');
                                            $res = mysqli_query($connect,'SELECT DISTINCT(CATEGORY) FROM events WHERE STATUS="PENDING"');
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
                                            $res = mysqli_query($connect,'SELECT DISTINCT(NAME) FROM events WHERE STATUS="PENDING"');
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wizard-container">
                                <div class="card wizard-card" data-color="blue" id="wizard">
                                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                                    <div class="wizard-header">
                                        <h3 class="wizard-title" id="wizTitle">
                                            Select Category and Event above and click on Search
                                        </h3>
                                        <h5>The Chest number for the results to be added would be populated automatically and entering all the scores are mandatory for submitting/updating the scores.</h5>
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul class="nav nav-pills">
                                            <li class="active" style="width: 25%;" id="J1_Pane"><a href="#" data-toggle="tab" aria-expanded="false">Judge 1</a></li>
                                            <li class="" style="width: 25%;" id="J2_Pane"><a href="#" data-toggle="tab" aria-expanded="true">Judge 2</a></li>
                                            <li class="" style="width: 25%;" id="J3_Pane"><a href="#" data-toggle="tab" aria-expanded="false">Judge 3</a></li>
                                            <li class="" style="width: 25%;" id="SM_Pane"><a href="#" data-toggle="tab" aria-expanded="false">Summary</a></li>
                                        </ul>
                                        <!-- <div class="moving-tab" style="width: 250px; transform: translate3d(250px, 0px, 0px); transition: transform 0s ease 0s;">Room Type</div> -->
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="judge1">
                                            <div class="row" id="JL1">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="judge2">
                                            <div class="row" id="JL2">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="judge3">
                                            <div class="row" id="JL3">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="summary">
                                            <form name="scores" id="scoreVals">
                                                <input type="text" name="secDisplay" value="section" style="display:none">
                                                <table class="table table-hover result-table">
                                                    <thead class="text-info">
                                                        <tr>
                                                            <th style="width: 140px;">Chest Number</th>
                                                            <th>Judge 1</th>
                                                            <th>Judge 2</th>
                                                            <th>Judge 3</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="scoreTbl"></tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type="button" class="btn btn-next btn-fill btn-info btn-wd" name="next" value="Next" id="nxtBtn" style="">
                                            <input type="button" class="btn btn-finish btn-fill btn-info btn-wd" name="finish" value="Update Scores" id="submitBtn" style="display: none;">
                                        </div>
                                        <div class="pull-left">
                                            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd" name="previous" id="prvBtn" value="Previous">

                                            <div class="footer-checkbox" style="opacity: 0; visibility: hidden; position: absolute;">
                                                <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                                                    </label>
                                                    Subscribe to our newsletter
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
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

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/material-bootstrap-wizard.js" type="text/javascript"></script>

    <script src="assets/js/custom.js"></script>
    <script src="assets/js/dashboard-navbar.js"></script>

</html>
