    <div class="admin-footer text-center py-3">
  © <span id="year"></span> All Rights Reserved. Developed by 
  <a href="https://drafticode.com/" target="_blank" class="drafti-link">
    Drafticode
  </a>
</div>

  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0">
          <h5 class="modal-title text-danger"><i class="fas fa-trash-alt me-2"></i>Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body text-center py-4">
          <div style="width:64px;height:64px;background:rgba(239,68,68,0.1);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:28px;color:#ef4444;">
            <i class="fas fa-exclamation-triangle"></i>
          </div>
          <p style="font-size:15px;font-weight:600;margin-bottom:8px;">Are you sure?</p>
          <p style="font-size:13.5px;color:var(--text-secondary);">You are about to delete <strong id="deleteItemName">this item</strong>. This action cannot be undone.</p>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="showToast('Item deleted successfully','danger');bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide()">
            <i class="fas fa-trash me-1"></i>Delete
          </button>
        </div>
      </div>
    </div>
  </div>

<style>
.drafti-link{
    color:#0d6efd;
    font-weight:600;
    text-decoration:none;
    transition:0.3s;
}

.drafti-link:hover{
    color:#0a58ca;
    text-decoration:underline;
}
</style>

<script>
document.getElementById("year").textContent = new Date().getFullYear();
</script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/admin.js"></script>
  <script>handleFormSubmit('mainForm', 'Saved successfully!');</script>
</body>
</html>