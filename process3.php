<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
 $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
 $auth = $_GET['auth'];
 header("Location:Items.php?username=".$username."&auth=".$auth."");
 exit();
?>
