<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";

$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum);

if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		require 'connection.php';

		$USER_ID = $_SESSION['USER']['ID'];
		$CURRENCY = $_POST["CURRENCY"];
		$GATEWAYNAME = $_POST["GATEWAYNAME"];
		$RESPMSG = $_POST["RESPMSG"];
		$BANKNAME = $_POST["BANKNAME"];
		$PAYMENTMODE = $_POST["PAYMENTMODE"];
		$MID = $_POST["MID"];
		$RESPCODE = $_POST["RESPCODE"];
		$TXNID = $_POST["TXNID"];
		$TXNAMOUNT = $_POST["TXNAMOUNT"];
		$ORDERID = $_POST["ORDERID"];
		$STATUS = $_POST["STATUS"];
		$BANKTXNID = $_POST["BANKTXNID"];
		$TXNDATE = $_POST["TXNDATE"];
		$CHECKSUMHASH = $_POST["CHECKSUMHASH"];

		$status = "1";
		$sqlPayment = "INSERT INTO fns_payment_status(fps_user_id, fps_currency_type, fps_gateway_name, fps_response_message, fps_bank_name, fps_payment_mode, fps_mid, fps_response_code, fps_txn_id, fps_txn_amount, fps_order_id, fps_txn_status, fps_bank_txn_id, fps_txn_date, fps_checksum_hash_code, fps_status) VALUES
		('".$USER_ID."', '".$CURRENCY."', '".$GATEWAYNAME."', '".$RESPMSG."', '".$BANKNAME."', '".$PAYMENTMODE."', '".$MID."', '".$RESPCODE."', '".$TXNID."', '".$TXNAMOUNT."', '".$ORDERID."', '".$STATUS."', '".$BANKTXNID."', '".$TXNDATE."', '".$CHECKSUMHASH."', '".$status."' )";

		if (mysqli_query($mysqli, $sqlPayment)) {
			$ORD_ID = $_SESSION["USER"]['ORDER_ID'];
			$COUPON_ID = $_SESSION["USER"]['ORDER_COUPON_ID'];
			$ADD_ID = $_SESSION["USER"]['ORDER_ADDRESS_ID'];
			$DIS_APP = $_SESSION["USER"]['ORDER_DISCOUNT_APPLIED'];
			$INITIAL_AMOUNT = $_SESSION["USER"]['ORDER_INITIAL_PRICE'];
			$FINAL_PRICE = $_SESSION["USER"]['ORDER_FINAL_TOTAL_PRICE'];
			$PAY_MODE = $_SESSION["USER"]['ORDER_PAYMENT_MODE'];
			$ORD_DATE = date("d/m/y");
			$ORD_ORD_STATUS = "0";
			$ORD_STATUS = "1";

			$sqlOrd = "INSERT INTO fns_orders(ord_id, ord_user_id, ord_coupon_id, ord_address_id, ord_total_item, ord_total_initial_amount, ord_discount_applied, ord_total_final_amount, ord_payment_mode, ord_date_time, ord_ord_status, ord_status)
			VALUES('".$ORD_ID."', '".$USER_ID."', '".$COUPON_ID."', '".$ADD_ID."', '4', '".$INITIAL_AMOUNT."', '".$DIS_APP."', '".$FINAL_PRICE."', '".$PAY_MODE."', '".$ORD_DATE."', '".$ORD_ORD_STATUS."', '".$ORD_STATUS."')";
			if (mysqli_query($mysqli, $sqlOrd)) {
				$sqlBagItems = "SELECT ub.ub_item_id AS item_id, ub.ub_item_quantity AS item_quantity, ci.ci_mrp_price AS item_mrp, ci.ci_off_price AS item_off_price  
				FROM fns_user_bag  AS ub
				INNER JOIN fns_category_item  AS ci ON ub.ub_item_id = ci.id WHERE ub_cust_id = '$USER_ID'";
				$result = mysqli_query($mysqli, $sqlBagItems);
				while($row = $result->fetch_assoc()){
					$sqlOrdList = "INSERT INTO fns_order_list(ol_ord_id, ol_item_id, ol_ord_quant, ol_mrp, ol_final_price) VALUES('".$ORD_ID."', '".$row['item_id']."', '".$row['item_quantity']."', '".$row['item_mrp']."', '".$row['item_off_price']."')";
					if(mysqli_query($mysqli, $sqlOrdList)){
						continue;
					}
				}
				$location = "http://localhost/fast_safe_4.0_np/order-confirmation.php";
				$sqlBagDelete = "DELETE FROM fns_user_bag WHERE ub_cust_id = '$USER_ID'";
				if(mysqli_query($mysqli, $sqlBagDelete)){
					header("Location: ".$location);
				}
			}
		}
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}
}
else {
	echo "<b>Checksum mismatched.</b>";
}
?>