<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$auth=$_GET['auth'];
$date = date("Y-m-d");
date_default_timezone_set('Africa/Johannesburg');
$stat='Delivered';

$query="select * from deliverylog WHERE idOrderID='".$auth."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $lastrow[]=$row['idDelivery'];
}

$row=Max($lastrow);

$query1="select * from deliverylog WHERE idDelivery='".$row."'";
$result1=mysqli_query($conn,$query1);

while($row=mysqli_fetch_array($result1)){
 $custicode[]=$row['idCustomerToken'];
}

$custi=$custicode[0];

$query2="select * from orders WHERE idOrderToken='".$auth."' AND idOrderCustiCode='".$custi."'";
$result2=mysqli_query($conn,$query2);

while($row=mysqli_fetch_array($result2)){
 $idBatchAout[]=$row['idOrderDPgrams'];
 $idBatchBout[]=$row['idOrderCCbatches'];
 $idBatchCout[]=$row['idOrderOCgrams'];
 $idBatchDout[]=$row['idOrderBWgrams'];
 $idBatchEout[]=$row['idOrderPEgrams'];
 $idBatchFout[]=$row['idOrderNLgrams'];
 $idBatchGout[]=$row['idOrderCCESbatches'];
 $idBatchHout[]=$row['idOrderPRjays'];
}

$batchAout=$idBatchAout[0];
$batchBout=$idBatchBout[0];
$batchCout=$idBatchCout[0];
$batchDout=$idBatchDout[0];
$batchEout=$idBatchEout[0];
$batchFout=$idBatchFout[0];
$batchGout=$idBatchGout[0];
$batchHout=$idBatchHout[0];

$query4="select * from addresslog WHERE idToken='".$auth."' AND idOrderCustiCode='".$custi."'";
$result4=mysqli_query($conn,$query4);

while($row=mysqli_fetch_array($result4)){
 $idProvince[]=$row['idProvince'];
 $idCity[]=$row['idCity'];
 $idTown[]=$row['idTown'];
 $idSuburb[]=$row['idSuburb'];
 $idStreet[]=$row['idStreet'];
}

$province=$idProvince[0];
$city=$idCity[0];
$town=$idTown[0];
$suburb=$idSuburb[0];
$street=$idStreet[0];

$query3="select * from stockcounting WHERE idProvince='".$province."' AND idCity='".$city."' AND idAlfacode='".$stat."'";
$result3=mysqli_query($conn,$query3);

while($row=mysqli_fetch_array($result3)){
 $lastrowStock[]=$row['idStock'];
}

$last=Max($lastrowStock);

$query="select * from stockcounting WHERE idStock='".$last."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $idBatchAnow[]=$row['idDPnow'];
 $idBatchBnow[]=$row['idCCnow'];
 $idBatchCnow[]=$row['idOCnow'];
 $idBatchDnow[]=$row['idBWnow'];
 $idBatchEnow[]=$row['idPEnow'];
 $idBatchFnow[]=$row['idNLnow'];
 $idBatchGnow[]=$row['idCCESnow'];
 $idBatchHnow[]=$row['idPRnow'];
}

$batchAnow=$idBatchAnow[0];
$batchBnow=$idBatchBnow[0];
$batchCnow=$idBatchCnow[0];
$batchDnow=$idBatchDnow[0];
$batchEnow=$idBatchEnow[0];
$batchFnow=$idBatchFnow[0];
$batchGnow=$idBatchGnow[0];
$batchHnow=$idBatchHnow[0];


$a=$batchAnow-$batchAout;
$b=$batchBnow-$batchBout;
$c=$batchCnow-$batchCout;
$d=$batchDnow-$batchDout;
$e=$batchEnow-$batchEout;
$f=$batchFnow-$batchFout;
$g=$batchGnow-$batchGout;
$h=$batchHnow-$batchHout;

$sql="INSERT INTO stockcounting (idDPnow,idCCnow,idOCnow,idBWnow, idPRnow, idNLnow, idCCESnow, idPEnow, idProvince, idCity, idAlfacode) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
      $stmt=mysqli_stmt_init($conn);

       if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerror111");
       exit();
}
     mysqli_stmt_bind_param($stmt,"iiiiiiiisss",$a,$b,$c,$d,$h,$f,$g,$e,$province,$city,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     header("Location:T1.php?auth=".$auth."");
     exit();
