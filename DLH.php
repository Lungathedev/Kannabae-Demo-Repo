<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
 $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
   $authtoken = $_GET['auth'];
   $user = $_GET['username'];
   $pta="DEL-GAU-PTA";
   $jhb="DEL-GAU-JHB";
   $date = date("Y-m-d");
   date_default_timezone_set('Africa/Johannesburg');

   $sql='SELECT * FROM userauth2 WHERE idToken=?';
   $stmt=mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=SQL1");
       exit();
}
   mysqli_stmt_bind_param($stmt,"s",$authtoken);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $count=mysqli_stmt_num_rows($stmt);
 if (!$count>0){
    header("Location:Signin.php?error=notloggedin");
    exit();
}
if($user==$jhb){
$query3="SELECT * FROM orders WHERE idOrderConfirmation='Prepared' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Johannesburg'";
$result3=mysqli_query($conn,$query3);
$count3=mysqli_num_rows($result3);
 if (!$count3){
    $count3='0';
}
$query1="SELECT * FROM deliverylog WHERE idPrepperToken='Collected' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
$result1=mysqli_query($conn,$query1);
$count1=mysqli_num_rows($result1);
  if (!$count1){
    $count1='0';
}
$query2="SELECT * FROM deliverylog WHERE idPrepperToken='Delivered' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
$result2=mysqli_query($conn,$query2);
$count2=mysqli_num_rows($result2);
  if (!$count2){
    $count2='0';
}
}
if($user==$pta){
$query3="SELECT * FROM orders WHERE idOrderConfirmation='Prepared' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Tshwane/Pretoria'";
$result3=mysqli_query($conn,$query3);
$count3=mysqli_num_rows($result3);
 if (!$count3){
    $count3='0';
}
$query1="SELECT * FROM deliverylog WHERE idPrepperToken='Collected' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
$result1=mysqli_query($conn,$query1);
$count1=mysqli_num_rows($result1);
  if (!$count1){
    $count1='0';
}
$query2="SELECT * FROM deliverylog WHERE idPrepperToken='Delivered' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
$result2=mysqli_query($conn,$query2);
$count2=mysqli_num_rows($result2);
  if (!$count2){
    $count2='0';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-10BFE42JYZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-10BFE42JYZ');
</script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="K2021661320 (Pty) Ltd">
    <link rel="icon" href="">
    <link rel="shortcut icon" href="">
    <title>Kannabae || Delivery Agent</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="flag-icon.css">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="prism.css">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="chartist.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper"> </div>
            </div>
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        <div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div>
                    </div>
                    <h6 class="mt-3 f-14"><?php echo $_GET['username'];?></h6>
                    <p>Driver Agent</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Order collection</span></a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="DL01.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>
                                    <span>Scan pending collections</span> 
                                </a>
                                
                            </li>
                            <li><a href="DL99.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>Collect order</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i><span>Order delivery</span></a>
                        <ul class="sidebar-submenu">
                            
                            <li>
                                <a href="DL33.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>
                                    <span>Deliver order</span> 
                                </a>
                                
                            </li>
                            
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Order log</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="C2.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>Active orders</a></li>
                             <li><a href="C3.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>Delivered orders</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="Logout.php"><i data-feather="log-in"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->

      

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3><span style="color:seagreen;">Kannabae</span> operation
                                    <small>Driver Agent</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <span style="color:grey;"><small><?php echo $date; ?></small></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Pending Order Collections</span>
                                        <h3 class="mb-0"><span class="counter"><?php print_r($count3); ?></span><small> Now</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-primary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-primary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Orders collected</span>
                                        <h3 class="mb-0"><span class="counter"><?php print_r($count1); ?></span><small> Today</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-danger card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Orders delivered</span>
                                        <h3 class="mb-0"><span class="counter"><?php print_r($count2); ?></span><small> Today</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">© 2023 By <strong>K2021661320 (Pty) Ltd</strong></p>
                    </div>
                 
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="popper.min.js"></script>
<script src="bootstrap.js"></script>

<!-- feather icon js-->
<script src="feather.min.js"></script>
<script src="feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="sidebar-menu.js"></script>

<!--chartist js-->
<script src="chartist.js"></script>

<!--chartjs js-->
<script src="chart.min.js"></script>

<!-- lazyload js-->
<script src="lazysizes.min.js"></script>

<!--copycode js-->
<script src="prism.min.js"></script>
<script src="clipboard.min.js"></script>
<script src="custom-card.js"></script>

<!--counter js-->
<script src="jquery.waypoints.min.js"></script>
<script src="jquery.counterup.min.js"></script>
<script src="counter-custom.js"></script>

<!--peity chart js-->
<script src="peity.jquery.js"></script>

<!--sparkline chart js-->
<script src="sparkline.js"></script>

<!--Customizer admin-->
<script src="admin-customizer.js"></script>

<!--dashboard custom js-->
<script src="dashboard/default.js"></script>

<!--right sidebar js-->
<script src="chat-menu.js"></script>

<!--height equal js-->
<script src="height-equal.js"></script>

<!-- lazyload js-->
<script src="lazysizes.min.js"></script>

<!--script admin-->
<script src="admin-script.js"></script>

<script>
function pay(){
var cash = 10;
document.querySelector('.paythem').textContent = cash;
}
pay();
</script>
<script>
function reload(){
   setInterval(function(){
    location.reload();
}, 15000);
}
reload();
</script>
</body>
</html>