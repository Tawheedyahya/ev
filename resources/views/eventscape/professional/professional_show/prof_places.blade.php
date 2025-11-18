 <link rel="stylesheet" href="{{ asset('manual_css/ckeditor.css') }}">
 @if (isset($info->about_us))
<div class="row mb-3">
    <strong>About us:</strong>{!! $info->about_us !!}
</div>
@endif
 @if (isset($info->about_us))
<div class="row mb-3">

    <div class="col-12 editor-output">
        <strong>Description:</strong>
        {!! $info->long_description !!}
    </div>
</div>
@endif

<!-- Service Places Section -->
<div class="mt-5" style="max-width: 800px;">
  <div class="card border-0 shadow-sm rounded-4 p-4">
    <h4 class="fw-bold text-dark mb-4">
      <i class="bi bi-geo-alt-fill text-warning me-2"></i> Service Places
    </h4>

    <div class="d-flex flex-wrap gap-3">
      @forelse ($service_place as $place)
        <button
          type="button"
          class="spec-card btn d-flex align-items-center gap-2 px-3 py-2 shadow-sm"
          data-name="{{ $place }}"
          style="background-color:#fffaf2; font-size:16px; border-radius:12px; border:1px solid #ffe9b0;">
          <i class="bi bi-geo-alt text-warning"></i>
          <span class="text-warning fw-semibold text-capitalize">{{ $place }}</span>
        </button>
      @empty
        <div class="alert alert-warning border-0 rounded-3 w-100">
          <i class="bi bi-exclamation-triangle me-2"></i>
          No service place is mentioned yet.
        </div>
      @endforelse
    </div>
  </div>
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
