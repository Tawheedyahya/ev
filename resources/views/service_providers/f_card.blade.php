{{-- resources/views/service_providers/f_card.blade.php --}}
<style>
/* ===== Scoped to gallery/blogs ===== */
.gallery-blogs {
  --radius: 14px;
  --shadow: 0 10px 24px rgba(0,0,0,.08);
  --gap: 14px;
}
.gallery-blogs .grid {
  display: grid;
  gap: var(--gap);
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
}
.gallery-blogs .card-photo {
  position: relative;
  border: 0;
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow);
  cursor: pointer;
  transition: transform .18s ease, box-shadow .18s ease;
  background: #fff;
}
.gallery-blogs .card-photo:hover {
  transform: translateY(-3px);
  box-shadow: 0 14px 32px rgba(0,0,0,.12);
}
.gallery-blogs .img-wrap {
  position: relative;
  background: #f6f7f9;
  aspect-ratio: 4/3;              /* consistent tile height */
  overflow: hidden;
}
.gallery-blogs img.card-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform .35s ease;
}
.gallery-blogs .card-photo:hover img.card-img {
  transform: scale(1.04);
}

/* Bottom gradient caption in tile (2 lines max) */
.gallery-blogs .caption {
  position: absolute;
  left: 0; right: 0; bottom: 0;
  padding: 10px 12px;
  color: #fff;
  background: linear-gradient(to top, rgba(0,0,0,.55), rgba(0,0,0,0));
  font-size: .95rem;
  line-height: 1.35;
  display: -webkit-box;
  -webkit-line-clamp: 2;          /* 2-line ellipsis */
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Actions area (only shows when $form === true) */
.gallery-blogs .actions {
  display: grid;
  grid-template-columns: 1fr;
  gap: 8px;
  padding: 10px 12px 12px;
}
.gallery-blogs .btn-del {
  border-radius: 10px;
}

/* ===== Modal (image on top, text below) ===== */
#blogImageModal .modal-content {
  background: #000;
  border: 0;
  border-radius: 14px;
}
#blogImageModal .modal-body {
  padding: 0;
}
#blogImageModal .modal-img {
  width: 100%;
  height: auto;
  object-fit: contain;
  display: block;
  background: #000;
}
#blogImageModal .modal-caption {
  color: #e8e8e8;
  padding: 14px 16px 18px;
  font-size: 1rem;
  line-height: 1.6;
  border-top: 1px solid rgba(255,255,255,.08);
  white-space: pre-wrap;      /* preserve newlines */
  word-wrap: break-word;      /* wrap long words/URLs */
  max-height: 35vh;           /* long text scrolls */
  overflow: auto;
}

/* Small tweaks inside your right column */
@media (max-width: 576px){
  .gallery-blogs .grid{ gap: 10px; }
}
</style>

{{-- Toast (kept) --}}
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="gallery-blogs">
  <div class="grid">
    @forelse ($blogs as $blog)
      <div class="card card-photo"
           role="button"
           aria-label="Open image"
           data-bs-toggle="modal"
           data-bs-target="#blogImageModal"
           data-img="{{ asset($blog->blogimg) }}"
           data-caption="{{ e($blog->description) }}">

        <div class="img-wrap">
          <img src="{{ asset($blog->blogimg) }}"
               alt="Blog image"
               class="card-img"
               loading="lazy">
          @if(!empty($blog->description))
            <div class="caption">{{ $blog->description }}</div>
          @endif
        </div>

        @if(!empty($form))
          <div class="actions">
            <form action="{{ route('service.blog.delete', $blog->id) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this blog?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-outline-danger w-100 btn-del">
                <i class="bi bi-trash3"></i> Delete
              </button>
            </form>
          </div>
        @endif
      </div>
    @empty
      <div class="col-12 text-center text-muted">No blogs found.</div>
    @endforelse
  </div>
</div>

{{-- Modal (one time) --}}
<div class="modal fade" id="blogImageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-body">
        <img src="" id="modalBlogImg" class="modal-img" alt="Preview">
        <div id="modalBlogCaption" class="modal-caption"></div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const modalImg = document.getElementById('modalBlogImg');
  const modalCap = document.getElementById('modalBlogCaption');

  document.querySelectorAll('.gallery-blogs .card-photo').forEach(card => {
    card.addEventListener('click', function () {
      modalImg.src = this.getAttribute('data-img') || '';
      modalCap.textContent = this.getAttribute('data-caption') || '';
    });
  });
});
</script>
