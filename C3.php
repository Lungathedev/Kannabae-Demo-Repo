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
   $delivered = "Delivered";
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
$query="SELECT * FROM orderlogs WHERE idOrderStat='".$delivered."' ";
$result=mysqli_query($conn,$query);
}
if($user==$pta){
$query="SELECT * FROM orderlogs WHERE idOrderStat='".$delivered."' ";
$result=mysqli_query($conn,$query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
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
                    <li><a class="sidebar-header" href="DLH.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>"><i data-feather="home"></i><span>Dashboard</span></a></li>
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
                             <li><a href="#"><i class="fa fa-circle"></i>Delivered orders</a></li>
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
                                    <small>Driver Agent</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                
                                <li class="breadcrumb-item">Order log</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid" width="4000px">
                <div class="card">
                    <div class="card-header">
                        <h5>Orders Delivered</h5>
                    </div>
                    <div class="card-body vendor-table">
                        <div class="gap"> 
				
				
				
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>[Order#]</th>
                                <th>[Status]</th>
                                <th>[Location]</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            while($rows=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                
                                <td>00<?php echo $rows['idLog']; ?> </td>
                                <td><?php echo $rows['idOrderStat']; ?></td>
                                <td>[<a href="L1.php?OD=<?php echo $rows['idLog']; ?>&username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>">view</a>]</td>
                                
                                

                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
		
                        </div>
                                <br>
                                <button onclick='refreshPage();'>
		                Update
	                        </button>
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
                        <p class="mb-0">© 2023 By the <strong>Mandla Etfu NPC</a></p>
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


</body>
</html>
