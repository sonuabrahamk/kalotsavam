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
        <link href="assets/css/usermanagement.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
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
                            <a class="navbar-brand" href="#">User Management Dashboard</a>
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
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                        <div class="col-lg-8">
                                            <h3 class="wizard-title" id="wizTitle">
                                                User Registration
                                            </h3>
                                            <h5>Fill the required search filters and click on submit</h5>
                                        </div> 
                        
                                        <div style="clear: both"></div>
                                        </div>
                                    <div class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <form class="user-form" id="usrDetails">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-info label-floating">
                                                                            <i class="material-icons">face</i>
                                                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                                            <span class="material-input"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-info label-floating">
                                                                            <i class="material-icons">email</i>
                                                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-info label-floating">
                                                                            <i class="material-icons">call</i>
                                                                            <input type="tel" name="phone" id="phone" class="form-control text-info" placeholder="Phone Number" >
                                                                        </div>
                                                                    </div>                        
                                                                    <div class="col-md-6">
                                                                        <div class="dropdown">
                                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                <div class="form-group form-info is-empty">
                                                                                    <i class="material-icons">filter_list</i>
                                                                                    <input type="text" name="category" class="form-control" placeholder="Category" id='category'>
                                                                                </div>
                                                                            </a>
                                                                            <ul name="category" class="dropdown-menu">
                                                                                <li class="cateOpt" value="new" ><a href="#">DATA_ENTRY</a></li>
                                                                                <li class="cateOpt" value="old" ><a href="#">VERIFIER</a></li>
                                                                                <li class="cateOpt" value="old" ><a href="#">APPROVER</a></li>
                                                                                <li class="cateOpt" value="old" ><a href="#">PUBLISHER</a></li>
                                                                                <li class="cateOpt" value="old" ><a href="#">RECEPTION</a></li>
                                                                                <li class="cateOpt" value="old" ><a href="#">VIEWER</a></li>
                                                                                <li class="cateOpt" value="old" ><a href="#">SUPERADMIN</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-info label-floating">
                                                                            <i class="material-icons">lock</i>
                                                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                                        </div>
                                                                    </div>
                                                            
                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-info label-floating">
                                                                            <i class="material-icons">lock_open</i>
                                                                            <input type="password" name="password" class="form-control" placeholder="Confirm Password" >
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <button type="submit" name="adduser" id="adduser" class="btn btn-primary pull-right" style="background-color:#26c6da">Add User</button>
                                                                <div class="clearfix"></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
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

    <script src="assets/js/usermanagement.js"></script>

    <script>
        $(document).ready(function(){
            $('#adduser').click(function(e){
                e.preventDefault();
                var name= $('#name').val();
                var email=$('#email').val();
                var phone=$('#phone').val();
                var password= $('#password').val();
                var category=$('#category').val();
                if(name!="" && email!="" && phone!="" && password!="" && category!=""){
                    $.ajax({
                        url:'assets/snippets/adduser.php',
                        type:'POST',
                        data: $('#usrDetails').serialize(),
                        cache:false,
                        success: function(dataResult){
                            console.log(dataResult);
                            var dataResult=JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                $('input').val('');
                                // $('#email').val('');
                                // $('#phone').val('');
                                // $('#password').val('');
                                // $('#category').val('');
                                demo.showNotification('top','center','User created successfully!');
                            }
                            else {
                                demo.showNotification('top','center','Error occured in creating user!',4);
                            }
                        },
                        error: function(){
                            demo.showNotification('top','center','Error occured in connection!',4);
                        }
                    });
                }
                else
                {
                    demo.showNotification('top','center','Please fill in all the fields!',3);
                }
            });
        });
    </script>

</html>
