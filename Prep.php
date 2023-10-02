<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$authtoken=$_GET['auth'];
$prepper = $_GET['username'];
$jhb="PREP-GAU-JHB";
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
if($prepper==$jhb){
$query="SELECT * FROM orders WHERE idOrderConfirmation='Pending' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Johannesburg'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>1){
 while($row=mysqli_fetch_array($result)){
 $ordernumbers[]=$row['idOrders'];
  }
 $order=Min($ordernumbers);
 $final="SELECT * FROM orders WHERE idOrders='".$order."' AND idOrderConfirmation='Pending' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Johannesburg'";
 $finalresult=mysqli_query($conn,$final);
 $row = mysqli_fetch_array($finalresult);
}
else if($count>0){
 $row=mysqli_fetch_array($result);
}
else{
    header("Location:D2.php?username=".$prepper."&auth=".$authtoken."");
    exit();
}
}

?>
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
    <meta name="keywords" content="kannabae">
    <meta name="author" content="">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <title>Kannabae || Preparation Agent</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="flag-icon.css">

    <!-- Datatable css-->
    <link rel="stylesheet" type="text/css" href="datatables.css">

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
                    <p>Preparation Agent</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="PH.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i><span>Order Preparation</span></a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="D2.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>
                                    <span>Scan pending orders</span> 
                                </a>
                                
                            </li>
                         
                            <li>
                                <a href="Prep.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>
                                    <span>Prepare pending orders</span> 
                                </a>
                          
                            </li>
                        </ul>
                    </li>
                    
                    
                    
                    <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Order Collection</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="C1.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>Collection Codes</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Stock management</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="SV1.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>Recieve Stock</a></li>
                            <li><a href="STO.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>Stock Status</a></li>
                           
                            
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
                                <h3><span style="color:seagreen;">Kannabae</span> Operations
                                    <small>Preparation Agent</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item active"><span style="color:seagreen;">Pending order/s:</span><span> </span> <?php print_r($count); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid" width="100%">
                <div class="card">
                    <div class="card-header">
                        <h5>Order to prepare</h5>
                    </div>
                    <div class="card-body vendor-table" >
                         <br>
                         <strong><span>Order number:</strong><span> </span>[000<?php print_r($row['idOrders']); ?>]</span>
                         <br>
                         <br>
                         <div id="hideDP">
                         <strong><span>Indoor - [Indica]:</strong><span> </span><?php print_r($row['idOrderDPgrams']); ?> grams</span>
                         <br>
                         <br>
                         </div>
                         <div id="hideCC">
                         <strong><span>Outdoor - [Indica]:</strong><span> </span><?php print_r($row['idOrderCCbatches']); ?> grams</span>
                         <br>
                         <br>
                         </div>
                         <div id="hideOC">
                         <strong><span>Indoor - [Sativa]:</strong><span> </span><?php print_r($row['idOrderOCgrams']); ?> grams</span>
                         <br>
                         <br>
                         </div>
                         <div id="hideBW">
                         <strong><span>Outdoor - [Sativa]:</strong><span> </span><?php print_r($row['idOrderBWgrams']); ?> grams</span>
                         <br>
                         <br>
                         </div>
                         <div id="hidePR">
                         <strong><span>Crushed Indoor - [Indica]:</strong><span> </span><?php print_r($row['idOrderPRjays']); ?> joint/s</span>
                         <br>
                         <br>
                         </div>
                         <div id="hideNL">
                         <strong><span>Crushed Outdoor - [Indica]:</strong><span> </span><?php print_r($row['idOrderNLgrams']); ?> joint/s</span>
                         <br>
                         <br>
                         </div>
                         <div id="hideCCES">
                         <strong><span>Crushed Indoor - [Sativa]:</strong><span> </span><?php print_r($row['idOrderCCESbatches']); ?> batch/es</span>
                         <br>
                         <br>
                         </div>
                         <div id="hidePE">
                         <strong><span>Crushed Outdoor - [Sativa]:</strong><span> </span><?php print_r($row['idOrderPEgrams']); ?> batch/es</span>
                         <br>
                         <br>
                         </div>
                         <form action="Ordersystem.php" method="get" id="form">
                         <input type="hidden" name="auth" value="<?php echo $_GET['auth']; ?>">
                         <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
                         <input type="submit" name="Next" value="Complete order" id="Blanks" "/>
                         </form>
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

<!-- Datatables js-->
<script src="jquery.dataTables.min.js"></script>
<script src="custom-basic.js"></script>

<!--Customizer admin-->
<script src="admin-customizer.js"></script>

<!-- lazyload js-->
<script src="lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="chat-menu.js"></script>

<!--script admin-->
<script src="admin-script.js"></script>

<script>
function hideOrder(){
	
var DP = <?php echo $row['idOrderDPgrams'] ?>;
var CC = <?php echo $row['idOrderCCbatches']?>;
var OC = <?php echo $row['idOrderOCgrams']?>;
var BW = <?php echo $row['idOrderBWgrams']?>;
var PR = <?php echo $row['idOrderPRjays']?>;
var CCES = <?php echo $row['idOrderCCESbatches']?>;
var NL = <?php echo $row['idOrderNLgrams']?>;
var PE = <?php echo $row['idOrderPEgrams']?>;
	
if(DP == 0){
   document.getElementById("hideDP").style.display = "none";
 }
if(CC == 0){
   document.getElementById("hideCC").style.display = "none";
 }
if(OC == 0){
   document.getElementById("hideOC").style.display = "none";
 }
if(BW == 0){
   document.getElementById("hideBW").style.display = "none";
 }
if(PR == 0){
   document.getElementById("hidePR").style.display = "none";
 }
if(CCES == 0){
   document.getElementById("hideCCES").style.display = "none";
 }
if(NL == 0){
   document.getElementById("hideNL").style.display = "none";
 }
if(PE == 0){
   document.getElementById("hidePE").style.display = "none";
}
}
hideOrder();
</script>
</body>
</html>
