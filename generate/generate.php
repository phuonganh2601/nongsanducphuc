<?php
include '../inc/connect.php';
include '../helpers/helper.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

function convertToNonUnicode($str)
{
    $unicode = array(
        'a' => array('á', 'à', 'ạ', 'ả', 'ã', 'â', 'ấ', 'ầ', 'ậ', 'ẩ', 'ẫ', 'ă', 'ắ', 'ằ', 'ặ', 'ẳ', 'ẵ'),
        'A' => array('Á', 'À', 'Ạ', 'Ả', 'Ã', 'Â', 'Ấ', 'Ầ', 'Ậ', 'Ẩ', 'Ẫ', 'Ă', 'Ắ', 'Ằ', 'Ặ', 'Ẳ', 'Ẵ'),
        'e' => array('é', 'è', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ế', 'ề', 'ệ', 'ể', 'ễ'),
        'E' => array('É', 'È', 'Ẹ', 'Ẻ', 'Ẽ', 'Ê', 'Ế', 'Ề', 'Ệ', 'Ể', 'Ễ'),
        'i' => array('í', 'ì', 'ị', 'ỉ', 'ĩ'),
        'I' => array('Í', 'Ì', 'Ị', 'Ỉ', 'Ĩ'),
        'o' => array('ó', 'ò', 'ọ', 'ỏ', 'õ', 'ô', 'ố', 'ồ', 'ộ', 'ổ', 'ỗ', 'ơ', 'ớ', 'ờ', 'ợ', 'ở', 'ỡ'),
        'O' => array('Ó', 'Ò', 'Ọ', 'Ỏ', 'Õ', 'Ô', 'Ố', 'Ồ', 'Ộ', 'Ổ', 'Ỗ', 'Ơ', 'Ớ', 'Ờ', 'Ợ', 'Ở', 'Ỡ'),
        'u' => array('ú', 'ù', 'ụ', 'ủ', 'ũ', 'ư', 'ứ', 'ừ', 'ự', 'ử', 'ữ'),
        'U' => array('Ú', 'Ù', 'Ụ', 'Ủ', 'Ũ', 'Ư', 'Ứ', 'Ừ', 'Ự', 'Ử', 'Ữ'),
        'y' => array('ý', 'ỳ', 'ỵ', 'ỷ', 'ỹ'),
        'Y' => array('Ý', 'Ỳ', 'Ỵ', 'Ỷ', 'Ỹ'),
        'd' => array('đ'),
        'D' => array('Đ'),
    );

    foreach ($unicode as $nonUnicode => $unicodeChars)
    {
        $str = str_replace($unicodeChars, $nonUnicode, $str);
    }

    return $str;
}

function generateRandomEmail($name)
{
    $emailProviders   = ['gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com'];
    $randomProvider   = $emailProviders[array_rand($emailProviders)];
    $nonUnicodeString = convertToNonUnicode($name);
    $nameParts        = explode(' ', $nonUnicodeString);
    $randomNumber     = mt_rand(100, 999);
    $email            = strtolower($nameParts[0] . '.' . $nameParts[count($nameParts) - 1] . $randomNumber . '@' . $randomProvider);
    return $email;
}

function generateRandomPhone()
{
    $prefixes     = ['086', '096', '097', '098', '091', '094', '088', '089', '090', '093'];
    $randomPrefix = $prefixes[array_rand($prefixes)];
    $randomNumber = mt_rand(1000000, 9999999);
    $phone        = $randomPrefix . $randomNumber;
    return $phone;
}

function generateRandomAddress()
{
    $streets      = ['Đường Hoàng Diệu', 'Đường Lê Lợi', 'Đường Nguyễn Huệ', 'Đường Bà Triệu', 'Đường Lý Tự Trọng'];
    $cities       = ['Hà Nội', 'Hồ Chí Minh', 'Đà Nẵng', 'Hải Phòng', 'Cần Thơ'];
    $randomStreet = $streets[array_rand($streets)];
    $randomCity   = $cities[array_rand($cities)];
    $address      = $randomStreet . ' - ' . $randomCity;
    return $address;
}

function generateRandomBirthday()
{
    $start           = strtotime('1985-01-01');
    $end             = strtotime('2005-01-01');
    $randomTimestamp = mt_rand($start, $end);
    $birthday        = date('Y-m-d', $randomTimestamp);
    return $birthday;
}

function generateRandomName($gender)
{
    $lastNames        = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Huỳnh', 'Võ', 'Đặng', 'Bùi', 'Đỗ'];
    $firstNamesMale   = ['Thành', 'Quang', 'Minh', 'Đức', 'Duy', 'Hải', 'Tùng', 'Tuấn', 'Long', 'Hùng'];
    $firstNamesFemale = ['Phượng', 'Hồng', 'Kim', 'Loan', 'Mai', 'Anh', 'Linh', 'Phương', 'Thu', 'Hằng'];
    $lastName         = $lastNames[array_rand($lastNames)];
    if ($gender == 1)
    {
        $firstName = $firstNamesFemale[array_rand($firstNamesFemale)];
    }
    else
    {
        $firstName = $firstNamesMale[array_rand($firstNamesMale)];
    }

    $fullName = $lastName . ' ' . $firstName;
    return $fullName;
}

function getRandomStatus()
{
    $numbers = array_merge(
        array_fill(0, 5, 0),
        array_fill(0, 4, 1),
        array_fill(0, 6, 2),
        array_fill(0, 7, 3),
        array_fill(0, 8, 4),
        array_fill(0, 10, 5),
        array_fill(0, 1, 6),
    );

    $randomKey   = array_rand($numbers);
    $randomValue = $numbers[$randomKey];
    return $randomValue;
}

function getRandomItem($array)
{
    return $array[array_rand($array)];
}

function getRandomNumberString($length)
{
    $numbers      = '0123456789';
    $numberString = '';
    for ($i = 0; $i < $length; $i++)
    {
        $numberString .= $numbers[rand(0, strlen($numbers) - 1)];
    }
    return $numberString;
}

function getRandomCreatedAt()
{
    $currentTimestamp  = time();
    $earliestTimestamp = strtotime('-1 month');
    $randomTimestamp   = mt_rand($earliestTimestamp, $currentTimestamp);

    $randomDate = date('Y-m-d H:i:s', $randomTimestamp);
    return $randomDate;
}

function getRandomUpdatedAt($updatedAt)
{
    $randomMinutes = mt_rand(30, 3600);
    $newTime       = strtotime("+" . $randomMinutes . " minutes", strtotime($updatedAt));
    $updatedAt     = date('Y-m-d H:i:s', $newTime);
    return $updatedAt;
}

function getRandomShippingCode($status)
{
    $carriers = ['GHN', 'SPX', 'VTP', 'NJV'];
    if ($status == 4 || $status == 5)
    {
        return $carriers[array_rand($carriers)] . getRandomNumberString(9);
    }
    return null;
}

if (isset($_GET['cmd']))
{
    if ($_GET['cmd'] == 'user')
    {
        $randomUser = rand(5, 20);
        $countUser  = 0;
        $userInfo   = "";
        for ($i = 0; $i < $randomUser; $i++)
        {
            $gender   = mt_rand(0, 1);
            $name     = generateRandomName($gender);
            $password = password_hash('123456', PASSWORD_BCRYPT);
            $email    = generateRandomEmail($name);
            $phone    = generateRandomPhone();
            $address  = generateRandomAddress();
            $birthday = generateRandomBirthday();

            if (checkExistEmail($connect, $email)) continue;

            $userInsert = "INSERT INTO users(name, email, password, gender, birthday, phone, address) VALUES ('{$name}', '{$email}', '{$password}', {$gender}, '{$birthday}', '{$phone}', '{$address}');";
            if ($connect->query($userInsert) === TRUE)
            {
                $userInfo .= "- Họ và tên: " . $name . "\n";
                $userInfo .= "- Email: " . $email . "\n";
                $userInfo .= "- Mật khẩu: 123456\n";
                $userInfo .= "- Số điện thoại: " . $phone . "\n";
                $userInfo .= "- Địa chỉ: " . $address . "\n";
                $userInfo .= "- Sinh nhật: " . date('d/m/Y', strtotime($birthday)) . "\n\n";
                $countUser++;
            }
        }
        echo "Đã tạo " . $countUser . " người dùng.\n\n";
        echo $userInfo;
        exit();
    }
    if ($_GET['cmd'] == 'truncate_user')
    {
        $result = $connect->query("SELECT COUNT(*) AS count FROM users");
        $row    = $result->fetch_assoc();

        $userTruncate = "TRUNCATE users;";
        $userDemo     = "INSERT INTO users (name, password, email, phone, address, gender, birthday, status) VALUES
        ('Phương Anh', '$2y$10\$Lnfs58/bfDRYtRr/7cf6.OJWOiWWGullrlnALA8oS6qbxOf42eK16', 'phuonganh.sdv@gmail.com', '0392342795', 'Đông Anh - Hà Nội', 1, '2020-01-26', 1),
        ('Lưu Văn Vũ', '$2y$10\$jw4afM28h90z0NayP7ypt.yG4qZtbyJF35Ya1mQnGgWkd7N6eZG6S', 'vukakaqwe3@gmail.com', '0344296287', 'Uy Nỗ - Đông Anh- Hà Nội', 0, '1995-12-13', 1),
        ('Hoài Thương', '$2y$10\$GGcQzlTtYcJCd/qPvgBEVumrwqtp1XJiSeJnQ/ZKwSevJF4ggneku', 'hoaithuong.sdv@gmail.com', '0336511728', 'Đông Anh - Hà Nội', 1, '1995-10-04', 1);";

        $connect->query("SET FOREIGN_KEY_CHECKS = 0");
        if ($connect->query($userTruncate) === TRUE)
        {
            $connect->query($userDemo);
            echo "Đã xóa " . $row['count'] - 3 . " người dùng.";
        }
        else
        {
            echo "Xóa người dùng không thành công. Lỗi: " . $connect->error;
        }
        $connect->query("SET FOREIGN_KEY_CHECKS = 1");
        exit();
    }
    if ($_GET['cmd'] == 'order')
    {
        $products      = [];
        $productResult = $connect->query("SELECT id, price FROM products");
        if ($productResult->num_rows > 0)
        {
            while ($row = $productResult->fetch_assoc())
            {
                $products[] = $row;
            }
        }

        $users      = [];
        $userResult = $connect->query("SELECT * FROM users");
        if ($userResult->num_rows > 0)
        {
            while ($row = $userResult->fetch_assoc())
            {
                $users[] = $row;
            }
        }
        $randomOrder = rand(10, 100);
        $countOrder  = 0;
        $orderInfo   = "";
        for ($i = 0; $i < $randomOrder; $i++)
        {
            $orderId = getRandomNumberString(6);
            if (checkExistOrderId($connect, $orderId)) continue;
            $total        = 0;
            $createdAt    = getRandomCreatedAt();
            $updatedAt    = getRandomUpdatedAt($createdAt);
            $status       = getRandomStatus();
            $shippingCode = getRandomShippingCode($status);
            $user         = getRandomItem($users);
            $userId       = $user['id'];
            $name         = $user['name'];
            $address      = $user['address'];
            $tel          = $user['phone'];
            $type         = rand(0, 2);
            if ($status == 1 || $status == 2)
            {
                $type = 2;
            }

            $randomProduct      = rand(1, 10);
            $productArray       = [];
            $orderDetailsInsert = "INSERT INTO order_details (order_id, product_id, price, qty) VALUES";
            for ($j = 0; $j < $randomProduct; $j++)
            {
                $product   = getRandomItem($products);
                $productId = $product['id'];
                if (in_array($productId, $productArray)) continue;
                $productArray[]     = $productId;
                $productPrice       = $product['price'];
                $qty                = rand(1, 8);
                $orderDetailsInsert .= " ('$orderId', '$productId', '$productPrice', '$qty'),";
                $total += $productPrice * $qty;
            }


            $orderDetailsInsert = rtrim($orderDetailsInsert, ",");
            $orderInsert        = "INSERT INTO orders (id, total, created_at, updated_at, status, shipping_code, address, name, tel, user_id, type) VALUES ('$orderId', '$total', '$createdAt', '$updatedAt', '$status', '$shippingCode', '$address', '$name', '$tel', '$userId', '$type');";
            if ($connect->query($orderInsert) === TRUE)
            {
                $orderInfo .= "- Mã đơn hàng: " . $orderId . "\n";
                $orderInfo .= "- Họ và tên: " . $name . "\n";
                $orderInfo .= "- Số điện thoại: " . $tel . "\n";
                $orderInfo .= "- Địa chỉ: " . $address . "\n";
                $orderInfo .= "- Ngày đặt hàng: " . date('d/m/Y H:i:s', strtotime($createdAt)) . "\n";
                $orderInfo .= "- Tổng tiền: " . number_format($total, -3, ',', '.') . " VND\n";
                $orderInfo .= "- Trạng thái: " . statusType($status) . "\n\n";
                $countOrder++;
                $connect->query($orderDetailsInsert);
            }
        }
        echo "Đã tạo " . $countOrder . " đơn hàng.\n\n";
        echo $orderInfo;
        exit();
    }
    if ($_GET['cmd'] == 'truncate_order')
    {
        $result = $connect->query("SELECT COUNT(*) AS count FROM orders");
        $row    = $result->fetch_assoc();

        $orderTruncate        = "TRUNCATE orders;";
        $orderDetailsTruncate = "TRUNCATE order_details;";
        $connect->query("SET FOREIGN_KEY_CHECKS = 0");
        if ($connect->query($orderTruncate) === TRUE)
        {
            $connect->query($orderDetailsTruncate);
            echo "Đã xóa " . $row['count'] . " đơn hàng.";
        }
        else
        {
            echo "Xóa đơn hàng không thành công. Lỗi: " . $connect->error;
        }
        $connect->query("SET FOREIGN_KEY_CHECKS = 1");
        exit();
    }
}
