<?php
 $servername="f80b6byii2vwv8cx.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
 $dBUsername="zdpn09bcanrj1tfg";
 $dBPassword="ebiw0zbb2yrmip9m";
 $dBName="ps10x0d3zqwexf5i";
 $conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$token = bin2hex(random_bytes(3));
$vcode = $_GET['Vcode'];
$username = $_GET['user'];
$authtoken = $_GET['auth'];
$type = $_GET['Type'];
$quantity = $_GET['Quantity'];
$date = date("Y-m-d");
$time = date("H:i");
$null=0;
$stat="Delivered";
$stat2="0";
date_default_timezone_set('Africa/Johannesburg');
$province='Gauteng';
$city='Johannesburg';

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

if($type=="Indoor - [Indica]"){

$newAmount= $batchA + $quantity;
 
$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);
 
$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];
}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 

$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$newAmount,$batchB,$batchC,$batchD,$batchE,$batchF,$batchG,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
     header("Location:SV3.php?username=".$username."&auth=".$authtoken."&verify=".$newAmount."");
     exit();
}

if($type=="Outdoor - [Indica]"){

$newAmount= $batchB + $quantity;

$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);
 
$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];
}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 


$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$batchA,$newAmount,$batchC,$batchD,$batchE,$batchF,$batchG,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
      header("Location:SV3.php?username=".$username."&auth=".$authtoken."");
      exit();
}

if($type=="Indoor - [Sativa]"){

$newAmount= $batchC + $quantity;

$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);

$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];

}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 


$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$batchA,$batchB,$newAmount,$batchD,$batchE,$batchF,$batchG,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
      header("Location:SV3.php?username=".$username."&auth=".$authtoken."");
      exit();
}

if($type=="Outdoor - [Sativa]"){

$newAmount= $batchD + $quantity;

$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);

$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];
}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 

$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$batchA,$batchB,$batchC,$newAmount,$batchE,$batchF,$batchG,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
      header("Location:SV3.php?username=".$username."&auth=".$authtoken."");
      exit();
}

if($type=="Crushed Indoor - [Indica]"){

$newAmount= $batchE + $quantity;

$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);

$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];
}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 

$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$batchA,$batchB,$batchC,$batchD,$newAmount,$batchF,$batchG,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
      header("Location:SV3.php?username=".$username."&auth=".$authtoken."");
      exit();
}

if($type=="Crushed Outdoor - [Indica]"){

$newAmount= $batchF + $quantity;

$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);

$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];
}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 

$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$batchA,$batchB,$batchC,$batchD,$batchE,$newAmount,$batchG,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
      header("Location:SV3.php?username=".$username."&auth=".$authtoken."");
      exit();
}

if($type=="Crushed Indoor - [Sativa]"){

$newAmount= $batchG + $quantity;

$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);

$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];
}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 

$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$batchA,$batchB,$batchC,$batchD,$batchE,$batchF,$newAmount,$batchH,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
      header("Location:SV3.php?username=".$username."&auth=".$authtoken."");
      exit();
}

if($type=="Crushed Outdoor - [Sativa]"){

$newAmount= $batchH + $quantity;

$sql2="UPDATE stockcounting SET idStat='".$stat2."' WHERE idAlfacode='".$vcode."'";
mysqli_query($conn,$sql2);

$query="select * from stockcounting WHERE idAlfacode='".$vcode."'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result)){
 $iddate1[]=$row['idDate'];
 $iddpin1[]=$row['idDPin'];
 $idtime1[]=$row['idTime'];
 $idprovince1[]=$row['idProvince'];
 $idcity1[]=$row['idCity'];
 $idtype1[]=$row['idBatch'];
}

$date1=$iddate1[0];
$dpin1=$iddpin1[0];
$time1=$idtime1[0];
$province1=$idprovince1[0];
$city1=$idcity1[0];
$type1=$idtype1[0]; 

$sql="INSERT INTO stockcounting (idDate,idAlfacode,idDPin,idTime,idProvince,idCity,idBatch,idDPnow,idCCnow,idOCnow,idBWnow,idPRnow,idNLnow,idCCESnow,idPEnow,idStat) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerrorST2");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssissssiiiiiiiis",$date1,$stat,$dpin1,$time1,$province1,$city1,$type1,$batchA,$batchB,$batchC,$batchD,$batchE,$batchF,$batchG,$newAmount,$stat);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql1="UPDATE stockcounting SET idAlfacode='".$stat."' WHERE idAlfacode='".$vcode."'";
     mysqli_query($conn,$sql1);
 
      header("Location:SV3.php?username=".$username."&auth=".$authtoken."");
      exit();
}
?>
