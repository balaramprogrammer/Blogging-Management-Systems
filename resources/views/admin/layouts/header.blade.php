<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>E-commerce Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    overflow-x: hidden;
    background: #f8f9fa;
}

/* ================= TOP NAVBAR ================= */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 60px;
    z-index: 1030;
}
/* ================= SIDEBAR ================= */
#sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    width: 250px;
    height: calc(100vh - 60px);
    background: #212529;
    overflow-y: auto;
    transition: all 0.3s ease;
    z-index: 1020;
}

/* ===== DESKTOP COLLAPSE ===== */
@media (min-width: 992px) {
    #sidebar.collapsed {
        width: 0;
        padding: 0;
        overflow: hidden;
    }
}

/* ===== MOBILE SLIDE ===== */
@media (max-width: 991px) {
    #sidebar {
        left: -250px;
    }
    #sidebar.show {
        left: 0;
    }
}

/* ================= OVERLAY ================= */
#overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1015;
}
#overlay.show {
    display: block;
}
.main-content {
    margin-top: 60px;
    margin-left: 250px;
    padding: 20px;
    transition: margin-left 0.3s ease;
}

/* DESKTOP WHEN SIDEBAR COLLAPSED */
@media (min-width: 992px) {
    .main-content.full {
        margin-left: 0;
    }
}


/* MOBILE */
@media (max-width: 991px) {
    .main-content {
        margin-left: 0;
    }
}

</style>
</head>

<body>

<!-- TOP NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-3 shadow-sm">
    <button class="btn btn-outline-light" id="toggleBtn">
        <i class="bi bi-list"></i>
    </button>

    <span class="fw-semibold text-white ms-2">
        <i class="bi bi-speedometer2 me-1"></i> Dashboard
    </span>

    <div class="ms-auto d-flex align-items-center gap-3">
        <i class="bi bi-bell text-white fs-5"></i>
        <i class="bi bi-person-circle text-white fs-4"></i>
    </div>
</nav>

<!-- SIDEBAR -->
<div id="sidebar">
    <ul class="nav flex-column px-2 mt-3">

        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.add_product') }}">
                <i class="bi bi-box-seam me-2"></i> Products
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-cart-check me-2"></i> Orders
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-people me-2"></i> Customers
            </a>
        </li>

        <li class="nav-item mt-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </li>

    </ul>
</div>


<div id="overlay"></div>
