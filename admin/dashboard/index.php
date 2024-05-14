<?php 
    include '../layouts/header.php';
    $revenueEachDay = @getRevenueEachDay($connect);
    $revenueEachMonth = @getRevenueEachMonth($connect);
    $ordersDonut = @getOrdersDonut($connect);
    $date = date('d/m/Y');
    $month = date('m');
    $year = date('Y');
    if (isset($_GET['filter-day'])) {
        $filter_date = $_GET['date'];
        $revenueEachDay = @getRevenueByDate($connect, $filter_date);
        $date = date("d/m/Y", strtotime($filter_date));
    } elseif (isset($_GET['filter-month-year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
        $revenueEachMonth = @getRevenueByMonthYear($connect, $month, $year);
    }
?>
<h1 class="h3 mb-2 text-gray-800">Thống kê</h1>
<!-- Content Row -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Doanh thu hôm nay</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= number_format(@getRevenueToday($connect)['total'] ?? 0,-3,',','.') ?> VND</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Doanh thu tuần này</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= number_format(@getRevenueCurrentWeek($connect)['total'] ?? 0,-3,',','.') ?> VND</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Doanh thu tháng <?= date('n') ?></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= number_format(@getRevenueCurrentMonth($connect)['total'] ?? 0,-3,',','.') ?> VND</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Doanh thu năm <?= date('Y') ?></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= number_format(@getRevenueCurrentYear($connect)['total'] ?? 0,-3,',','.') ?> VND</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Số lượng người dùng</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= @getCountUser($connect)['count_user'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Tổng đơn hàng</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= @getTotalOrder($connect)['count_order'] ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-receipt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thống kê 10 sản phẩm bán nhiều nhất ngày <?= $date ?></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form class="form-inline" action="" method="GET">
                    <label for="date" class="mr-sm-2">Ngày:</label>
                    <input type="date" class="form-control mb-2 mr-sm-2" name="date" id="date" required>
                    <button type="submit" name="filter-day" class="btn btn-primary mb-2">Lọc</button>
                </form>
                <canvas id="revenueDayChart"></canvas>
            </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thống kê 10 sản phẩm bán nhiều nhất tháng <?= $month ?>/<?= $year ?></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form class="form-inline" action="" method="GET">
                    <label for="month" class="mr-sm-2">Tháng:</label>
                    <select class="form-control mr-2" name="month" id="month" required>
                        <option value="">Chọn tháng</option>
                        <?php for ($i = 1;$i <= 12;$i++): ?>
                            <option value="<?= $i ?>">Tháng <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <label for="month" class="mr-sm-2">Năm:</label>
                    <select class="form-control mr-2" name="year" id="year" required>
                        <option value="">Chọn năm</option>
                        <?php $currentYear = date('Y'); for ($i = $currentYear - 3;$i <= $currentYear + 3;$i++): ?>
                            <option value="<?= $i ?>">Năm <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <button type="submit" name="filter-month-year" class="btn btn-primary">Lọc</button>
                </form>
                <canvas id="revenueMonthChart"></canvas>
            </div>
        </div>
    </div>
    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thống kê đơn hàng</h6>
            </div>
            <div class="card-body">
                <canvas id="ordersChart"></canvas>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="dataEachDay" value='<?= $revenueEachDay ?>' />
<input type="hidden" id="dataEachMonth" value='<?= $revenueEachMonth ?>' />
<input type="hidden" id="dataOrders" value='<?= $ordersDonut ?>' />
<!-- /.container-fluid -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    function parseJsonData(data) {
        const dataArray = Object.entries(data);

        dataArray.sort((a, b) => {
            if (parseInt(a[1].count) !== parseInt(b[1].count)) {
                return parseInt(b[1].count) - parseInt(a[1].count);
            } else {
                return b[1].total - a[1].total;
            }
        });

        const top10Items = dataArray.slice(0, 10);

        const labels = [];
        const values = [];
        const qty = [];

        top10Items.forEach(item => {
            labels.push(item[1].name);
            values.push(item[1].total);
            qty.push(parseInt(item[1].count));
        });
        return [labels, values, qty];
    }

    let jsonData1 = JSON.parse(document.getElementById("dataEachDay").value);
    let jsonData2 = JSON.parse(document.getElementById("dataEachMonth").value);
    let jsonData3 = JSON.parse(document.getElementById("dataOrders").value);

    let dataEachDay = parseJsonData(jsonData1);
    let dataEachMonth = parseJsonData(jsonData2);

    let configDay = {
        type: 'bar',
        data: {
            labels: dataEachDay[0],
            datasets: [{
                label: 'Doanh thu theo ngày',
                data: dataEachDay[1],
                borderWidth: 1,
                yAxisID: 'y',
                order: 1,
            },
            {
                label: 'Số lượng bán ra',
                data: dataEachDay[2],
                type: 'line',
                yAxisID: 'y1',
                order: 0,
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Doanh thu',
                    },
                },
                y1: {
                    beginAtZero: true,
                    type: 'linear',
                    display: true,
                    position: 'right',
                    grid: {
                        drawOnChartArea: false,
                    },
                    title: {
                        display: true,
                        text: 'Số lượng',
                    },
                },
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: (item) => {
                            if (item.datasetIndex === 0) {
                                return `Doanh thu: ${item.formattedValue} VND`;
                            } else if (item.datasetIndex === 1) {
                                return `Số lượng: ${item.formattedValue}`;
                            }
                            return item.formattedValue;
                        },
                    },
                },
            },
        },
    }

    var configMonth = {
        type: 'bar',
        data: {
            labels: dataEachMonth[0],
            datasets: [{
                label: 'Doanh thu theo tháng',
                data: dataEachMonth[1],
                borderWidth: 1,
                yAxisID: 'y',
                order: 1,
            },
            {
                label: 'Số lượng bán ra',
                data: dataEachMonth[2],
                type: 'line',
                yAxisID: 'y1',
                order: 0,
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Doanh thu',
                    },
                },
                y1: {
                    beginAtZero: true,
                    type: 'linear',
                    display: true,
                    position: 'right',
                    grid: {
                        drawOnChartArea: false,
                    },
                    title: {
                        display: true,
                        text: 'Số lượng',
                    },
                },
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: (item) => {
                            if (item.datasetIndex === 0) {
                                return `Doanh thu: ${item.formattedValue} VND`;
                            } else if (item.datasetIndex === 1) {
                                return `Số lượng: ${item.formattedValue}`;
                            }
                            return item.formattedValue;
                        },
                    },
                },
            },
        },
    }

    const datasetOrders = {
        labels: ['Chờ xác nhận', 'Chưa thanh toán', 'Đã thanh toán', 'Đã xác nhận', 'Đang giao hàng', 'Hoàn thành', 'Đã hủy'],
        datasets: [{
            data: jsonData3,
            backgroundColor: ['#f6c23e', '#858796', '#36b9cc', '#5a5c69', '#4e73df', '#1cc88a', '#e74a3b'],
        }]
    };

    const configOrders = {
        type: 'doughnut',
        data: datasetOrders,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Đơn hàng'
                },
                tooltip: {
                    callbacks: {
                        label: (item) => ` ${item.formattedValue} đơn hàng`,
                    },
                },
            },
        },
    };

    const ctxDay = document.getElementById('revenueDayChart');
    new Chart(ctxDay, configDay);
    const ctxMonth = document.getElementById('revenueMonthChart');
    new Chart(ctxMonth, configMonth);
    const ctxOrders = document.getElementById('ordersChart');
    new Chart(ctxOrders, configOrders);
</script>
<?php include '../layouts/footer.php'; ?>