<div id="topbar">
    <button class="topbar-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    <div class="topbar-search position-relative d-none d-md-block">
      <span class="search-icon"><i class="fas fa-search"></i></span>
      <input type="text" class="form-control" placeholder="Search anything...">
    </div>
    <div class="topbar-actions">
      <a href="#" class="topbar-btn" data-bs-toggle="tooltip" title="Notifications">
        <i class="fas fa-bell"></i>
        <span class="notif-dot"></span>
      </a>
      <a href="#" class="topbar-btn" data-bs-toggle="tooltip" title="Messages">
        <i class="fas fa-envelope"></i>
      </a>
      <div class="dropdown">
        <div class="d-flex align-items-center gap-2 cursor-pointer" data-bs-toggle="dropdown" style="cursor:pointer">
          <div style="width:38px;height:38px;background:linear-gradient(135deg,#4f8eff,#8b5cf6);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:15px;">A</div>
          <div class="topbar-user-info d-none d-lg-block">
            <div class="topbar-user-name">Admin User</div>
            <div class="topbar-user-role">Super Admin</div>
          </div>
        </div>
        <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm border-0" style="border-radius:12px;min-width:180px;">
          <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user me-2 text-muted" style="width:16px"></i>Profile</a></li>
          <li><a class="dropdown-item py-2" href="settings.php"><i class="fas fa-cog me-2 text-muted" style="width:16px"></i>Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item py-2 text-danger" href="#"><i class="fas fa-sign-out-alt me-2" style="width:16px"></i>Logout</a></li>
        </ul>
      </div>
    </div>
  </div>