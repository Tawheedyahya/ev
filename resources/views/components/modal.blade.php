<style>
  /* Custom blur effect for modal backdrop */
  .modal-backdrop.show {
    backdrop-filter: blur(6px);
    background-color: rgba(0, 0, 0, 0.4);
  }

  /* Position modal 20% from top instead of center */
  .modal-dialog.top-20 {
    margin-top: 20vh;   /* 20% of viewport height */
    margin-bottom: auto;
  }

  .badge-gradient-danger {
    background: linear-gradient(45deg, #dc3545, #ff6b6b);
    color: #fff;
    cursor: pointer;
  }
</style>

<!-- Trigger -->
<!-- <span class="badge badge-gradient-danger me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">✗</span> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog top-20">
    <div class="modal-content rounded-4 shadow-lg">
      <div class="modal-header border-0">
        <h5 class="modal-title">@yield('modal_title')</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @yield('modal_body')
      </div>
      <div class="modal-footer border-0">
        @yield('modal_footer')
      </div>
    </div>
  </div>
</div>
