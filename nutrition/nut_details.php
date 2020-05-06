<?php
include_once 'assets/conn/dbconnect.php';
?>

<?php
session_start();
// session_destroy();
if (isset($_SESSION['nutSession']) != "") {
header("Location: nutritionist/nut_details.php");
}
if (isset($_POST['login']))
{
$id_no = mysqli_real_escape_string($con,$_POST['id_no']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM nutritionist WHERE id_no = '$id_no'");
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['nutSession'] = $row['id_no'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location: nutrition/nut_details.php");
} else {
?>
<script>
alert('wrong input ');
</script>
<?php
}
}
?>
<!-- register -->
<?php
if (isset($_POST['signup'])) {
$nutFirstName = mysqli_real_escape_string($con,$_POST['nutFirstName']);
$nutLastName  = mysqli_real_escape_string($con,$_POST['nutLastName']);
$id_no= mysqli_real_escape_string($con,$_POST['id_no']);
$phone_no         = mysqli_real_escape_string($con,$_POST['phone_no']);
$nut_name            = mysqli_real_escape_string($con,$_POST['nut_name']);
$location           = mysqli_real_escape_string($con,$_POST['location']);
$password              = mysqli_real_escape_string($con,$_POST['password']);
//INSERT
$query = " INSERT INTO nutritionist (  fname, lname, id_no, phone_no,  nut_name, location,   password )
VALUES ( '$nutFirstName', '$nutLastName', '$id_no', '$phone_no', '$nut_name', '$location', '$password' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
    header("Location: nutrition/nut_details.php");
?>
<script type="text/javascript">
alert('Register success. Please Login to  to add your products and find client requests.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('User already registered. Please try again');
</script>
<?php
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Locate Expert</title>
        <!-- Bootstrap -->
        <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style1.css" rel="stylesheet">
        <link href="assets/css/blocks.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
    
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="assets/css/material.css" rel="stylesheet">
    </head>
    <body>
        <!-- navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">Locate Expert</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    
                    <ul class="nav navbar-nav navbar-right">
                        

                        <li><a href="../index.php">Home</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                   
                       <!--  <li>
                            <p class="navbar-text">Already have an account?</p>
                        </li> -->

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <form class="form" role="form" method="POST" accept-charset="UTF-8" >
                                                <div class="form-group">
                                                    <label class="sr-only" for="icPatient">Email</label>
                                                    <input type="text" class="form-control" name="icPatient" placeholder="ID Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><p class="navbar-text"><a href="adminlogin.php">Doctor</a></p></li>
                        <li><p class="navbar-text"><a href="pharmacist.php">Pharmacist</a></p></li>
                        <li><p class="navbar-text"><a href="nut.php">Nutritionist</a></p></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navigation -->

        <!-- modal container start -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Sign Up</h3>
                    </div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                        <h4>It's free and always will be.</h4>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="nutFirstName" value="" class="form-control input-lg" placeholder="First Name" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="nutLastName" value="" class="form-control input-lg" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                        
                                        <input type="text" name="id_no" value="" class="form-control input-lg" placeholder="Your ID Number"  required/>
                                        <input type="text" name="phone_no" value="" class="form-control input-lg" placeholder="Your Phone Number"  required/>
                                        
                                        
                                        <input type="text" name="nut_name" value="" class="form-control input-lg" placeholder="Nutritionist Name"  required/>

                                        <input type="text" name="location" value="" class="form-control input-lg" placeholder="Location Address"  required/>
                                        
                                        <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  required/>
                                        
                                        
                                    
                                        <br />
                                        <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
                                        
                                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Create my account</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
        <!-- modal container end -->

        <!-- 1st section start -->
        <section id="promo-1" class="content-block promo-1 min-height-600px bg-offwhite">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h2>This is still Under construction!</h2>
                        <p>This is Nutritionist's page.Please wait.
                        <?php
                         if(isset($_SESSION['nutSession'])) {
  echo "Your session is running " . $_SESSION['nutSession'];
}

                        ?>
                         </p>
                     
                       
                        <!-- date textbox end -->

                        <!-- script start -->
                        
                        
                        <!-- script start end -->
                     
                        <!-- table appointment start -->
                        <div id="txtHint"><b> </b></div>
                        
                        <!-- table appointment end -->
                    </div>
                    <!-- /.col -->
                   <!--  <div class="col-md-6 col-md-offset-1">
                        <div class="video-wrapper">
                            <iframe width="560" height="315" src="http://www.youtube.com/embed/FEoQFbzLYhc?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div> -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
    
        <div class="copyright-bar bg-black">
            <div class="container">
                <p class="pull-left small">© Locate Expert</p>
                <p class="pull-right small"><a href="../adminlogin.php">Doctor</a></p>
            </div>
        </div>
        <!-- footer end -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
    })
    </script>
    <!-- date start -->
  
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })

    })

</script>

    <!-- date end -->
   
</body>
</html>