<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="assets/img/logo.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Kalotsavam 2023 | Carmelaram Mount Carmel Parish</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        
        <link rel="canonical" href="http://www.creative-tim.com/product/material-kit-pro" />

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> -->

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/material-kit.css" rel="stylesheet"/>

        <link href="../assets/assets-for-demo/vertical-nav.css" rel="stylesheet" />
        <link href="../assets/assets-for-demo/demo.css" rel="stylesheet" />

        <link href="../assets/css/custom.css" rel="stylesheet" /> 
        <link href='assets/css/owl.carousel.min.css' rel='stylesheet' type='text/css'>
        
        <link href="../assets/css/bkresults.css" rel="stylesheet" />
        <style>

            .table > thead > tr > th{
                font-size: 20px;
                font-weight: bold;
            }

            .table-bordered td {
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                padding: 5px !important;
            }

            h3{
                font-weight: bold;
                font-size: 25px;
            }

            .card .card-header h5{
                font-weight: bold;
                font-size: 15px;
            }

        </style>

    </head>

    <body class="index-page" ng-app="shellsApp" style="overflow-x: hidden;">
        
        <div class="container-fluid">
            <img class="img-responsive" src="../assets/img/BK_flag.jpg" />
            <div id="movement" class="owl-carousel">
                <?php
                    require ("assets/snippets/connect.php");
                    if($res = mysqli_query($connect, "SELECT * FROM `events` WHERE STATUS='PUBLISHED'")){
                        while($row = mysqli_fetch_array($res)){
                            echo '
                
                            <div class="row">   
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header" data-background-color="blue">
                                                <div class="col-lg-10">
                                                    <h3 class="wizard-title" id="wizTitle">
                                                        '. $row['NAME'] .'
                                                    </h3>
                                                    <h5><b>Category: '.$row['CATEGORY'].'</b></h5>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                            <div class="card-content">  
                                                <div class="table-responsive">
                                                <table class="table table-hover table-bordered result-table">
                                                    <thead class="text-info">
                                                        <th>RANK</th>
                                                        <th>NAME</th>
                                                        <th>PARISH</th>
                                                        <th>FORANE</th>
                                                        <th>POINTS</th>
                                                    </thead>
                                                    <tbody>';

                            $section = $row["SECTION"];
                            if($res1 = mysqli_query($connect,"SELECT * FROM `master_data` WHERE `RANK` <= 3 AND `RANK` > 0 AND SECTION='".$section."' ORDER BY `RANK`")){
                            while($row1 = mysqli_fetch_array($res1)){
                            ?>
                                    
                                                        <tr>
                                                            <td><?php echo $row1['RANK']; ?></td>
                                                            <td><?php echo $row1['FULL_NAME']; ?></td>
                                                            <td><?php echo $row1['PARISH']; ?></td>
                                                            <td><?php echo $row1['FORANE']; ?></td>
                                                            <td><?php echo $row1['POINTS']; ?></td>
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
        </div>

    </body>
    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/material.min.js"></script>
    <!-- <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script> -->
   
    <script src="assets/js/owl.carousel.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#movement').owlCarousel({
                items: 1,
                autoplay: true,
                navSpeed: 15000,
                loop: true
            });

            setInterval(() => {
                window.location.reload();
            }, 6000000);

        });
    
    </script>

</html>