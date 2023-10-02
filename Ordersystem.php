<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$auth=$_GET['auth'];
$user=$_GET['username'];
$stat='Prepared';
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
   mysqli_stmt_bind_param($stmt,"s",$auth);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_store_result($stmt);
   $count=mysqli_stmt_num_rows($stmt);
 if (!$count>0){
    header("Location:Signin.php?error=notloggedin");
    exit();
}
if($user==$jhb){
$query="SELECT * FROM orders WHERE idOrderConfirmation='Pending' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Johannesburg'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $ordernumbers[]=$row['idOrders'];
}

$order=Min($ordernumbers);

$query1="select * from deliverylog WHERE idUsername='Pending' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
$result1=mysqli_query($conn,$query1);
while($row=mysqli_fetch_array($result1)){
 $ordernumbers1[]=$row['idDelivery'];
}
$order1=Max($ordernumbers1);

$new='SELECT * FROM orders WHERE idOrders="'.$order.'" AND idOrderConfirmation="Pending" AND idOrderDate="'.$date.'" AND idOrderProvince="Gauteng" AND idOrderCity="Johannesburg"';
$result1=mysqli_query($conn,$new);

while($row = mysqli_fetch_array($result1)) {
 $token[]=$row["idOrderCustiCode"];
  }

foreach ($token as $keys) {
  if ($keys){
      $sql="UPDATE orders SET idOrderConfirmation='".$stat."' WHERE idOrderCustiCode='".$keys."' AND idOrderConfirmation='Pending' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Johannesburg'";
      mysqli_query($conn,$sql);
      $sql3="UPDATE deliverylog SET idUsername='".$user."' WHERE idCustomerToken='".$keys."' AND idUsername='Pending' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
      mysqli_query($conn,$sql3);
      $sql4="UPDATE deliverylog SET idDate='".$date."' WHERE idCustomerToken='".$keys."' AND idUsername='Pending' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
      mysqli_query($conn,$sql4);
      $sql2="UPDATE orderlogs SET idOrderStat='Prepared' WHERE idCustiToken='".$keys."' AND idOrderStat='Placed' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Johannesburg'";
      mysqli_query($conn,$sql2);
      header("Location:D1.php?username=".$user."&auth=".$auth."");
      exit();
      }
}
}
if($user==$pta){
$query="SELECT * FROM orders WHERE idOrderConfirmation='Pending' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Tshwane/Pretoria'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $ordernumbers[]=$row['idOrders'];
}

$order=Min($ordernumbers);

$query1="select * from deliverylog WHERE idUsername='Pending' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
$result1=mysqli_query($conn,$query1);
while($row=mysqli_fetch_array($result1)){
 $ordernumbers1[]=$row['idDelivery'];
}
$order1=Max($ordernumbers1);

$new='SELECT * FROM orders WHERE idOrders="'.$order.'" AND idOrderConfirmation="Pending" AND idOrderDate="'.$date.'" AND idOrderProvince="Gauteng" AND idOrderCity="Tshwane/Pretoria"';
$result1=mysqli_query($conn,$new);

while($row = mysqli_fetch_array($result1)) {
 $token[]=$row["idOrderCustiCode"];
  }

foreach ($token as $keys) {
  if ($keys){
      $sql="UPDATE orders SET idOrderConfirmation='".$stat."' WHERE idOrderCustiCode='".$keys."' AND idOrderConfirmation='Pending' AND idOrderDate='".$date."' AND idOrderProvince='Gauteng' AND idOrderCity='Tshwane/Pretoria'";
      mysqli_query($conn,$sql);
      $sql3="UPDATE deliverylog SET idUsername='".$user."' WHERE idCustomerToken='".$keys."' AND idUsername='Pending' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
      mysqli_query($conn,$sql3);
      $sql4="UPDATE deliverylog SET idDate='".$date."' WHERE idCustomerToken='".$keys."' AND idUsername='Pending' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
      mysqli_query($conn,$sql4);
      $sql2="UPDATE orderlogs SET idOrderStat='Prepared' WHERE idCustiToken='".$keys."' AND idOrderStat='Placed' AND idDate='".$date."' AND idProvince='Gauteng' AND idCity='Tshwane/Pretoria'";
      mysqli_query($conn,$sql2);
      header("Location:D1.php?username=".$user."&auth=".$auth."");
      exit();
      }
}
}

