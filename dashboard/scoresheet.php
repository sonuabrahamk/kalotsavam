<?php
session_start();

if(isset($_SESSION['uid'])){
    if(($_SESSION['category'] != 'SUPERADMIN')){
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
                            <a class="navbar-brand" href="#">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="x-hide">
                                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">dashboard</i>
                                        <p class="hidden-lg hidden-md">Dashboard</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="form-group  is-empty">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <span class="material-input"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Mike John responded to your email</a></li>
                                        <li><a href="#">You have 5 new tasks</a></li>
                                        <li><a href="#">You're now friend with Andrew</a></li>
                                        <li><a href="#">Another Notification</a></li>
                                        <li><a href="#">Another One</a></li>
                                    </ul>
                                </li>
                                <li class="x-hide">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">person</i>
                                        <p class="hidden-lg hidden-md">Profile</p>
                                    </a>
                                </li>
                            </ul>

                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group  is-empty">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="material-input"></span>
                                </div>
                                <button type="button" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i><div class="ripple-container"></div>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                        <div class="col-lg-3">
                                            <h4 class="title">Add Results</h4>
                                            <p class="category">Create a new Fest</p>
                                        </div> 
                                        <div class="col-lg-3 pull-right">
                                            <div class="form-group" style="margin-top: 6px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="color: #fff;">
                                                        <i class="material-icons">filter_list</i>
                                                    </span>
                                                    <select class="select form-control bkselect" name="input-fest" id="categoryBtn">
                                                        <option disabled selected class="disabled">Select Category</option>
                                                        <?php 
                                                            require('assets/snippets/connect.php');
                                                            $res = mysqli_query($connect,'SELECT DISTINCT(CATEGORY) FROM events WHERE STATUS="PENDING"');
                                                            while($row = mysqli_fetch_array($res)){
                                                                echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 pull-right">
                                            <div class="form-group" style="margin-top: 6px;">
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="color: #fff;">
                                                        <i class="material-icons">filter_list</i>
                                                    </span>
                                                    <select class="select form-control bkselect" name="input-fest" id="eventBtn">
                                                        <option disabled selected class="disabled">Select Category</option>
                                                        <?php 
                                                            require('assets/snippets/connect.php');
                                                            $res = mysqli_query($connect,'SELECT DISTINCT(NAME) FROM events WHERE STATUS="PENDING"');
                                                            while($row = mysqli_fetch_array($res)){
                                                                echo '<option value="'.$row[0].'">'.$row[0].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="clear: both"></div>
                                    </div>
                                    <div class="card-content">  
                                        <form name='scores' id='scoreVals'>
                                            <input type="text" name="secDisplay" value="section" style="display:none" />
                                            <table class="table table-hover result-table">
                                                <thead class="text-primary">
                                                    <th>Chest Number</th>
                                                    <th>Judge 1</th>
                                                    <th>Judge 2</th>
                                                    <th>Judge 3</th>
                                                </thead>
                                                <tbody id='scoreTbl'>
                                                    <tr>
                                                        <td colspan="4">No Data to Display! Select a category and event!</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                                            <button type="submit" class="btn btn-primary pull-right btn-block" id="uptScores">Update Scores</button>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                                            <button type="submit" class="btn btn-primary pull-right btn-block" id="clrScores">Clear Scores</button>
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

    <script src="assets/js/custom.js"></script>

</html>
