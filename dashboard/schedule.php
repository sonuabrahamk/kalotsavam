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
        <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'> -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
        
        <style>
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
                            <a class="navbar-brand" href="#">Schedule Dashboard</a>
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
                                    <div class="card-header" data-background-color="blue">
                                        <div class="nav-tabs-navigation">
                                            <div class="nav-tabs-wrapper">
                                                <span class="nav-tabs-title">Categoy:</span>
                                                <ul class="nav nav-tabs" data-tabs="tabs">
                                                    <li class="active">
                                                        <a href="#lower" data-toggle="tab" aria-expanded="true">
                                                            <i class="material-icons">bug_report</i>
                                                            Lower Primary
                                                        <div class="ripple-container"></div></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#upper" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">code</i>
                                                            Upper Primary
                                                        <div class="ripple-container"></div></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#high" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            High School
                                                        <div class="ripple-container"></div></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#higher" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Higher Secondary
                                                        <div class="ripple-container"></div></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#group" data-toggle="tab" aria-expanded="false">
                                                            <i class="material-icons">cloud</i>
                                                            Group
                                                        <div class="ripple-container"></div></a>
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
                                                        <th>Event</th>
                                                        <th>Category</th>
                                                        <th>Venue</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ("assets/snippets/connect.php");
                                                            if ($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Lower Primary'")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['NAME']; ?></td>
                                                            <td><?php echo $row['CATEGORY']; ?></td>
                                                            <td><?php echo $row['VENUE']; ?></td>
                                                            <td><?php echo $row['START_TIME']; ?></td>
                                                            <td><?php echo $row['END_TIME']; ?></td>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs editBtn" data-section="<?php echo $row['SECTION']; ?>" data-event="<?php echo $row['NAME']; ?>" data-original-title="Edit Time">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                            </td>
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
                                                        <th>Event</th>
                                                        <th>Category</th>
                                                        <th>Venue</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ("assets/snippets/connect.php");
                                                            if ($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Upper Primary'")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['NAME']; ?></td>
                                                            <td><?php echo $row['CATEGORY']; ?></td>
                                                            <td><?php echo $row['VENUE']; ?></td>
                                                            <td><?php echo $row['START_TIME']; ?></td>
                                                            <td><?php echo $row['END_TIME']; ?></td>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs editBtn" data-section="<?php echo $row['SECTION']; ?>" data-event="<?php echo $row['NAME']; ?>" data-original-title="Edit Time">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                            </td>
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
                                                <table class="table">
                                                        <thead>
                                                            <th>Event</th>
                                                            <th>Category</th>
                                                            <th>Venue</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                require ("assets/snippets/connect.php");
                                                                if ($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='High School'")){
                                                                    while($row = mysqli_fetch_array($res)){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row['NAME']; ?></td>
                                                                <td><?php echo $row['CATEGORY']; ?></td>
                                                                <td><?php echo $row['VENUE']; ?></td>
                                                                <td><?php echo $row['START_TIME']; ?></td>
                                                                <td><?php echo $row['END_TIME']; ?></td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs editBtn" data-section="<?php echo $row['SECTION']; ?>" data-event="<?php echo $row['NAME']; ?>" data-original-title="Edit Time">
                                                                        <i class="material-icons">edit</i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <?php   
                                                                }
                                                            }
                                                            else{ echo "Error" ;}
                                                            ?>
                                                        </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="higher">
                                                <table class="table">
                                                    <thead>
                                                        <th>Event</th>
                                                        <th>Category</th>
                                                        <th>Venue</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ("assets/snippets/connect.php");
                                                            if ($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Higher Secondary School'")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['NAME']; ?></td>
                                                            <td><?php echo $row['CATEGORY']; ?></td>
                                                            <td><?php echo $row['VENUE']; ?></td>
                                                            <td><?php echo $row['START_TIME']; ?></td>
                                                            <td><?php echo $row['END_TIME']; ?></td>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs editBtn" data-section="<?php echo $row['SECTION']; ?>" data-event="<?php echo $row['NAME']; ?>" data-original-title="Edit Time">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "Error" ;}
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="group">
                                                <table class="table">
                                                    <thead>
                                                        <th>Event</th>
                                                        <th>Category</th>
                                                        <th>Venue</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require ("assets/snippets/connect.php");
                                                            if ($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Group'")){
                                                                while($row = mysqli_fetch_array($res)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['NAME']; ?></td>
                                                            <td><?php echo $row['CATEGORY']; ?></td>
                                                            <td><?php echo $row['VENUE']; ?></td>
                                                            <td><?php echo $row['START_TIME']; ?></td>
                                                            <td><?php echo $row['END_TIME']; ?></td>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs editBtn" data-section="<?php echo $row['SECTION']; ?>" data-event="<?php echo $row['NAME']; ?>" data-original-title="Edit Time">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Remove">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php   
                                                            }
                                                        }
                                                        else{ echo "Error" ;}
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
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding: 25px 15px 0px;">
                                        <i class="material-icons">map</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Venue</label>
                                        <select id="venue" class="form-control">
                                            <option disabled selected class="disabled"></option>
                                            <option>STAGE 1</option>
                                            <option>STAGE 2</option>
                                            <option>STAGE 3</option>
                                            <option>STAGE 4</option>
                                            <option>STAGE 5</option>
                                            <option>STAGE 6</option>
                                            <option>STAGE 7</option>
                                            <option>STAGE 8</option>
                                            <option>STAGE 9</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding: 25px 15px 0px;">
                                        <i class="material-icons">schedule</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Start Time (HH:MM)</label>
                                        <input name="collegename" id="startTime" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-addon" style="padding: 25px 15px 0px;">
                                        <i class="material-icons">schedule</i>
                                    </span>
                                    <div class="form-group label-floating">
                                        <label class="control-label">End Time (HH:MM)</label>
                                        <input name="collegename" id="endTime" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                            <button type="submit" class="btn btn-primary btn-block" id="uptTime">Update Time<div class="ripple-container"></div></button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12 pull-right">
                            <button type="button" class="btn btn-default dismiss" data-dismiss="modal">Close</button>
                        </div>
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
            $('.editBtn').click(function(){
                section = $(this).attr('data-section');
                $('.modal-title').text($(this).attr('data-event'));
                $('#myModal').css('display','block');
                $('#myModal').addClass('in');
            });

            $('.close').click(function(){
                $('#myModal').css('display','none');
                $('#myModal').removeClass('in');
            });

            $('.dismiss').click(function(){
                $('.close').trigger('click');
            });

            $('#uptTime').click(function(){
                
                var startTime = $('#startTime').val();
                var endTime = $('#endTime').val();
                var venue = $('#venue').val();

                if((startTime == '')||(endTime == '')||(venue == null)){
                    demo.showNotification('top','center','Fill in all fields to update!',3);
                    return;
                }

                var startDate = new Date("11/24/2019 " + startTime + ":00");
                var endDate = new Date("11/24/2019 " + endTime + ":00");

                if (startDate > endDate){
                    demo.showNotification('top','center','Invalid time range!',4);
                }
                else{
                    $.ajax({
                        url: 'assets/snippets/uptSchedule.php?section='+section+'&start='+startTime+'&end='+endTime+'&venue='+venue,
                        type: 'get',
                        success: function(data){
                            data = data.trim();
                            if (data == '1'){
                                demo.showNotification('top','center','Updated Schedule!',2);
                                location.reload();
                            }
                        },
                        error: function(){
                            demo.showNotification('top','center','Error in network!',2);
                        }
                    });

                }
            });

        });
    </script>

</html>
