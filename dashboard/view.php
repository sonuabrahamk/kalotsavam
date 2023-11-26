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
        <link href='assets/css/owl.carousel.min.css' rel='stylesheet' type='text/css'>
        <style>

            .title{
                /* font-weight: bold; */
                /* font-size: 3.6em; */
            }

            .category{
                color: rgba(255,255,255,1)!important;
                /* font-weight: 500; */
            }

            .table td{
                font-weight: bold;
                /* font-size: 36px; */
                text-align: center;
            }

            .table th{
                text-align: center;
            }

            .logo{
                display: inline-block!important;
                height: auto;
                width: 65%!important;
            }

        </style>
        
    </head>

    <body>

        <div class="wrapper" style="padding: 50px;">
            <div class="content">
                <div class="container-fluid">
                    <div id="movement" class="owl-carousel">
                        <?php
                            require ("assets/snippets/connect.php");
                            if($res = mysqli_query($connect, "SELECT * FROM `events` WHERE STATUS='PUBLISHED'")){
                                while($row = mysqli_fetch_array($res)){
                                    echo '
                                        <div class="row">
                                            
                                        <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                <img src="assets/img/BK_Flag.jpg" class="logo" />
                                            </div>
                                            <div class="card">
                                                <div class="card-header" data-background-color="blue">
                                                    <h4 class="title">'.$row['NAME'].' Result</h4>
                                                    <p class="category">Category: '.$row['CATEGORY'].'</p>
                                                </div>
                                                <div class="card-content table-responsive">
                                                    <table class="table table-hover">
                                                        <thead class="text-info">
                                                            <th>RANK</th>
                                                            <th style="text-align: left">PARTICIPANT NAME</th>
                                                            <th style="text-align: left">PARISH</th>
                                                            <th>FORANE</th>
                                                            <th>POINTS</th>
                                                        </thead>
                                                        <tbody>
                                        
                                    ';
                                    $section = $row["SECTION"];
                                    if($res1 = mysqli_query($connect,"SELECT * FROM `master_data` WHERE `RANK` <= 3 AND `RANK` > 0 AND SECTION='".$section."' ORDER BY `RANK`")){
                                        
                                        while($row1 = mysqli_fetch_array($res1)){
                                            ?>

                                            
                                                <tr>
                                                    <td><?php echo $row1['RANK']; ?></td>
                                                    <td style="text-align: left"><?php echo $row1['FULL_NAME']; ?></td>
                                                    <td style="text-align: left"><?php echo $row1['PARISH']; ?></td>
                                                    <td><?php echo $row1['FORANE']; ?></td>
                                                    <td><?php echo $row1['POINTS']; ?></td>
                                                </tr>
                                                               

                                            <?php
                                        }
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
                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(md.POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.SECTION = md.SECTION WHERE e.STATUS='PUBLISHED' AND md.STATUS='PRESENT' GROUP BY md.PARISH, md.FORANE ORDER BY SUM(POINTS) DESC, SUM(md.RANK_POINTS) DESC, SUM(md.GRADE_POINTS) DESC, PARISH ASC")){
                                if(mysqli_num_rows($res)){
                                    echo '
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                    <img src="assets/img/BK_Flag.jpg" class="logo" />
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" data-background-color="blue">
                                                        <h4 class="title">Parish Level Points Table</h4>
                                                        <p class="category">Only published results are considered</p>
                                                    </div>
                                                    <div class="card-content table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-info">
                                                                <th>RANK</th>
                                                                <th style="text-align: left">PARISH</th>
                                                                <th style="text-align: left">FORANE</th>
                                                                <th>POINTS</th>
                                                            </thead>
                                                            <tbody>
                                        
                                    ';
                                    $count=1;
                                    while($row = mysqli_fetch_array($res)){
                                        if($count == 6){break;}
                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td style="text-align: left"><?php echo $row['PARISH']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FORANE']; ?></td>
                                                <td><?php echo $row['F_POINTS']; ?></td>
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
                            if ($res = mysqli_query($connect,"CALL bibliaStar();")){
                                if(mysqli_num_rows($res)){
                                    echo '
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                    <img src="assets/img/BK_Flag.jpg" class="logo" />
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" data-background-color="blue">
                                                        <h4 class="title">Biblia Starts Points Table</h4>
                                                        <p class="category">Leading as per published results</p>
                                                    </div>
                                                    <div class="card-content table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-info">
                                                                <th>Category</th>
                                                                <th style="text-align: left">FULL_NAME</th>
                                                                <th style="text-align: left">PARISH</th>
                                                                <th style="text-align: left">FORANE</th>
                                                                <th>RANK POINTS</th>
                                                                <th>GRADE POINTS</th>
                                                            </thead>
                                                            <tbody>
                                        
                                    ';
                                    $count=1;
                                    while($row = mysqli_fetch_array($res)){
                                        if($count == 6){break;}
                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FULL_NAME']; ?></td>
                                                <td style="text-align: left"><?php echo $row['PARISH']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FORANE']; ?></td>
                                                <td><?php echo $row['idv_rkpoint']; ?></td>
                                                <td><?php echo $row['idv_grdpoint']; ?></td>
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
                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-I' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                if(mysqli_num_rows($res)){
                                    echo '
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                    <img src="assets/img/BK_Flag.jpg" class="logo" />
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" data-background-color="blue">
                                                        <h4 class="title">Parish Category-I Points Table</h4>
                                                        <p class="category">Leading as per published results</p>
                                                    </div>
                                                    <div class="card-content table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-info">
                                                                <th>Category</th>
                                                                <th style="text-align: left">PARISH</th>
                                                                <th style="text-align: left">FORANE</th>
                                                                <th style="text-align: left">POINTS</th>
                                                                <th>POINTS</th>
                                                            </thead>
                                                            <tbody>
                                        
                                    ';
                                    while($row = mysqli_fetch_array($res)){
                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                <td style="text-align: left"><?php echo $row['PARISH']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FORANE']; ?></td>
                                                <td style="text-align: left"><?php echo $row['F_POINTS']; ?></td>
                                                <td><?php echo ($row['POINTS']); ?></td>
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
                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-II' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                if(mysqli_num_rows($res)){
                                    echo '
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                    <img src="assets/img/BK_Flag.jpg" class="logo" />
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" data-background-color="blue">
                                                        <h4 class="title">Parish Category-II Points Table</h4>
                                                        <p class="category">Leading as per published results</p>
                                                    </div>
                                                    <div class="card-content table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-info">
                                                                <th>Category</th>
                                                                <th style="text-align: left">PARISH</th>
                                                                <th style="text-align: left">FORANE</th>
                                                                <th style="text-align: left">POINTS</th>
                                                                <th>POINTS</th>
                                                            </thead>
                                                            <tbody>
                                        
                                    ';
                                    while($row = mysqli_fetch_array($res)){
                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                <td style="text-align: left"><?php echo $row['PARISH']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FORANE']; ?></td>
                                                <td style="text-align: left"><?php echo $row['F_POINTS']; ?></td>
                                                <td><?php echo ($row['POINTS']); ?></td>
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
                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-III' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                if(mysqli_num_rows($res)){
                                    echo '
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                    <img src="assets/img/BK_Flag.jpg" class="logo" />
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" data-background-color="blue">
                                                        <h4 class="title">Parish Category-III Points Table</h4>
                                                        <p class="category">Leading as per published results</p>
                                                    </div>
                                                    <div class="card-content table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-info">
                                                                <th>Category</th>
                                                                <th style="text-align: left">PARISH</th>
                                                                <th style="text-align: left">FORANE</th>
                                                                <th style="text-align: left">POINTS</th>
                                                                <th>POINTS</th>
                                                            </thead>
                                                            <tbody>
                                        
                                    ';
                                    while($row = mysqli_fetch_array($res)){
                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                <td style="text-align: left"><?php echo $row['PARISH']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FORANE']; ?></td>
                                                <td style="text-align: left"><?php echo $row['F_POINTS']; ?></td>
                                                <td><?php echo ($row['POINTS']); ?></td>
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
                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-IV' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                if(mysqli_num_rows($res)){
                                    echo '
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                    <img src="assets/img/BK_Flag.jpg" class="logo" />
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" data-background-color="blue">
                                                        <h4 class="title">Parish Category-IV Points Table</h4>
                                                        <p class="category">Leading as per published results</p>
                                                    </div>
                                                    <div class="card-content table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-info">
                                                                <th>Category</th>
                                                                <th style="text-align: left">PARISH</th>
                                                                <th style="text-align: left">FORANE</th>
                                                                <th style="text-align: left">POINTS</th>
                                                                <th>POINTS</th>
                                                            </thead>
                                                            <tbody>
                                        
                                    ';
                                    while($row = mysqli_fetch_array($res)){
                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                <td style="text-align: left"><?php echo $row['PARISH']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FORANE']; ?></td>
                                                <td style="text-align: left"><?php echo $row['F_POINTS']; ?></td>
                                                <td><?php echo ($row['POINTS']); ?></td>
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
                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-V' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                if(mysqli_num_rows($res)){
                                    echo '
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div style="text-align: center">
                                                    <img src="assets/img/BK_Flag.jpg" class="logo" />
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" data-background-color="blue">
                                                        <h4 class="title">Parish Category-V Points Table</h4>
                                                        <p class="category">Leading as per published results</p>
                                                    </div>
                                                    <div class="card-content table-responsive">
                                                        <table class="table table-hover">
                                                            <thead class="text-info">
                                                                <th>Category</th>
                                                                <th style="text-align: left">PARISH</th>
                                                                <th style="text-align: left">FORANE</th>
                                                                <th style="text-align: left">POINTS</th>
                                                                <th>POINTS</th>
                                                            </thead>
                                                            <tbody>
                                        
                                    ';
                                    while($row = mysqli_fetch_array($res)){
                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                <td style="text-align: left"><?php echo $row['PARISH']; ?></td>
                                                <td style="text-align: left"><?php echo $row['FORANE']; ?></td>
                                                <td style="text-align: left"><?php echo $row['F_POINTS']; ?></td>
                                                <td><?php echo ($row['POINTS']); ?></td>
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

    <script src="assets/js/owl.carousel.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#movement').owlCarousel({
                items: 1,
                autoplay: true,
                navSpeed: 14000,
                loop: true
            });

            setInterval(() => {
                window.location.reload();
            }, (600000));

        });
    
    </script>

</html>
