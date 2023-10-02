<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
 $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$vcode = $_GET['Vcode'];
$username = $_GET['username'];
$authtoken = $_GET['auth'];
$stat = "Verified";

$sql="UPDATE StockLog SET idDeliveryStat='".$stat."' WHERE idAlfaCode='".$vcode."'";
mysqli_query($conn,$sql);

header("Location:Alfa.php?username=".$username."&auth=".$authtoken."");
exit();

?>

