<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$auth=$_GET['auth'];
$user=$_GET['username'];
$collect=$_GET['Collect'];
$stat='Collected';
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
   mysqli_stmt_bind_param($stmt,"s",$auth);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $count=mysqli_stmt_num_rows($stmt);
 if (!$count>0){
    header("Location:Signin.php?error=notloggedin");
    exit();
}
if($user==$jhb){
$query="SELECT * FROM deliverylog WHERE idPrepperToken='".$collect."' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $ordernumber[]=$row['idOrderID'];
}

$authcode=$ordernumber[0];

$query="SELECT * FROM deliverylog WHERE idPrepperToken='".$collect."' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $token[]=$row['idCustomerToken'];
}

$custi=$token[0];

$new2="SELECT * FROM deliverylog WHERE idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
$result2=mysqli_query($conn,$new2);

while($row2 = mysqli_fetch_array($result2)) {
 $token2[]=$row2["idPrepperToken"];
  }

foreach ($token2 as $keys) {
  if ($keys==$collect){
      
      $sql="UPDATE deliverylog SET idPrepperToken='".$stat."' WHERE idPrepperToken='".$collect."' ";
      mysqli_query($conn,$sql);
      $sql2="UPDATE addresslog SET idOrderConfirmation='".$stat."' WHERE idOrderCustiCode='".$custi."' ";
      mysqli_query($conn,$sql2);
      $sql3="UPDATE orders SET idOrderConfirmation='".$stat."' WHERE idOrderCode='".$collect."' ";
      mysqli_query($conn,$sql3);
      $sql2="UPDATE orderlogs SET idOrderStat='Collected' WHERE idCustiToken='".$custi."' ";
      mysqli_query($conn,$sql2);
      header("Location:DL77.php?username=".$user."&auth=".$auth."&custi=".$custi."");
      exit();
      }
}
}
if($user==$pta){
$query="SELECT * FROM deliverylog WHERE idPrepperToken='".$collect."' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $ordernumber[]=$row['idOrderID'];
}

$authcode=Min($ordernumber);

$query="SELECT * FROM deliverylog WHERE idPrepperToken='".$collect."' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $token[]=$row['idCustomerToken'];
}

$custi=Min($token);

$new2="SELECT * FROM deliverylog WHERE idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
$result2=mysqli_query($conn,$new2);

while($row2 = mysqli_fetch_array($result2)) {
 $token2[]=$row2["idPrepperToken"];
  }

foreach ($token2 as $keys) {
  if ($keys==$collect){
      $sql="UPDATE deliverylog SET idPrepperToken='".$stat."' WHERE idPrepperToken='".$collect."' ";
      mysqli_query($conn,$sql);
      $sql2="UPDATE addresslog SET idOrderConfirmation='".$stat."' WHERE idOrderCustiCode='".$custi."' ";
      mysqli_query($conn,$sql2);
      $sql3="UPDATE orders SET idOrderConfirmation='".$stat."' WHERE idOrderCode='".$collect."' ";
      mysqli_query($conn,$sql3);
      $sql2="UPDATE orderlogs SET idOrderStat='Collected' WHERE idCustiToken='".$custi."' ";
      mysqli_query($conn,$sql2);
      header("Location:DL77.php?username=".$user."&auth=".$auth."&custi=".$custi."");
      exit();
      }
}
}

    
