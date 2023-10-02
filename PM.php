<?php
 $servername="#####";
 $dBUsername="#####";
 $dBPassword="#####";
 $dBName="#####";
$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);
$preppertoken= bin2hex(random_bytes(3));
$custitoken= bin2hex(random_bytes(3));
$date = date("Y-m-d");
$time = date("H:i");
$timeChange = date('H:i',strtotime('+2 hour',strtotime($time)));
date_default_timezone_set('Africa/Johannesburg');
$authtoken = $_GET['auth'];
$confirmedpayment1 = 'Placed';
$confirmedpayment = 'Pending';
$dp = $_GET['DPgrams'];
$oc = $_GET['OCgrams'];
$bw = $_GET['BWgrams'];
$pr = $_GET['PRgrams'];
$nl = $_GET['NLgrams'];
$cces = $_GET['CCESgrams'];
$cc = $_GET['CCgrams'];
$pe = $_GET['PEgrams'];
if(!$dp){
$dp = 0;
}
if(!$cc){
$cc = 0;
}
if(!$oc){
$oc = 0;
}
if(!$bw){
$bw = 0;
}
if(!$pr){
$pr = 0;
}
if(!$cces){
$cces = 0;
}
if(!$nl){
$nl = 0;
}
if(!$pe){
$pe = 0;
}
$province = $_GET['Province'];
$city = $_GET['City'];
$town = $_GET['Towns'];
$suburb = $_GET['Suburbs'];
$street = $_GET['Streets'];
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
$name = $_GET['Recipient-number'];
$total = $_GET['totalamount'];
$username = $_GET['City'];

$sql="INSERT INTO orders (idOrderDPgrams,idOrderCCbatches,idOrderOCgrams,idOrderBWgrams, idOrderPRjays, idOrderNLgrams, idOrderCCESbatches, idOrderPEgrams, idOrderConfirmation, idOrderToken, idOrderTime, idOrderDate,idOrderTotal,idOrderCustiCode,idOrderCode,idOrderProvince,idOrderCity,idOrderTown,idOrderSuburb) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerror111");
       exit();
}
     mysqli_stmt_bind_param($stmt,"iiiiiiiissssissssss",$dp,$cc,$oc,$bw,$pr,$nl,$cces,$pe,$confirmedpayment1,$authtoken,$timeChange,$date,$total,$custitoken,$preppertoken,$province,$city,$town,$suburb);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

$sql="INSERT INTO addresslog (idProvince,idCity,idTown,idSuburb,idCrib,idBuilding,idEstate,idComplex,idMall,idShop,idStreet,idUnitNumber,idHouseNumber,idContactNumber,idTime,idDate,idToken,idOrderConfirmation,idOrderCustiCode,idUsername) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location:Signin.php?error=sqlerror222");
       exit();
}
     mysqli_stmt_bind_param($stmt,"ssssssssssssssssssss",$province,$city,$town,$suburb,$structure,$building,$estate,$complex,$mall,$shop,$street,$unitnumber,$housenumber,$contactnumber,$timeChange,$date,$authtoken,$confirmedpayment1,$custitoken,$name);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

$sql3="INSERT INTO deliverylog (idDate,idUsername,idCustomerToken,idPrepperToken,idOrderID,idProvince,idCity,idTown,idSuburb) VALUES (?,?,?,?,?,?,?,?,?);";
$stmt= mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql3)){
    header("Location:Signin.php?error=sqlerror999");
    exit();
 }

    mysqli_stmt_bind_param($stmt,"sssssssss",$date,$confirmedpayment1,$custitoken,$preppertoken,$authtoken,$province,$city,$town,$suburb);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

$query="select * from deliverylog";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
 $ordernumbers[]=$row['id'];
}
$order=Max($ordernumbers);

$sql4="INSERT INTO orderlogs (idDate,idAmount,idOrderStat,idCustiToken,idOrderNumber,idPrepperToken,idProvince,idCity,idTown,idSuburb) VALUES (?,?,?,?,?,?,?,?,?,?);";
$stmt= mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql4)){
    header("Location:Signin.php?error=sqlerror123");
    exit();
 }
    mysqli_stmt_bind_param($stmt,"sississsss",$date,$total,$confirmedpayment1,$custitoken,$order,$authtoken,$province,$city,$town,$suburb);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


   function generateSignature($data, $passPhrase = null) {
    // Create parameter string
    $pfOutput = '';
    foreach( $data as $key => $val ) {
        if(!empty($val)) {
            $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
        }
    }
    // Remove last ampersand
    $getString = substr( $pfOutput, 0, -1 );
    if( $passPhrase !== null ) {
        $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
    }
    return md5( $getString );
}

$cartTotal = 10.00;
$data = array(
    'merchant_id' => '#####',
    'merchant_key' => '#####',
    'return_url' => 'https://kannabae.org.za/process2.php',
    'cancel_url' => 'https://kannabae.org.za/process1.php',
    'amount'=> $total,
    'item_name' => 'Kannabae',
);
$signature = generateSignature($data);
$data['signature'] = $signature;


$htmlForm = '<form action="https://sandbox.payfast.co.za/eng/process" method="post" id="form">';
foreach($data as $name=> $value)
{
    $htmlForm .= '<input name="'.$name.'" type="hidden" value="'.$value.'" />';
}
$htmlForm .= '<input type="submit" name="Pay" value="Order" id="Blanks" class="Orderbtn" style="display:none"/></form>';
echo $htmlForm;
?>
<html>
 <head>
 
 </head>
<script>
function set(){
localStorage.setItem('eTotal', "<span class="totalpricedelivery"></span>");
localStorage.setItem('eCity', "<?php echo $city; ?>");
localStorage.setItem('eTown', "<?php echo $town; ?>");
localStorage.setItem('eSuburb', "<?php echo $suburb; ?>");
localStorage.setItem('eStreet', "<?php echo $street; ?>");
localStorage.setItem('eMall', "<?php echo $mall; ?>");
localStorage.setItem('eBuilding', "<?php echo $building; ?>");
localStorage.setItem('eShop', "<?php echo $shop; ?>");
localStorage.setItem('eComplex', "<?php echo $complex; ?>");
localStorage.setItem('eCompany', "<?php echo $company; ?>");
localStorage.setItem('eHouseNumber', "<?php echo $housenumber; ?>");
localStorage.setItem('eUnitNumber', "<?php echo $unitnumber; ?>");
localStorage.setItem('eEstate', "<?php echo $estate; ?>");
localStorage.setItem('eDP', "<?php echo $dp; ?>");
localStorage.setItem('eCC', "<?php echo $cc; ?>");
localStorage.setItem('eOC', "<?php echo $oc; ?>");
localStorage.setItem('eBW', "<?php echo $bw; ?>");
localStorage.setItem('eNL', "<?php echo $nl; ?>");
localStorage.setItem('ePR', "<?php echo $pr; ?>");
localStorage.setItem('eCCES', "<?php echo $cces; ?>");
localStorage.setItem('ePE', "<?php echo $pe; ?>");
localStorage.setItem('eContact', "<?php echo $contactnumber; ?>");
localStorage.setItem('eDate', "<?php echo $date; ?>");
localStorage.setItem('username', "<?php echo $username; ?>");
localStorage.setItem('token', "<?php echo $authtoken; ?>");
}
set();
</script>
<script 
src="Deliverypricedisplay.js" >
</script>
</html>
<?php
echo'
<script>
function submit(){
document.getElementById("form").submit();
}
submit();
</script>';
?>
