<?php
require_once ('config.php');

if (!isset($_GET['vnp_SecureHash']))
{
    exit();
}

$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData      = array();
foreach ($_GET as $key => $value)
{
    if (substr($key, 0, 4) == 'vnp_')
    {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$hashData = '';
foreach ($inputData as $key => $value)
{
    $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
}

$hashData = rtrim($hashData, '&');
$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

if ($secureHash == $vnp_SecureHash)
{
    if ($_GET['vnp_ResponseCode'] == '00')
    {
        $orderId = $_GET['vnp_TxnRef'];
        $sql = "UPDATE orders SET status = 2 WHERE id = '{$orderId}'";
        $status = mysqli_query($connect, $sql);
        if ($status)
        {
            header('Location: /thank.php');
            die();
        }
        else
        {
            $errCode = 100;
        }
    }
}

$errCode = isset($_GET['vnp_ResponseCode']) ? $_GET['vnp_ResponseCode'] : 99;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đang chuyển hướng...</title>
    <script>setTimeout(function() { window.location.href = '/index.php';}, 3000);</script>
</head>
<body>
    <p>Thanh toán không thành công. Tự động chuyển hướng sau 3 giây...</p>
    <p>Mã lỗi: <?= $errCode; ?></p>
</body>
</html>
