<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
   $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
   $authtoken = $_GET['auth'];
   $username = $_GET['username'];
   $pta="PREP-GAU-PTA";
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
   
if($username==$jhb){
 $province='Gauteng';
 $city='Johannesburg';
 $stat='Delivered';

$query="select * from stockcounting WHERE idProvince='".$province."' AND idCity='".$city."' AND idAlfacode='".$stat."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $lastrow[]=$row['idStock'];
}

$row=Max($lastrow);

$query="select * from stockcounting WHERE idStock='".$row."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $idBatchA[]=$row['idDPnow'];
 $idBatchB[]=$row['idCCnow'];
 $idBatchC[]=$row['idOCnow'];
 $idBatchD[]=$row['idBWnow'];
 $idBatchE[]=$row['idPRnow'];
 $idBatchF[]=$row['idNLnow'];
 $idBatchG[]=$row['idCCESnow'];
 $idBatchH[]=$row['idPEnow'];
}

$batchA=Min($idBatchA);
$batchB=Min($idBatchB);
$batchC=Min($idBatchC);
$batchD=Min($idBatchD);
$batchE=Min($idBatchE);
$batchF=Min($idBatchF);
$batchG=Min($idBatchG);
$batchH=Min($idBatchH);
}

if($username==$pta){
 $province='Gauteng';
 $city='Tshwane/Pretoria';
 

$query="select * from stockcounting WHERE idProvince='".$province."' AND idCity='".$city."' AND idAlfacode='".$stat."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $lastrow[]=$row['idStock'];
}

$row=Max($lastrow);

$query="select * from stockcounting WHERE idStock='".$row."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $idBatchA[]=$row['idDPnow'];
 $idBatchB[]=$row['idCCnow'];
 $idBatchC[]=$row['idOCnow'];
 $idBatchD[]=$row['idBWnow'];
 $idBatchE[]=$row['idPRnow'];
 $idBatchF[]=$row['idNLnow'];
 $idBatchG[]=$row['idCCESnow'];
 $idBatchH[]=$row['idPEnow'];
}

$batchA=Min($idBatchA);
$batchB=Min($idBatchB);
$batchC=Min($idBatchC);
$batchD=Min($idBatchD);
$batchE=Min($idBatchE);
$batchF=Min($idBatchF);
$batchG=Min($idBatchG);
$batchH=Min($idBatchH);
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
    <meta name="keywords" content="kannabae">
    <meta name="author" content="K2021661320 (Pty) Ltd">
    <link rel="icon" href="">
    <link rel="shortcut icon" href="">
    <title>Kannabae || Preparation Agent</title>

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
                                    <span>Pending orders</span> 
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
                            <li><a href="C1.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i class="fa fa-circle"></i>Stock Status</a></li>
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
                                <h3><span style="color:seagreen;">Kannabae</span> operations
                                    <small>Preparation Agent</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->

                    <div class="card-body">
                                <div class="user-status table-responsive latest-order-table">
                                    <table class="table table-bordernone">
                                        <thead>
                                        <tr>
                                            <th scope="col">Stock</th>
                                            <th scope="col">In-Stock amount</th>
                                            <th scope="col">Status</th>
                                  
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-danger">Indoor - [Indica]</td>
                                            <td class="digits"><span><?php echo $batchA;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchA-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchA-A">[Available]</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-danger">Outdoor - [Indica]</td>
                                            <td class="digits"><span><?php echo $batchB;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchB-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchB-A">[Available]</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-danger">Indoor - [Sativa]</td>
                                            <td class="digits"><span><?php echo $batchC;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchC-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchC-A">[Available]</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-danger">Outdoor - [Sativa]</td>
                                            <td class="digits"><span><?php echo $batchD;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchD-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchD-A">[Available]</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-danger">Crushed Indoor - [Indica]</td>
                                            <td class="digits"><span><?php echo $batchE;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchE-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchE-A">[Available]</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-danger">Crushed Outdoor - [Indica]</td>
                                            <td class="digits"><span><?php echo $batchF;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchF-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchF-A">[Available]</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-danger">Crushed Indoor - [Sativa]</td>
                                            <td class="digits"><span><?php echo $batchG;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchG-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchG-A">[Available]</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-danger">Crushed Outdoor - [Sativa]</td>
                                            <td class="digits"><span><?php echo $batchH;?></span><span> grams</span>  </td>
                                            <td class="digits"><span style="display:none;color:orange;" id="batchH-OOS">[Out-Of-Stock]</span><span style="display:none;color:green;" id="batchH-A">[Available]</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    
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
                    <div class="col-md-6">
                        <p class="pull-right mb-0"></p>
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
setInterval (function hideAvail(){

var batchA = ' <?php echo $batchA; ?> ';
var batchB = ' <?php echo $batchB; ?> ';
var batchC = ' <?php echo $batchC; ?> ';
var batchD = ' <?php echo $batchD; ?> ';
var batchE = ' <?php echo $batchE; ?> ';
var batchF = ' <?php echo $batchF; ?> ';
var batchG = ' <?php echo $batchG; ?> ';
var batchH = ' <?php echo $batchH; ?> ';


if (batchA){
 document.getElementById("batchA-OOS").style.display = "none";
 document.getElementById("batchA-A").style.display = "block";
 }
if (batchA<1){
 document.getElementById("batchA-OOS").style.display = "block";
 document.getElementById("batchA-A").style.display = "none";
 }
if (batchB){
 document.getElementById("batchB-OOS").style.display = "none";
 document.getElementById("batchB-A").style.display = "block";
 }
if (batchB<1){
 document.getElementById("batchB-OOS").style.display = "block";
 document.getElementById("batchB-A").style.display = "none";
 }
if (batchC){
 document.getElementById("batchC-OOS").style.display = "none";
 document.getElementById("batchC-A").style.display = "block";
 }
if (batchC<1){
 document.getElementById("batchC-OOS").style.display = "block";
 document.getElementById("batchC-A").style.display = "none";
 }
if (batchD){
 document.getElementById("batchD-OOS").style.display = "none";
 document.getElementById("batchD-A").style.display = "block";
 }
if (batchD<1){
 document.getElementById("batchD-OOS").style.display = "block";
 document.getElementById("batchD-A").style.display = "none";
 }
if (batchE){
 document.getElementById("batchE-OOS").style.display = "none";
 document.getElementById("batchE-A").style.display = "block";
 }
if (batchE<1){
 document.getElementById("batchE-OOS").style.display = "block";
 document.getElementById("batchE-A").style.display = "none";
 }
if (batchF){
 document.getElementById("batchF-OOS").style.display = "none";
 document.getElementById("batchF-A").style.display = "block";
 }
if (batchF<1){
 document.getElementById("batchF-OOS").style.display = "block";
 document.getElementById("batchF-A").style.display = "none";
 }
if (batchG){
 document.getElementById("batchG-OOS").style.display = "none";
 document.getElementById("batchG-A").style.display = "block";
 }
if (batchG<1){
 document.getElementById("batchG-OOS").style.display = "block";
 document.getElementById("batchG-A").style.display = "none";
 }
if (batchH){
 document.getElementById("batchH-OOS").style.display = "none";
 document.getElementById("batchH-A").style.display = "block";
 }
if (batchH<1){
 document.getElementById("batchH-OOS").style.display = "block";
 document.getElementById("batchH-A").style.display = "none";
 }
}, 1000);
hideAvail();
</script>
</body>
</html>
