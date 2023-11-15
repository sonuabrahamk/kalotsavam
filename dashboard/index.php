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

        <title>Kalotsavam | Dashboard | Auxil | The Complete Solution</title>

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
            .card.card-stats .card-header{
                padding: 5px;
            }

            .card.card-stats .card-content .title{
                font-weight: bolder;
                font-size: 1.8em;
            }

            .card.card-stats .card-footer{
                margin: 0 20px 0px;
            }

        </style>
    </head>

    <body>

        <div class="wrapper">

            <?php include('assets/snippets/sidebar.php'); ?>

            <div class="main-panel">
              
                <?php include('assets/snippets/navbar.php'); ?>  

                <div class="content">
                    <div class="container-fluid">
                        
                        <?php include('assets/snippets/metrics.php'); ?>

                        <?php
                        if(($_SESSION['category']=='VIEWER')||($_SESSION['category']=='SUPERADMIN')){
                            if($pub = mysqli_query($connect, "SELECT * FROM `events` WHERE STATUS='PUBLISHED'")){
                                if (mysqli_num_rows($pub) > 0){
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" data-background-color="blue">
                                                    <h4 class="title">List of Events Published</h4>
                                                </div>
                                                <div class="card-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead class="text-warning">
                                                            <th>Event</th>
                                                            <th>Category</th>
                                                            <th style="text-align:center;">Start Time</th>
                                                            <th style="text-align:center;">End Time</th>
                                                            <th style="text-align:center;">Venue</th>
                                                        </thead>
                                                        <tbody>

                                    <?php                                
                                    while($row = mysqli_fetch_array($pub)){
                                        ?>
                                        
                                        
                                                                <tr>
                                                                    <td><?php echo $row['NAME']; ?></td>
                                                                    <td><?php echo $row['CATEGORY']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['START_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['END_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['VENUE']; ?></td>
                                                                </tr>
                                                            

                                        <?php
                                    }
                                    ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        }
                        ?>

                        <?php
                            if($pub = mysqli_query($connect, "SELECT * FROM `events` WHERE STATUS='APPROVED'")){
                                if (mysqli_num_rows($pub) > 0){
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" data-background-color="blue">
                                                    <h4 class="title">List of Events Pending to be Published</h4>
                                                </div>
                                                <div class="card-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead class="text-warning">
                                                            <th>Event</th>
                                                            <th>Category</th>
                                                            <th style="text-align:center;">Start Time</th>
                                                            <th style="text-align:center;">End Time</th>
                                                            <th style="text-align:center;">Venue</th>
                                                        </thead>
                                                        <tbody>

                                    <?php                                
                                    while($row = mysqli_fetch_array($pub)){
                                        ?>
                                        
                                        
                                                                <tr>
                                                                    <td><?php echo $row['NAME']; ?></td>
                                                                    <td><?php echo $row['CATEGORY']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['START_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['END_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['VENUE']; ?></td>
                                                                </tr>
                                                            

                                        <?php
                                    }
                                    ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }

                        ?>


                        <?php
                            if($pub = mysqli_query($connect, "SELECT * FROM `events` WHERE STATUS='VERIFIED'")){
                                if (mysqli_num_rows($pub) > 0){
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" data-background-color="orange">
                                                    <h4 class="title">List of Events Pending to be Approved</h4>
                                                </div>
                                                <div class="card-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead class="text-warning">
                                                            <th>Event</th>
                                                            <th>Category</th>
                                                            <th style="text-align:center;">Start Time</th>
                                                            <th style="text-align:center;">End Time</th>
                                                            <th style="text-align:center;">Venue</th>
                                                        </thead>
                                                        <tbody>

                                    <?php                                
                                    while($row = mysqli_fetch_array($pub)){
                                        ?>
                                        
                                        
                                                                <tr>
                                                                    <td><?php echo $row['NAME']; ?></td>
                                                                    <td><?php echo $row['CATEGORY']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['START_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['END_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['VENUE']; ?></td>
                                                                </tr>
                                                            

                                        <?php
                                    }
                                    ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }

                        ?>


                        <?php
                            if($pub = mysqli_query($connect, "SELECT * FROM `events` WHERE STATUS='CALCULATED'")){
                                if (mysqli_num_rows($pub) > 0){
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" data-background-color="purple">
                                                    <h4 class="title">List of Events Pending to be Verified</h4>
                                                </div>
                                                <div class="card-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead class="text-warning">
                                                            <th>Event</th>
                                                            <th>Category</th>
                                                            <th style="text-align:center;">Start Time</th>
                                                            <th style="text-align:center;">End Time</th>
                                                            <th style="text-align:center;">Venue</th>
                                                        </thead>
                                                        <tbody>

                                    <?php                                
                                    while($row = mysqli_fetch_array($pub)){
                                        ?>
                                        
                                        
                                                                <tr>
                                                                    <td><?php echo $row['NAME']; ?></td>
                                                                    <td><?php echo $row['CATEGORY']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['START_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['END_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['VENUE']; ?></td>
                                                                </tr>
                                                            

                                        <?php
                                    }
                                    ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }

                        ?>


                        <?php
                            if($pub = mysqli_query($connect, "SELECT * FROM `events` WHERE STATUS='PENDING'")){
                                if (mysqli_num_rows($pub) > 0){
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header" data-background-color="yellow">
                                                    <h4 class="title">List of Events Pending to be Entered</h4>
                                                </div>
                                                <div class="card-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead class="text-warning">
                                                            <th>Event</th>
                                                            <th>Category</th>
                                                            <th style="text-align:center;">Start Time</th>
                                                            <th style="text-align:center;">End Time</th>
                                                            <th style="text-align:center;">Venue</th>
                                                        </thead>
                                                        <tbody>

                                    <?php                                
                                    while($row = mysqli_fetch_array($pub)){
                                        ?>
                                        
                                        
                                                                <tr>
                                                                    <td><?php echo $row['NAME']; ?></td>
                                                                    <td><?php echo $row['CATEGORY']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['START_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['END_TIME']; ?></td>
                                                                    <td style="text-align:center;"><?php echo $row['VENUE']; ?></td>
                                                                </tr>
                                                            

                                        <?php
                                    }
                                    ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }

                        ?>

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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    

</html>
