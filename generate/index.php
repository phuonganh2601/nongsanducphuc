<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo dữ liệu ngẫu nhiên</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Tạo dữ liệu ngẫu nhiên</h2>
        <div class="form-group mt-4 text-center">
            <button type="button" class="btn btn-primary" onclick="generateData('user')">Tạo người dùng</button>
            <button type="button" class="btn btn-danger" onclick="generateData('truncate_user')">Xóa người dùng</button>
            <button type="button" class="btn btn-primary" onclick="generateData('order')">Tạo đơn hàng</button>
            <button type="button" class="btn btn-danger" onclick="generateData('truncate_order')">Xóa đơn hàng</button>
        </div>
        <div class="form-group mt-4">
            <label for="resultData">Kết quả:</label>
            <textarea id="resultData" class="form-control" rows="10" readonly></textarea>
        </div>
    </div>

    <script>
        function generateData(cmd) {
            let url = 'generate.php?cmd=' + cmd;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    resultData.value = data;
                })
                .catch(error => {
                    resultData.value = 'Đã xảy ra lỗi: ' + error;
                });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>