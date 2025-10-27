<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse($venues as $venue)
        <div class="col d-flex">
            <div class="card shadow-sm w-100 d-flex flex-column h-100">
                <a href="{{ route('card.venue', $venue) }}" class="text-decoration-none text-dark">
                    @if ($venue['doc'])
                        <img src="{{ asset($venue['doc']) }}" class="card-img-top" alt="{{ $venue['venue_name'] }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="card-img-top" alt="No image available">
                    @endif

                    <div class="card-body flex-grow-1">
                        <h5 class="card-title">{{ $venue['venue_name'] }}</h5>
                        <p class="card-text text-muted mb-1"><strong>City:</strong> {{ $venue['venue_city'] }}</p>
                        <p class="card-text">{{ $venue['description'] ?? 'No description available.' }}</p>
                    </div>
                </a>

                <div class="card-footer text-center mt-auto bg-white border-0 pb-3">
                    <button class="heartt btn btn-outline-danger btn-sm" data-id="{{ $venue['id'] }}">👎 Unlike</button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                No venues found.
            </div>
        </div>
    @endforelse
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const heartButtons = document.querySelectorAll(".heartt");

        heartButtons.forEach((btn) => {
            btn.addEventListener("click", async () => {
                const v_id = btn.dataset.id;
                const url = window.location.origin + '/customer/heart';

                btn.disabled = true;
                btn.innerText = "Removing...";

                try {
                    const response = await fetch(url, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            venue_id: v_id,
                            user_id: @json(Auth::id())
                        })
                    });

                    const data = await response.json();
                    console.log(data);

                    const card = btn.closest(".col");
                    if (card) card.remove();
                } catch (err) {
                    console.error("Error:", err);
                    btn.innerText = "Error";
                    btn.disabled = false;
                }
            });
        });
    });
</script>

<style>
    .card {
        border: none;
        border-radius: 1rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .heartt {
        font-size: 14px;
        border-radius: 20px;
        padding: 5px 12px;
        transition: all 0.2s ease;
    }

    .heartt:hover {
        transform: scale(1.05);
    }
</style>
