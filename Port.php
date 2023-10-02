<?php
$token= bin2hex(random_bytes(16));
?>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Cannabis requesting tool.">
    <meta name="keywords" content="kannabae, cannabis disposary, kannabae.org.za, mandlaetfu, Mandla, Etfu, cannabis, disposal">
    <meta name="author" content="K2021661320 (Pty) Ltd">
    <meta name="google-site-verification" content="GBPu-caHlQbXXit81AZCLNw98tL0XUFABpwSJUSdiUI" />
    <title>Kannabae || Port</title>
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
                        <h3>Welcome to <span style="color:seagreen;">kannabae</span></h3>           
                        <p style="color:seagreen;"><strong>Request a gift of cannabis</strong></p>
                        <p style="color:grey;" ><small>How it works [<a href="A3.php"><span>View<span></a>]</small></p>
                        <p><small>To enter this website you must acknowledge the following:</small></p>
                        <p><small>I am over 18 years of age and I have read these <a href="A1.php">terms and conditions</a>.</small></p>
                        <div class="page-links">
                            <p><a href="Items.php?auth=<?php echo $token; ?>"><span style="color:seagreen"><small>Enter website</small><span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
