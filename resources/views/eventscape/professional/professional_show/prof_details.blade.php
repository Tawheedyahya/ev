{{-- resources/views/eventscape/professional/professional_show/prof_details.blade.php --}}

@if (!empty($info?->about_us))
  <div class="mb-4">
    <div class="fw-bold mb-2 text-dark">
      <i class="bi bi-person-badge-fill text-warning me-2"></i>
      About Us
    </div>
    <div class="editor-output">
      {!! $info->about_us !!}
    </div>
  </div>
@endif

@if (!empty($info?->long_description))
  <div>
    <div class="fw-bold mb-2 text-dark">
      <i class="bi bi-card-text text-warning me-2"></i>
      Description
    </div>
    <div class="editor-output">
      {!! $info->long_description !!}
    </div>
  </div>
@else
  @if (empty($info?->about_us))
    <div class="text-muted">
      No description is available yet.
    </div>
  @endif
@endif
