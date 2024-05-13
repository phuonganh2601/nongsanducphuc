<?php
require_once ('config.php');

if (!isset($_GET['order']))
{
    exit();
}

$order        = getOrderById($connect, $_GET['order']);
$vnp_TxnRef   = $_GET['order'];
$vnp_Amount   = $order['total'];
$vnp_Locale   = 'vn';
$vnp_BankCode = '';
$vnp_IpAddr   = $_SERVER['REMOTE_ADDR'];

$inputData = array(
    'vnp_Version'    => '2.1.0',
    'vnp_TmnCode'    => $vnp_TmnCode,
    'vnp_Amount'     => $vnp_Amount * 100,
    'vnp_Command'    => 'pay',
    'vnp_CreateDate' => date('YmdHis'),
    'vnp_CurrCode'   => 'VND',
    'vnp_IpAddr'     => $vnp_IpAddr,
    'vnp_Locale'     => $vnp_Locale,
    'vnp_OrderInfo'  => 'THANHTOAN ' . $vnp_TxnRef,
    'vnp_OrderType'  => 'billpayment',
    'vnp_ReturnUrl'  => $vnp_ReturnUrl,
    'vnp_TxnRef'     => $vnp_TxnRef,
    'vnp_ExpireDate' => $expireDate,
);

if (isset($vnp_BankCode) && $vnp_BankCode != '')
{
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$hashData = '';
foreach ($inputData as $key => $value)
{
    $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
}
$hashData = rtrim($hashData, '&');

$vnp_Url = $vnp_Url . '?' . $hashData;
if (isset($vnp_HashSecret))
{
    $vnpSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
}

header('Location: ' . $vnp_Url);
die();
