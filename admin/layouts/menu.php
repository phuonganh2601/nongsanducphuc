<?php
    $curFolder = basename(getCurrentFolderUrl());
?>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= $curFolder === 'dashboard' ? 'active' : '' ?>">
    <a class="nav-link" href="../dashboard/index.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Thống kê</span>
    </a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= $curFolder === 'categories' ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
        aria-controls="collapseOne">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý danh mục</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../categories/list.php">Danh sách</a>
            <a class="collapse-item" href="../categories/add.php">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= $curFolder === 'products' ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý sản phẩm</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../products/list.php">Danh sách</a>
            <a class="collapse-item" href="../products/add.php">Thêm mới</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= $curFolder === 'users' ? 'active' : '' ?>">
    <a class="nav-link" href="../users/index.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý tài khoản</span>
    </a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= $curFolder === 'orders' ? 'active' : '' ?>">
    <a class="nav-link" href="../orders/index.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Quản lý đơn hàng</span>
    </a>
</li>
