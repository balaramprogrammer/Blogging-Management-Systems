<!doctype html>
<html lang="en">
  <!-- [Head] start -->

  
<!-- Mirrored from demo.dashboardpack.com/admindek-html/dashboard/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 18:08:41 GMT -->
<head>
    <title>Analytics Dashboard | Admindek Dashboard Template</title>
<!-- [Meta] -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
<meta
  name="description"
  content="Admindek - Modern responsive dashboard template built with Bootstrap 5. Features dark/light themes, RTL support, and extensive UI components for admin panels and web applications."
/>
<meta
  name="keywords"
  content="Admindek - Bootstrap 5 admin template, responsive dashboard, dark mode, RTL support, admin panel, UI components, web application template, modern dashboard"
/>
<meta name="author" content="DashboardPack.com" />
<meta name="theme-color" content="#1e293b" />
<meta name="color-scheme" content="light dark" />

<!-- [Open Graph] -->
<meta property="og:type" content="website" />
<meta property="og:title" content="Analytics Dashboard | Admindek Dashboard Template" />
<meta property="og:description" content="Modern responsive dashboard template built with Bootstrap 5. Features dark/light themes, RTL support, and extensive UI components." />
<meta property="og:site_name" content="Admindek" />

<!-- [Twitter/X Card] -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Analytics Dashboard | Admindek Dashboard Template" />
<meta name="twitter:description" content="Modern responsive dashboard template built with Bootstrap 5. Features dark/light themes, RTL support, and extensive UI components." />

<!-- [Favicon] icons -->
<link rel="icon" href="https://demo.dashboardpack.com/admindek-html/assets/images/favicon.svg" type="image/svg+xml" />
<link rel="apple-touch-icon" href="{{asset('assets/admin/assets/images/apple-touch-icon.png')}}" />
<link rel="manifest" href="https://demo.dashboardpack.com/admindek-html/assets/images/site.webmanifest" />
 <!-- [Font] Family -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&amp;display=swap" rel="stylesheet" />
<!-- [phosphor Icons] https://phosphoricons.com/ -->
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/plugins/phosphor-icons.css')}}" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/plugins/tabler-icons.min.css')}}" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}" id="main-style-link" />
<link rel="stylesheet" href="{{asset('assets/admin/assets/css/style-preset.css')}}" />
<!-- [Vite Development Scripts] -->
<!-- Development script removed for production -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables CORE (LATEST 2.x) -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

<!-- Responsive -->
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.min.js"></script>

<!-- Buttons -->
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.min.js"></script>

<!-- Export Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
@include('admin.layouts.sidebar')
<!-- [ Sidebar Menu ] end -->
 <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ph ph-list"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ph ph-list"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ph ph-magnifying-glass"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3 py-2">
          <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
        </form>
      </div>
    </li>
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ph ph-sun-dim"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
          <i class="ph ph-moon"></i>
          <span>Dark</span>
        </a>
        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
          <i class="ph ph-sun"></i>
          <span>Light</span>
        </a>
        <a href="#!" class="dropdown-item" onclick="layout_change_default()">
          <i class="ph ph-cpu"></i>
          <span>Default</span>
        </a>
      </div>
    </li>
    <li class="dropdown pc-h-item d-none d-md-inline-flex">
      <a
        class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ph ph-translate"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown lng-dropdown">
        <a href="#!" class="dropdown-item" data-lng="en">
          <span>
            English
            <small>(UK)</small>
          </span>
        </a>
        <a href="#!" class="dropdown-item" data-lng="fr">
          <span>
            français
            <small>(French)</small>
          </span>
        </a>
        <a href="#!" class="dropdown-item" data-lng="ro">
          <span>
            Română
            <small>(Romanian)</small>
          </span>
        </a>
        <a href="#!" class="dropdown-item" data-lng="cn">
          <span>
            中国人
            <small>(Chinese)</small>
          </span>s
        </a>
      </div>
    </li>
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ph ph-diamonds-four"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        <a href="#!" class="dropdown-item">
          <i class="ph ph-user"></i>
          <span>My Account</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-gear"></i>
          <span>Settings</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-lifebuoy"></i>
          <span>Support</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-lock-key"></i>
          <span>Lock Screen</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-power"></i>
          <span>Logout</span>
        </a>
      </div>
    </li>
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ph ph-bell"></i>
        <span class="badge bg-success pc-h-badge">5</span>
      </a>
      <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header d-flex align-items-center justify-content-between">
          <h5 class="m-0">Notifications</h5>
          <a href="#!" class="btn btn-link btn-sm">Mark all read</a>
        </div>
        <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
          <p class="text-span">Today</p>
          <div class="card bg-transparent mb-2 border-0">
            <div class="card-body p-3 rounded" style="background: rgba(var(--bs-light-rgb), 0.3); transition: all 0.2s ease;" onmouseover="this.style.background='rgba(var(--bs-primary-rgb), 0.05)'" onmouseout="this.style.background='rgba(var(--bs-light-rgb), 0.3)'">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="ph ph-credit-card text-success" style="font-size: 16px;"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <span class="float-end text-sm text-muted">2 min ago</span>
                  <h5 class="text-body mb-2">Payment Received</h5>
                  <p class="mb-0">$2,499.00 payment received for Pro Plan subscription from Acme Corp</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-transparent mb-2 border-0">
            <div class="card-body p-3 rounded" style="background: rgba(var(--bs-light-rgb), 0.3); transition: all 0.2s ease;" onmouseover="this.style.background='rgba(var(--bs-primary-rgb), 0.05)'" onmouseout="this.style.background='rgba(var(--bs-light-rgb), 0.3)'">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="ph ph-users text-primary" style="font-size: 16px;"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <span class="float-end text-sm text-muted">1 hour ago</span>
                  <h5 class="text-body mb-2">New Team Member</h5>
                  <p class="mb-0">Sarah Johnson joined your workspace and was assigned to the Marketing team</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-transparent mb-2 border-0">
            <div class="card-body p-3 rounded" style="background: rgba(var(--bs-light-rgb), 0.3); transition: all 0.2s ease;" onmouseover="this.style.background='rgba(var(--bs-primary-rgb), 0.05)'" onmouseout="this.style.background='rgba(var(--bs-light-rgb), 0.3)'">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="ph ph-chart-line text-warning" style="font-size: 16px;"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <span class="float-end text-sm text-muted">3 hours ago</span>
                  <h5 class="text-body mb-2">Monthly Report Ready</h5>
                  <p class="mb-0">Your January 2025 analytics report is ready. Revenue up 24% vs last month</p>
                </div>
              </div>
            </div>
          </div>
          <p class="text-span">Yesterday</p>
          <div class="card bg-transparent mb-2 border-0">
            <div class="card-body p-3 rounded" style="background: rgba(var(--bs-light-rgb), 0.3); transition: all 0.2s ease;" onmouseover="this.style.background='rgba(var(--bs-primary-rgb), 0.05)'" onmouseout="this.style.background='rgba(var(--bs-light-rgb), 0.3)'">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="ph ph-shield-check text-danger" style="font-size: 16px;"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <span class="float-end text-sm text-muted">18 hours ago</span>
                  <h5 class="text-body mb-2">Security Alert</h5>
                  <p class="mb-2">New login detected from San Francisco, CA. If this wasn't you, please secure your account</p>
                  <button class="btn btn-sm btn-outline-secondary me-2">Ignore</button>
                  <button class="btn btn-sm btn-danger">Secure Account</button>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-transparent mb-2 border-0">
            <div class="card-body p-3 rounded" style="background: rgba(var(--bs-light-rgb), 0.3); transition: all 0.2s ease;" onmouseover="this.style.background='rgba(var(--bs-primary-rgb), 0.05)'" onmouseout="this.style.background='rgba(var(--bs-light-rgb), 0.3)'">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="ph ph-rocket text-info" style="font-size: 16px;"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3">
                  <span class="float-end text-sm text-muted">1 day ago</span>
                  <h5 class="text-body mb-2">Feature Update</h5>
                  <p class="mb-0">New AI-powered insights are now available in your dashboard. Check out the enhanced analytics</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-transparent mb-2 border-0">
            <div class="card-body p-3 rounded" style="background: rgba(var(--bs-light-rgb), 0.3); transition: all 0.2s ease;" onmouseover="this.style.background='rgba(var(--bs-primary-rgb), 0.05)'" onmouseout="this.style.background='rgba(var(--bs-light-rgb), 0.3)'">
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img class="img-radius avatar rounded-0" src="https://demo.dashboardpack.com/admindek-html/assets/images/user/avatar-5.svg" alt="Generic placeholder image" />
                </div>
                <div class="flex-grow-1 ms-3">
                  <span class="float-end text-sm text-muted">5 hour ago</span>
                  <h5 class="text-body mb-2">Security</h5>
                  <p class="mb-0"
                    >Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type</p
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center py-2">
          <a href="#!" class="link-danger">Clear all Notifications</a>
        </div>
      </div>
    </li>
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
        <i class="ph ph-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <h6 class="mb-0">John Doe</h6>
          <small class="text-muted"><a href="https://demo.dashboardpack.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="177d787f79397378725776747a72747865673974787a">[email&#160;protected]</a></small>
          <span class="badge bg-success-subtle text-success mt-1">Pro Plan</span>
        </div>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-user-circle"></i>
          <span>Profile & Settings</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-buildings"></i>
          <span>Workspace Settings</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-credit-card"></i>
          <span>Billing & Usage</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-users-three"></i>
          <span>Team Management</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-headset"></i>
          <span>Support Center</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-keyboard"></i>
          <span>Keyboard Shortcuts</span>
        </a>
        <a href="#!" class="dropdown-item">
          <i class="ph ph-download"></i>
          <span>Download Mobile App</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{route('logout')}}" class="dropdown-item text-danger">
          <i class="ph ph-sign-out"></i>
          <span>Sign Out</span>
        </a>
      </div>
    </li>
  </ul>
</div>
 </div>
</header>
<!-- [ Header ] end -->
