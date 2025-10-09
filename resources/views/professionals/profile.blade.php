<div class="d-flex justify-content-center bg-light">
    @php
        $prof = Auth::guard('prof')->user();
    @endphp

    @if ($prof)
        <div class="card shadow-lg border-0 rounded-3" style="max-width: 400px; width:100%;">
            <div class="card-header bg-primary text-white text-center">
                @if (!empty($prof->prof_logo))
                    <img src="{{ asset($prof->prof_logo) }}" alt="Logo" class="img-thumbnail rounded-circle"
                        style="width:120px; height:120px; object-fit:cover;">
                @else
                    <i class="bi bi-person-circle fs-1 text-secondary" style="font-size:120px;"></i>
                @endif


                <h5 class="mt-2 mb-0">Professional Profile</h5>
            </div>
            <div class="card-body text-center">
                <h5 class="card-title fw-bold">{{ $prof->name }}</h5>
                <p class="card-text"><strong>Address:</strong> {{ $prof->address }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $prof->phone }}</p>
                <p class="card-text"><strong>Experience:</strong> {{ $prof->experience }} years</p>
                <p class="card-text"><strong>Profession:</strong> {{ $prof->profession }}</p>
                <p class="card-text text-wrap">
                    <strong>Places:</strong>
                    @forelse ($places as $place)
                        {{ $place }}@if (!$loop->last)
                            ,
                        @endif
                    @empty
                        no places chosen. Edit profile to choose place
                    @endforelse
                </p>

            </div>
            <div class="card-footer text-center">
                <a href="{{ route('prof.profile.edit') }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i> Edit Profile
                </a>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            No professional is logged in.
        </div>
    @endif
</div>
