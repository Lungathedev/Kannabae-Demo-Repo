<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$authtoken = $_GET['auth'];
$username = $_GET['username'];
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
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link rel="shortcut icon" href="">
    <title>Kannabae || Distro Agent</title>

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
             </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <h6 class="mt-3 f-14"><?php echo $username ?></h6>
                     <p><?php echo $locae ?></p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="Alfa.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>&location=<?php echo $locae ?>"><i data-feather="home"></i><span>Dashboard</span></a></li>
                  
                    
                    <li><a class="sidebar-header" href="#"><i data-feather="chrome"></i><span>Stock management</span></a>
                     <ul class="sidebar-submenu">
                            <li><a href="ST1.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>&location=<?php echo $locae ?>"><i class="fa fa-circle"></i>Deliver Stock</a></li>
                            <li><a href="ST2.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>&location=<?php echo $locae ?>"><i class="fa fa-circle"></i>Generated Codes</a></li>
                            <li><a href="ST3.php?username=<?php echo $_GET['username'];?>&auth=<?php echo $_GET['auth'];?>&location=<?php echo $locae ?>"><i class="fa fa-circle"></i>Recieve Verification Code</a></li>
                     </ul>  
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Delivery log</span></a></li>
                    <li><a class="sidebar-header" href="Logout.php"><i data-feather="log-in"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->


        <!-- Right sidebar Start-->
        
        <!-- Right sidebar Ends-->

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3><span style="color:seagreen;">Kannabae</span> operations
                                    <small>Stock Management</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item active"><span></span></li>
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
                        <h5>Distribution</h5>
                    </div>
                    <div class="card-body vendor-table" >
                         <div id="hideON">
                         <br>
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hideDP">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hideOC">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hideBW">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hideCC">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hidePR">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hideNL">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hideCCES">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <div id="hidePE">
                         <strong><span> </strong><span> </span> </span>
                         <br>
                         <br>
                         </div>
                         <form action="Stockdelivered.php" method="get" id="plug" name="moneytree">
                         <label><strong>Product Type:</strong></label>
                         <select class="Quality" name="Type" id="Quality" form="plug" required>
                         <option value="" disabled selected>Select Product Type</option>
                         <option value="Indoor - [Indica]" >Indoor - [Indica]</option>
                         <option value="Outdoor - [Indica]" >Outdoor - [Indica]</option>
                         <option value="Indoor - [Sativa]" >Indoor - [Sativa]</option>
                         <option value="Outdoor - [Sativa]" >Outdoor - [Sativa]</option>
                         <option value="Crushed Indoor - [Indica]" >Crushed Indoor - [Indica]</option>
                         <option value="Crushed Outdoor - [Indica]" >Crushed Outdoor - [Indica]</option>
                         <option value="Crushed Indoor - [Sativa]" >Crushed Indoor - [Sativa]</option>
                         <option value="Crushed Outdoor - [Sativa]" >Crushed Outdoor - [Sativa]</option>
                         </select><br>
<label><strong>Amount delivered (kg's): </strong></label><br><span> </span><input type="text" name="Amount" placeholder="Amount delivered" required>
<input type="hidden" name="auth" value="<?php echo $_GET['auth']; ?>">
<input type="hidden" name="user" value="<?php echo $_GET['username']; ?>">
<input type="submit" name="Verification" value="Generate verification code">
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
	

   document.getElementById("hideDP").style.display = "none";
   document.getElementById("hideCC").style.display = "none";
   document.getElementById("hideOC").style.display = "none";
   document.getElementById("hideBW").style.display = "none";
   document.getElementById("hidePR").style.display = "none";
   document.getElementById("hideCCES").style.display = "none";
   document.getElementById("hideNL").style.display = "none";
   document.getElementById("hidePE").style.display = "none";
   document.getElementById("hideON").style.display = "none";

}
hideOrder();
</script>
</body>
</html>
