<?php
	session_start();
	$userId = $_SESSION['USER']['ID'];
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$INDUSTRY_TYPE_ID = "Retail";
$CHANNEL_ID = "WEB";


$CUST_ID = $userId;
$INDUSTRY_TYPE_ID = $INDUSTRY_TYPE_ID;
$CHANNEL_ID = $CHANNEL_ID;
$ORDER_ID = $_SESSION["USER"]['ORDER_ID'];
$TXN_AMOUNT = $_SESSION["USER"]['ORDER_FINAL_TOTAL_PRICE'];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

$paramList["CUST_ID"] = $CUST_ID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;


$paramList["CALLBACK_URL"] = "http://localhost/fast_safe_4.0_np/PaytmKit/pgResponse.php";
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>