<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$authtoken = $_GET['auth'];
$dp = $_GET['DPgrams'];
$oc = $_GET['OCgrams'];
$bw = $_GET['BWgrams'];
$pr = $_GET['PRgrams'];
$nl = $_GET['NLgrams'];
$cces = $_GET['CCESgrams'];
$cc = $_GET['CCgrams'];
$pe = $_GET['PEgrams'];
$province = $_GET['Province'];
$city = $_GET['City'];
$town = $_GET['Towns'];
$suburb = $_GET['suburbs'];
$street = $_GET['streets'];
$structure = $_GET['Crib'];
$mall = $_GET['Mall'];
$building = $_GET['Building'];
$estate = $_GET['Estate'];
$complex = $_GET['Complex'];
$company = $_GET['Company'];
$shop = $_GET['Shop'];
$housenumber = $_GET['House-number'];
$unitnumber = $_GET['Unit-number'];
$contactnumber = $_GET['Contact-number'];
$total = $_GET['totalamount'];
$null = "0";
$stat="Delivered";

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

if($dp){
if($batchA==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($dp>$batchA){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

if($cc){
if($batchB==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($cc>$batchB){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

if($oc){
if($batchC==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($oc>$batchC){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

if($bw){
if($batchD==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($bw>$batchD){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

if($pe){
if($batchE==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($pe>$batchE){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

if($nl){
if($batchF==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($nl>$batchF){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

if($cces){
if($batchG==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($cces>$batchG){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

if($pr){
if($batchH==$null){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
if($pr>$batchH){
       header("Location:STM.php?auth=".$authtoken."&Province=".$province."&City=".$city."&Town=".$town."&Suburb=".$suburb."&Street=".$street."&DP=".$dp."&CC=".$cc."&OC=".$oc."&BW=".$bw."&PE=".$pe."&NL=".$nl."&CCES=".$cces."&PR=".$pr."");
       exit();
}
}

       header("Location:PM.php?auth=".$authtoken."&DPgrams=".$dp."&CCgrams=".$cc."&OCgrams=".$oc."&BWgrams=".$bw."&PEgrams=".$pe."&NLgrams=".$nl."&CCESgrams=".$cces."&PRgrams=".$pr."&Province=".$province."&City=".$city."&Towns=".$town."&Suburbs=".$suburb."&Streets=".$street."&Crib=".$structure."&Mall=".$mall."&Building=".$building."&Estate=".$estate."&Complex=".$complex."&Company=".$company."&Shop=".$shop."&House-number=".$housenumber."&Unit-number=".$unitnumber."&Contact-number=".$contactnumber."&totalamount=".$total."");
       exit();
