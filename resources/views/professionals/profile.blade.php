<div class="d-flex justify-content-center bg-light py-5">
  @php
      $prof = Auth::guard('prof')->user();
  @endphp

  @if ($prof)
  <div class="card shadow-lg border-0 rounded-3 d-flex flex-row align-items-center p-3" style="max-width: 800px; width:100%;">
      
      <!-- Left Section: Profile Image / Icon -->
      <div class="text-center p-4 border-end" style="flex: 0 0 250px;">
          @if (!empty($prof->prof_logo))
              <img src="{{ asset($prof->prof_logo) }}" alt="Logo"
                   class="rounded-circle shadow-sm" style="width:140px; height:140px; object-fit:cover;">
          @else
              <i class="bi bi-person-circle text-secondary" style="font-size:120px;"></i>
          @endif
          <h6 class="mt-3 fw-semibold">{{ $prof->name }}</h6>
          <a href="{{ route('prof.profile.edit') }}" class="btn btn-warning btn-sm mt-2">
              <i class="bi bi-pencil-square"></i> Edit Profile
          </a>
      </div>

      <!-- Right Section: Profile Details -->
      <div class="p-4" style="flex: 1;">
          <h5 class="fw-bold text-primary mb-3">Professional Profile</h5>
          <p><strong>Address:</strong> {{ $prof->address }}</p>
          <p><strong>Phone:</strong> {{ $prof->phone }}</p>
          <p><strong>Experience:</strong> {{ $prof->experience }} years</p>
          <p><strong>Profession:</strong> {{ $prof->profession }}</p>
          <p>
              <strong>Places:</strong>
              @forelse ($places as $place)
                  {{ $place }}@if (!$loop->last), @endif
              @empty
                  no places chosen. Edit profile to choose place.
              @endforelse
          </p>
      </div>

  </div>
  @else
      <div class="alert alert-info text-center w-50">
          No professional is logged in.
      </div>
  @endif
</div>
<style>
    .card {
  transition: transform 0.2s ease-in-out;
}
.card:hover {
  transform: translateY(-5px);
}

</style>