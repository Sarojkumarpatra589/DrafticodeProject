// Admin Dashboard JS

document.addEventListener('DOMContentLoaded', function () {

  // Sidebar toggle
  const toggleBtn = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');

  if (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
      if (window.innerWidth <= 992) {
        sidebar.classList.toggle('show');
        overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
      } else {
        document.body.classList.toggle('sidebar-collapsed');
      }
    });
  }

  if (overlay) {
    overlay.addEventListener('click', function () {
      sidebar.classList.remove('show');
      overlay.style.display = 'none';
    });
  }

  // Image upload preview
  document.querySelectorAll('.img-upload-input').forEach(function (input) {
    input.addEventListener('change', function () {
      const previewWrap = this.closest('.img-upload-box').nextElementSibling;
      if (previewWrap && previewWrap.classList.contains('img-preview-wrap')) {
        const img = previewWrap.querySelector('img');
        if (this.files && this.files[0]) {
          const reader = new FileReader();
          reader.onload = function (e) {
            img.src = e.target.result;
            previewWrap.style.display = 'block';
          };
          reader.readAsDataURL(this.files[0]);
        }
      }
    });
  });

  // Delete modal confirm
  const deleteModal = document.getElementById('deleteModal');
  if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (e) {
      const btn = e.relatedTarget;
      const name = btn ? btn.getAttribute('data-name') || 'this item' : 'this item';
      const confirmMsg = deleteModal.querySelector('#deleteItemName');
      if (confirmMsg) confirmMsg.textContent = name;
    });
  }

  // Active nav link
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
    const href = link.getAttribute('href');
    if (href && href === currentPage) {
      link.classList.add('active');
      // Expand parent collapse
      const parentCollapse = link.closest('.collapse');
      if (parentCollapse) {
        parentCollapse.classList.add('show');
        const toggler = document.querySelector(`[data-bs-target="#${parentCollapse.id}"]`);
        if (toggler) toggler.setAttribute('aria-expanded', 'true');
      }
    }
  });

  // Dismiss alerts
  document.querySelectorAll('.alert-dismissible .btn-close').forEach(btn => {
    btn.addEventListener('click', function () {
      this.closest('.alert').remove();
    });
  });

  // Tooltip init
  const tooltipEls = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  tooltipEls.forEach(el => new bootstrap.Tooltip(el));

  // Animate stat cards
  document.querySelectorAll('.stat-value[data-count]').forEach(el => {
    const target = parseInt(el.getAttribute('data-count'));
    let current = 0;
    const step = Math.ceil(target / 60);
    const timer = setInterval(() => {
      current = Math.min(current + step, target);
      el.textContent = current.toLocaleString();
      if (current >= target) clearInterval(timer);
    }, 16);
  });

});

// Show toast notification
function showToast(message, type = 'success') {
  const container = document.getElementById('toastContainer') || createToastContainer();
  const id = 'toast-' + Date.now();
  const icons = { success: 'fa-check-circle', danger: 'fa-exclamation-circle', warning: 'fa-exclamation-triangle', info: 'fa-info-circle' };
  const colors = { success: '#10b981', danger: '#ef4444', warning: '#f59e0b', info: '#4f8eff' };
  
  const toastEl = document.createElement('div');
  toastEl.id = id;
  toastEl.className = 'toast align-items-center border-0 text-white';
  toastEl.style.cssText = `background: ${colors[type] || colors.info}; border-radius: 10px; min-width: 260px;`;
  toastEl.setAttribute('role', 'alert');
  toastEl.innerHTML = `
    <div class="d-flex align-items-center p-2 px-3 gap-2">
      <i class="fas ${icons[type] || icons.info}"></i>
      <div class="me-auto" style="font-size:13.5px; font-weight:500;">${message}</div>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
    </div>`;
  container.appendChild(toastEl);
  const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
  toast.show();
  toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
}

function createToastContainer() {
  const div = document.createElement('div');
  div.id = 'toastContainer';
  div.style.cssText = 'position:fixed; bottom:20px; right:20px; z-index:9999; display:flex; flex-direction:column; gap:8px;';
  document.body.appendChild(div);
  return div;
}

// Form submit handler
function handleFormSubmit(formId, successMsg) {
  const form = document.getElementById(formId);
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const btn = form.querySelector('[type="submit"]');
      const orig = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
      setTimeout(() => {
        btn.disabled = false;
        btn.innerHTML = orig;
        showToast(successMsg || 'Saved successfully!', 'success');
      }, 1200);
    });
  }
}
