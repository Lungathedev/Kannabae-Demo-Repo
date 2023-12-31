<?php
$reset=$_GET['pwdReset'];
$signup=$_GET['signup'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Canibu is a website application that is powered by the South African police service (SAPS) and the Technology innovation agency (TIA) for the purpose of disposing cannabis.">
    <meta name="keywords" content="Canibu, canibu, canibu.co.za, cannabis disposal agency, cannabis, disposal, powered by SAPS, powered by TIA">
    <meta name="author" content="Kahrent Technology Africa (Pty) Ltd">
    <title>Kannabae || Login</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="iofrm-theme17.css">
</head>
<body>
    <div class="form-body without-side">
        
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="LoginBackground.jpg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Welcome! <br> Login to <span style="color:seagreen;">account</span></h3>
                        <p style="color:green;" >Operations personnel only</p>
                      
                        
                        <form action="kannabaelogin.php" method="post">
                            <input id="uid" class="form-control" type="text" name="uid" placeholder="Username/E-mail" required>
                            <p id="username" style="font-size:14px; color:red; display:none;">*Incorrect username/email</p>
                            
                            <input class="form-control" type="password" name="pwd" placeholder="Password" required>
                            <p id="password" style="font-size:14px; color:red; display:none;">*Incorrect password</p>
                            <p id="notloggedin" style="font-size:14px; color:red; display:none;">*Not logged in</p>
                            <p id="successful" style="font-size:14px; color:orange; display:none;">Logged out</p>
                            <p id="successful2" style="font-size:14px; color:green; display:none;">Thank you for visiting</p>
                            <p id="successful3" style="font-size:14px; color:green; display:none;">Sign-up to Canibuy successful. Welcome! Please log in</p>
                            <p id="successful4" style="font-size:14px; color:orange; display:none;">Password successfully reset</p>
                            <p id="successful5" style="font-size:14px; color:orange; display:none;">Account activated successfully</p>
                            <div class="form-button">
                                <button type="submit" class="ibtn" >Login</button> 
                               <a href="Reset.php">Forgot password?</a>
                            </div>
                        </form>
                      
                        <div class="page-links">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script 
src="ShowHandlers.js" >
</script>
<script>
function handler(){
 let confirmation="<?php echo $reset; ?>";
 if(confirmation=="successful"){
  document.getElementById("successful4").style.display = "block";
 }
}
handler();
</script>
<script>
function handler2(){
 let signup="<?php echo $signup; ?>";
 if(signup=="successful"){
  document.getElementById("successful5").style.display = "block";
 }
}
handler2();
</script>
</html>
