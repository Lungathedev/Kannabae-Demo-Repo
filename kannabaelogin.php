<?php
 $servername="f80b6byii2vwv8cx.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
 $dBUsername="zdpn09bcanrj1tfg";
 $dBPassword="ebiw0zbb2yrmip9m";
 $dBName="ps10x0d3zqwexf5i";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$uid=$_POST['uid'];
$password=$_POST['pwd'];

if ($uid=='PREP-GAU-JHB'){
   if($password=='94'){
    $token= bin2hex(random_bytes(16));
    $sql="INSERT INTO userauth2 (idUsername,idToken) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: Signin.php?error=auth");
    exit();
 }
 mysqli_stmt_bind_param($stmt,"ss",$uid,$token);
 mysqli_stmt_execute($stmt);
    header("Location: PH.php?login=successful"."&auth=".$token."&username=".$uid) ;
    exit();
 }else {
    header("Location: Signin.php?error=wrngpwd"."&username=".$uid);
    exit();
}
}
if ($uid=='PREP-GAU-PTA'){
   if($password=='94'){
    $token= bin2hex(random_bytes(16));
    $sql="INSERT INTO userauth2 (idUsername,idToken) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:Signin.php?error=auth");
    exit();
 }
 mysqli_stmt_bind_param($stmt,"ss",$uid,$token);
 mysqli_stmt_execute($stmt);
    header("Location:PH.php?login=successful"."&auth=".$token."&username=".$uid) ;
    exit();
 }else {
    header("Location:Signin.php?error=wrngpwd"."&username=".$uid);
    exit();
}
}
if ($uid=='DEL-GAU-JHB'){
   if($password=='94'){
    $token= bin2hex(random_bytes(16));
    $sql="INSERT INTO userauth2 (idUsername,idToken) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:Signin.php?error=auth");
    exit();
 }
 mysqli_stmt_bind_param($stmt,"ss",$uid,$token);
 mysqli_stmt_execute($stmt);
    header("Location:DLH.php?login=successful"."&auth=".$token."&username=".$uid) ;
    exit();
 }else {
    header("Location:Signin.php?error=wrngpwd"."&username=".$uid);
    exit();
}
}
if ($uid=='DEL-GAU-PTA'){
   if($password=='94'){
    $token= bin2hex(random_bytes(16));
    $sql="INSERT INTO userauth2 (idUsername,idToken) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:Signin.php?error=auth");
    exit();
 }
 mysqli_stmt_bind_param($stmt,"ss",$uid,$token);
 mysqli_stmt_execute($stmt);
    header("Location:DLH.php?login=successful"."&auth=".$token."&username=".$uid) ;
    exit();
 }else {
    header("Location:Signin.php?error=wrngpwd"."&username=".$uid);
    exit();
}
}
if ($uid=='ALFA-GAU-JHB'){
   if($password=='94'){
    $token= bin2hex(random_bytes(16));
    $sql="INSERT INTO userauth2 (idUsername,idToken) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:Signin.php?error=auth");
    exit();
 }
 mysqli_stmt_bind_param($stmt,"ss",$uid,$token);
 mysqli_stmt_execute($stmt);
    header("Location:Alfa.php?login=successful"."&auth=".$token."&username=".$uid) ;
    exit();
 }else {
    header("Location:Signin.php?error=wrngpwd"."&username=".$uid);
    exit();
}
}
if ($uid=='ALFA-GAU-PTA'){
   if($password=='94'){
    $token= bin2hex(random_bytes(16));
    $sql="INSERT INTO userauth2 (idUsername,idToken) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:Signin.php?error=auth");
    exit();
 }

 mysqli_stmt_bind_param($stmt,"ss",$uid,$token);
 mysqli_stmt_execute($stmt);
    header("Location:Alfa.php?login=successful"."&auth=".$token."&username=".$uid) ;
    exit();
 }else {
    header("Location:Signin.php?error=wrngpwd"."&username=".$uid);
    exit();
}
}

if ($uid=='DISTRO-GAU'){
   if($password=='94'){
    $token= bin2hex(random_bytes(16));
    $sql="INSERT INTO userauth2 (idUsername,idToken) VALUES (?,?);";
    $stmt= mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location:Signin.php?error=auth");
    exit();
 }
 mysqli_stmt_bind_param($stmt,"ss",$uid,$token);
 mysqli_stmt_execute($stmt);
    header("Location:Distro.php?login=successful"."&auth=".$token."&username=".$uid) ;
    exit();
 }else {
    header("Location:Signin.php?error=wrngpwd"."&username=".$uid);
    exit();
}
}
?>
