<!-- Flatpickr core + theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Modal -->
<div class="modal fade custom-modal" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
  <!-- Fullscreen below "sm" -->
  <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down modal-sm">
    <div class="modal-content shadow-2xl rounded-4">
      <div class="modal-header border-0 gradient-header text-white rounded-top-4 px-4 py-3">
        <h5 class="modal-title d-flex align-items-center gap-2" id="eventModalLabel">
          Add Event Dates
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{route('venue.book',$venue['id'])}}" method="POST" class="px-3 px-md-4 pb-4">
        @csrf
        <div class="modal-body pt-4">
          <!-- Start Date & Time -->
          <div class="mb-3">
            <label for="starts_at" class="form-label fw-semibold">Start Date & Time</label>
            <div class="input-group">
              <input type="text" name="starts_at" id="starts_at" class="form-control fancy-input" placeholder="Select start" required>
              <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
            </div>
          </div>

          <!-- End Date & Time -->
          <div class="mb-3">
            <label for="ends_at" class="form-label fw-semibold">End Date & Time</label>
            <div class="input-group">
              <input type="text" name="ends_at" id="ends_at" class="form-control fancy-input" placeholder="Select end" required>
              <span class="input-group-text"><i class="bi bi-clock"></i></span>
            </div>
          </div>
        </div>

        <div class="modal-footer border-0 d-flex gap-2">
          <button type="button" class="btn btn-light btn-soft w-50" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-glow w-50">Save Event</button>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
  /* Make fields comfy on mobile */
  @media (max-width: 576px) {
    .modal-content { border-radius: 0 !important; }
    .modal-body { padding-top: .75rem !important; }
    .input-group .form-control { padding: .9rem 1rem; font-size: 1rem; }
    .input-group-text { padding: .55rem .75rem; }
    .btn-glow, .btn-soft { padding: .8rem 1rem; font-weight: 600; }
  }

  /* Ensure flatpickr popover sits above modal */
  .flatpickr-calendar {
    z-index: 1060; /* higher than Bootstrap modal backdrop (1050) */
  }
</style>
