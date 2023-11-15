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
        <link href="assets/css/bkresults.css" rel="stylesheet" />


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
                <?php
                
                    require ('dashboard/assets/snippets/connect.php');

                    $section = $_GET['section'];

                    if($res1 = mysqli_query($connect,"SELECT * FROM `events` WHERE SECTION='".$section."'")){
                        $sec = mysqli_fetch_array($res1);
                        $event = $sec['NAME'];
                        $category = $sec['CATEGORY'];
                        if($res = mysqli_query($connect,"SELECT * FROM `master_data` WHERE SECTION='".$section."' ORDER BY STATUS DESC, RANK ASC;")){
                        if(mysqli_num_rows($res)){

                            ?>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" data-background-color="blue">
                                            <div class="col-lg-10">
                                                <h3 class="wizard-title" id="wizTitle">
                                                    <?php echo $event; ?>
                                                </h3>
                                                <h5>Category: <?php echo $category; ?></h5>
                                            </div> 
                                            <div style="clear: both"></div>
                                        </div>
                                        <div class="card-content">  
                                            <div class="table-responsive">
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

                            <?php
                            
                            while($row = mysqli_fetch_array($res)){
                                ?>

                                
                                                    <tr>
                                                        <td><?php echo $row['CHEST_NO']; ?></td>
                                                        <td><?php echo $row['FULL_NAME']; ?></td>
                                                        <td><?php echo $row['PARISH']; ?></td>
                                                        <td><?php echo $row['FORANE']; ?></td>
                                                        <td><?php echo $row['GRADE']; ?></td>
                                                        <td><?php echo $row['RANK']; ?></td>
                                                        <td><?php echo $row['POINTS']; ?></td>
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
                        else{
                            ?>

                            <h3 class="wizard-title">Results are not published yet!!</h3>

                            <?php
                        }
                    }

                    }
                
                ?>
                
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