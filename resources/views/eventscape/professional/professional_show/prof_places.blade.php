{{-- resources/views/eventscape/professional/professional_show/prof_places.blade.php --}}
<style>
    .spec-card {
    background-color: #ecfdf5;   /* soft teal bg */
    border: 2px solid #5eead4;   /* strong teal border */
    border-radius: 12px;
    font-size: 16px;
    transition: all .2s ease;
}

.spec-card i,
.spec-card span {
    color: #0f766e;
    font-weight: 600;
}

.spec-card:hover {
    background-color: #d1fae5;
    border-color: #14b8a6;
    transform: translateY(-1px);
}

</style>
<div class="d-flex flex-wrap gap-3">
  @forelse ($service_place as $place)
    <button
      type="button"
      class="spec-card btn d-flex align-items-center gap-2 px-3 py-2 shadow-sm"
      data-name="{{ $place }}"
    >
      <i class="bi bi-geo-alt"></i>
      <span class="text-capitalize">{{ $place }}</span>
    </button>
  @empty
    <div class="alert alert-warning border-0 rounded-3 w-100 mb-0">
      <i class="bi bi-exclamation-triangle me-2"></i>
      No service place is mentioned yet.
    </div>
  @endforelse
</div>

