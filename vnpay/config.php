<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
include '../inc/connect.php';
include '../helpers/helper.php';

$vnp_TmnCode    = "V7B8VHQI";
$vnp_HashSecret = "BKOA807PJS2E63RHZNSN8R1K6AWS3FTA";
$vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_ReturnUrl  = "http://localhost/vnpay/return.php";
$startTime      = date("YmdHis");
$expireDate     = date("YmdHis", strtotime("+15 minutes", strtotime($startTime)));
