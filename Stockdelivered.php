<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
 $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

$token = bin2hex(random_bytes(3));
$amount = $_GET['Amount'];
$type = $_GET['Type'];
if($type=="Indoor - [Indica]"){
$amountGrams = $amount*1000;
}else if($type=="Outdoor - [Indica]"){
$amountGrams = $amount*1000;
}else if($type=="Indoor - [Sativa]"){
$amountGrams = $amount*1000;
}else if($type=="Outdoor - [Sativa]"){
$amountGrams = $amount*1000;
}else if($type=="Crushed Indoor - [Indica]"){
$amountGrams = $amount*1000;
}else if($type=="Crushed Outdoor - [Indica]"){
$amountGrams = $amount*1000;
}else if($type=="Crushed Indoor - [Sativa]"){
$amountGrams = $amount*1000;
}else if($type=="Crushed Outdoor - [Sativa]"){
$amountGrams = $amount*1000;
}else{
$amountGrams = $amount;
}
$username = $_GET['user'];
$jhb="ALFA-GAU-JHB";
$authtoken = $_GET['auth'];
$date = date("Y-m-d");
$time = date("H:i");
$province = "Gauteng";
$cityJHB = "Johannesburg";
$stat = "Delivered";
date_default_timezone_set('Africa/Johannesburg');

if($username==$jhb){

$query="select * from stockcounting WHERE idProvince='Gauteng' AND idCity='Johannesburg' AND idAlfacode='Delivered'";
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
 $idBatchE[]=$row['idPEnow'];
 $idBatchF[]=$row['idNLnow'];
 $idBatchG[]=$row['idCCESnow'];
 $idBatchH[]=$row['idPRnow'];
}

$batchA=Min($idBatchA);
$batchB=Min($idBatchB);
$batchC=Min($idBatchC);
$batchD=Min($idBatchD);
$batchE=Min($idBatchE);
$batchF=Min($idBatchF);
$batchG=Min($idBatchG);
$batchH=Min($idBatchH);


$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPEnow,idNLnow,idCCESnow,idPRnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date,$token,$amountGrams,$time,$province,$cityJHB,$type,$batchA,$batchB,$batchC,$batchD,$batchE,$batchF,$batchG,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
       header("Location:ST2.php?username=".$username."&auth=".$authtoken."");
       exit();
}

?>
