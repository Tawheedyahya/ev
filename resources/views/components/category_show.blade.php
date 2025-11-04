<div class="category-pic">
    @foreach ($venues as $venue)
        <a href="{{route($action,$venue['id'])}}" class="card">
            <img src="{{ asset($venue['doc']) }}" alt="{{ $venue['id'] }}" loading='lazy'>
            <div class="overlay">
                <h4>{{ $venue['venue_name'] ?? 'Venue' }}</h4>
                <p><i class="bi bi-geo-alt-fill"></i> {{$venue['venue_city']}}</p>
            </div>
        </a>
    @endforeach
</div>
<style>
    .category-pic {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-rows: auto auto;
    gap: 15px;
}

.card {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    display: block;
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.card .overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 10px;
    color: #fff;
    background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
}

.card:first-child {
    grid-row: span 2;  /* make first image tall */
}
/*  */


/* Mobile view: stack into 1 column */
@media (max-width: 768px) {
    .category-pic {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }
    .card:first-child {
        grid-row: auto;
    }
}

</style>
