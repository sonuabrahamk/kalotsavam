<?php
    session_start();

    if(isset($_SESSION['uid'])){
        header('Location: index.php');
    }
?> 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/logo.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Login | Bible Kalotsavam | The Complete Solution</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-kit.css" rel="stylesheet"/>
        
        <!--  Material Dashboard CSS    -->
        <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
        <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet"/>
        
        <link href="assets/css/custom-login.css" rel="stylesheet"/>
		<style>
			.card-pricing .icon i{
                width: 100px;
                height: 100px;
                line-height: 100px;
            }

            .card-pricing .form-group{
                /* margin-top: 20px; */
                padding: 0 5px;
                box-sizing: border-box;
            }

            .card-pricing .form-group .form-control{
                display: inline-block;
                width: 83%;
            }

            .card-pricing .form-group i{
                vertical-align: middle;
                margin: 0 10px;
            }

            .btn{
                /* margin: 30px 1px; */
                background-color: #26c6da;
            }

            .modal-dialog{
                width: 356px;
            }

            .modal{
                z-index: 1030;
            }


		</style>
    </head>

    <body class="login-page">

        <?php include('assets/snippets/login-navbar.php'); ?>

        <div class="page-header header-filter" style="background-image: url('assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-pricing card-raised">
							<div class="content">
								<h6 class="category">Bible Kalotsavam Login</h6>
								<div class="icon icon-rose">
									<i class="material-icons" style="color:#26c6da">account_circle</i>
								</div>
                                <div class="card-content">
                                    <form class="login-form" id="loginDetails">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <i class="material-icons">face</i>
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <i class="material-icons">lock</i>
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
								<input type="submit" value="LOGIN" name="loginBtn" id="loginBtn" class="btn btn-round">
							</div>
						</div>
                    </div>
                </div>
            </div>
            
            <?php /*  include('assets/snippets/login-footer.php'); */ ?>

        </div>

        <!-- Modal Design Template -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change password to proceed</hr></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-info label-floating">
                                    <input type="password" class="form-control" name="oldpass" id="oldPass" placeholder="Old Password">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-info label-floating">
                                    <input type="password" name="newpassword" id="newPwd" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-info label-floating">
                                    <input type="password" name="cfmpassword" id="cfmPwd" class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <input type="button" class="btn btn-round" id="chgPass" value="Change Password" />
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
    <script src="assets/js/material-bootstrap-wizard.js" type="text/javascript"></script>

    <script src="assets/js/custom.js"></script>

    <script>
        $(document).ready(function(){
            $('#loginBtn').click(function(e){

                e.preventDefault();

                var username=$('#username').val();
                var password=$('#password').val();
                if(username!="" && password!=""){
                    $.ajax({
                        url:'assets/snippets/loginuser.php',
                        type:'post',
                        data:$('#loginDetails').serialize(),
                        cache:false,
                        success:function(dataResult){
                            
                            var dataResult=JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                window.location.href="index.php";
                            }
                            else if(dataResult.statusCode==100){
                                $('.card-raised').fadeOut('fast');
                                $('#myModal').css('display','block');
                                $('#myModal').addClass('in');
                            }
                            else{
                                demo.showNotification('top','center',dataResult.statusCode,3);
                            }
                        },
                        error:function(){
                            demo.showNotification('top','center','Could not find server!',4);
                        }
                    });
                }
                else{
                    demo.showNotification('top','center','Please fill all fields to proceed!',3);
                }
            });

            $('#chgPass').click(function(){

                var username=$('#username').val();
                var typedpassword = $('#password').val();
                var oldpassword = $('#oldPass').val();
                var newpassword = $('#newPwd').val();
                var cfmpassword = $('#cfmPwd').val();

                if((newpassword!=cfmpassword) || (oldpassword=="")||(newpassword=="")||(cfmpassword=="")||(oldpassword!=typedpassword)){
                    demo.showNotification('top','center','Please feed in right data!!',3);
                }
                else{
                    window.location.href="assets/snippets/uptPassword.php?user="+username+"&&old="+oldpassword+"&&newpwd="+newpassword;
                }
            });


            $('.close').click(function(){
                $('#myModal').css('display','none');
                $('#myModal').removeClass('in');
                $('.card-raised').fadeIn('fast');
            });

            $('.dismiss').click(function(){
                $('.close').trigger('click');
            });


        });
    </script>

</html>
