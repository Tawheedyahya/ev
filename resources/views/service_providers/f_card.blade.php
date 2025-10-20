<style>
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .blog-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .modal-img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .card-img-top {
        height: 220px;
        object-fit: cover;
    }
</style>



<h2 class="mb-4 text-center fw-bold">Your Blog Posts</h2>

{{-- Success toast/alert --}}
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Blog Cards --}}
<div class="row justify-content-center">
    @forelse ($blogs as $blog)
        <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0 blog-card" data-bs-toggle="modal" data-bs-target="#imageModal"
                data-img="{{ asset($blog->blogimg) }}">

                <img src="{{ asset($blog->blogimg) }}" class="card-img-top" alt="Blog Image">

                <div class="card-body d-flex flex-column">
                    <p class="card-text text-muted">{{ $blog->description }}</p>

                    {{-- Delete Button --}}
                    @if($form)
                    <form action="{{ route('service.blog.delete', $blog->id) }}" method="POST" class="mt-auto"
                        onsubmit="return confirm('Are you sure you want to delete this blog?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                            <i class="bi bi-trash3"></i> Delete
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-muted">No blogs found.</p>
        </div>
    @endforelse
</div>

{{-- Bootstrap Modal to preview image --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark border-0">
            <div class="modal-body p-0">
                <img src="" id="modalImage" class="modal-img" alt="Blog Preview">
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalImage = document.getElementById('modalImage');

        document.querySelectorAll('.blog-card').forEach(card => {
            card.addEventListener('click', function() {
                const imgSrc = this.getAttribute('data-img');
                modalImage.src = imgSrc;
            });
        });
    });
</script>
