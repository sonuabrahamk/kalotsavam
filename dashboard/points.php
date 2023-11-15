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
        <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
        
        

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
                            <a class="navbar-brand" href="#">Points Table</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="x-hide">
                                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">dashboard</i>
                                        <p class="hidden-lg hidden-md">Dashboard</p>
                                    </a>
                                </li>
                                <li class="x-hide">
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

                            <form class="navbar-form navbar-right x-hide" role="search">
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
                                <div class="card card-nav-tabs">
                                    <div class="card-header" data-background-color="purple">
                                        <div class="nav-tabs-navigation">
                                            <div class="nav-tabs-wrapper">
                                                <span class="nav-tabs-title">Categoy:</span>
                                                <ul class="nav nav-tabs" id="ptsCategory" data-tabs="tabs">
                                                    <li class="active" data-type="FORANE">
                                                        <a href="#lower" data-toggle="tab" aria-expanded="true">
                                                            <i class="material-icons">bug_report</i>
                                                            Forane Level
                                                        <div class="ripple-container"></div></a>
                                                    </li>
                                                    <li class="" data-type="PARISH">
                                                        <a href="#upper" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">code</i>
                                                            Parish Level
                                                        <div class="ripple-container"></div></a>
                                                    </li>
                                                    <li class="" data-type="BIBLIA">
                                                        <a href="#high" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Biblia Stars
                                                        <div class="ripple-container"></div></a>
                                                    </li>

                                                    <li class="" data-type="CATEGORY-I">
                                                        <a href="#cat1" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Category I
                                                        <div class="ripple-container"></div></a>
                                                    </li>

                                                    <li class="" data-type="CATEGORY-II">
                                                        <a href="#cat2" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Category II
                                                        <div class="ripple-container"></div></a>
                                                    </li>

                                                    <li class="" data-type="CATEGORY-III">
                                                        <a href="#cat3" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Category III
                                                        <div class="ripple-container"></div></a>
                                                    </li>

                                                    <li class="" data-type="CATEGORY-IV">
                                                        <a href="#cat4" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Category IV
                                                        <div class="ripple-container"></div></a>
                                                    </li>

                                                    <li class="" data-type="CATEGORY-V">
                                                        <a href="#cat5" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Category V
                                                        <div class="ripple-container"></div></a>
                                                    </li>

                                                    <li class="pull-right">
                                                        <a id='export' style="cursor: pointer" aria-expanded="false">
                                                            <i class="material-icons">save_alt</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="lower">
                                                <table class="table">
                                                    <thead>
                                                        <th>RANK</th>
                                                        <th>FORANE</th>
                                                        <th>POINTS</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ("assets/snippets/connect.php");
                                                            if ($res = mysqli_query($connect,"SELECT FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.SECTION = md.SECTION WHERE e.STATUS = 'PUBLISHED' AND e.CATEGORY<>'Group' AND md.STATUS='PRESENT' GROUP BY FORANE ORDER BY SUM(POINTS) DESC, SUM(RANK_POINTS), SUM(GRADE_POINTS) DESC, FORANE ASC")){
                                                                $count=1;
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $count++; ?></td>
                                                            <td><?php echo $row['FORANE']; ?></td>
                                                            <td><?php echo $row['F_POINTS']; ?></td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "Error" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="upper">
                                                <table class="table">
                                                    <thead>
                                                        <th>RANK</th>
                                                        <th>PARISH</th>
                                                        <th>FORANE</th>
                                                        <th>POINTS</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ("assets/snippets/connect.php");
                                                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(md.POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.SECTION = md.SECTION WHERE e.STATUS='PUBLISHED' AND md.STATUS='PRESENT' GROUP BY md.PARISH, md.FORANE ORDER BY SUM(POINTS) DESC, SUM(md.RANK_POINTS) DESC, SUM(md.GRADE_POINTS) DESC, PARISH ASC")){
                                                                $count=1;
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $count++; ?></td>
                                                            <td><?php echo $row['PARISH']; ?></td>
                                                            <td><?php echo $row['FORANE']; ?></td>
                                                            <td><?php echo $row['F_POINTS']; ?></td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "Error" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="high">

                                            <?php
                                            
                                            $sql = "CALL bibliaStar()";

                                            if ($count = mysqli_query($connect,$sql)){
                                                if(mysqli_num_rows($count) > 0){
                                                    ?>
                                                    
                                                <table class="table">
                                                        <thead>
                                                            <th>Category</th>
                                                            <th>FULL_NAME</th>
                                                            <th>PARISH</th>
                                                            <th>FORANE</th>
                                                            <th>RANK POINTS</th>
                                                            <th>GRADE POINTS</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                
                                                                while($row = mysqli_fetch_array($count)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                                <td><?php echo $row['FULL_NAME']; ?></td>
                                                                <td><?php echo $row['PARISH']; ?></td>
                                                                <td><?php echo $row['FORANE']; ?></td>
                                                                <td><?php echo $row['idv_rkpoint']; ?></td>
                                                                <td><?php echo $row['idv_grdpoint']; ?></td>
                                                            </tr>
                                                            <?php   
                                                                }                                                            
                                                            ?>
                                                        </tbody>
                                                </table>
                                                <?php
                                            }
                                            else{ echo "<h3>No Data t Display !!</h3>" ;}
                                        }
                                            ?>
                                            </div>
                                            <div class="tab-pane" id="cat1">
                                                <table class="table">
                                                    <thead>
                                                        <th>Parish</th>
                                                        <th>Forane</th>
                                                        <th>Points</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ("assets/snippets/connect.php");
                                                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' AND e.SECTION = md.SECTION JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-I' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['PARISH']; ?></td>
                                                            <td><?php echo $row['FORANE']; ?></td>
                                                            <td><?php echo $row['F_POINTS']; ?></td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "No Data To Display" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="cat2">
                                                <table class="table">
                                                    <thead>
                                                        <th>Parish</th>
                                                        <th>Forane</th>
                                                        <th>Points</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' AND e.SECTION = md.SECTION JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-II' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['PARISH']; ?></td>
                                                            <td><?php echo $row['FORANE']; ?></td>
                                                            <td><?php echo $row['F_POINTS']; ?></td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "No Data To Display" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="cat3">
                                                <table class="table">
                                                    <thead>
                                                        <th>Parish</th>
                                                        <th>Forance</th>
                                                        <th>Points</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' AND e.SECTION = md.SECTION JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-III' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['PARISH']; ?></td>
                                                            <td><?php echo $row['FORANE']; ?></td>
                                                            <td><?php echo $row['F_POINTS']; ?></td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "No Data To Display" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <div class="tab-pane" id="cat4">
                                                <table class="table">
                                                    <thead>
                                                        <th>Parish</th>
                                                        <th>Forance</th>
                                                        <th>Points</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' AND e.SECTION = md.SECTION JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-IV' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['PARISH']; ?></td>
                                                            <td><?php echo $row['FORANE']; ?></td>
                                                            <td><?php echo $row['F_POINTS']; ?></td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "No Data To Display" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="cat5">
                                                <table class="table">
                                                    <thead>
                                                        <th>Parish</th>
                                                        <th>Forance</th>
                                                        <th>Points</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if ($res = mysqli_query($connect,"SELECT md.PARISH, md.FORANE, SUM(POINTS) AS F_POINTS FROM `master_data` md JOIN `events` e on e.STATUS='PUBLISHED' AND e.SECTION = md.SECTION JOIN `parish_category` pc on pc.PARISH = md.PARISH WHERE md.STATUS='PRESENT' AND pc.CATEGORY='Category-V' GROUP BY md.FORANE, pc.CATEGORY, md.PARISH ORDER BY pc.CATEGORY, SUM(POINTS) DESC, SUM(RANK_POINTS) DESC, SUM(GRADE_POINTS) DESC")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['PARISH']; ?></td>
                                                            <td><?php echo $row['FORANE']; ?></td>
                                                            <td><?php echo $row['F_POINTS']; ?></td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "No Data To Display" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Start Time (HH:MM)</label>
                                    <input type="text" class="form-control" id="startTime">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">End Time (HH:MM)</label>
                                    <input type="text" class="form-control" id="endTime">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                            <button type="submit" class="btn btn-primary btn-block" id="uptTime">Update Time<div class="ripple-container"></div></button>
                        </div>
                        <button type="button" class="btn btn-default dismiss" data-dismiss="modal">Close</button>
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

    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script src="assets/js/custom.js"></script>

    <script>
        $(document).ready(function(){
            var section;
            
            $('#export').click(function(){
                var ptsCat = $('#ptsCategory .active').attr('data-type');

                if(ptsCat == "FORANE"){
                    window.location.href="assets/snippets/exports/exportForanePts.php";
                }
                else if(ptsCat == "PARISH"){
                    window.location.href="assets/snippets/exports/exportParishPts.php";
                }
                else if(ptsCat == "BIBLIA"){
                    window.location.href="assets/snippets/exports/exportBibliaPts.php";
                }
                else if(ptsCat == "CATEGORY-I"){
                    window.location.href="assets/snippets/exports/exportCatPts.php?cat="+ptsCat;
                }
                else if(ptsCat == "CATEGORY-II"){
                    window.location.href="assets/snippets/exports/exportCatPts.php?cat="+ptsCat;
                }
                else if(ptsCat == "CATEGORY-III"){
                    window.location.href="assets/snippets/exports/exportCatPts.php?cat="+ptsCat;
                }
                else if(ptsCat == "CATEGORY-IV"){
                    window.location.href="assets/snippets/exports/exportCatPts.php?cat="+ptsCat;
                }
                else if(ptsCat == "CATEGORY-V"){
                    window.location.href="assets/snippets/exports/exportCatPts.php?cat="+ptsCat;
                }


            });

        });
    </script>

</html>
