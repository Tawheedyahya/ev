<div class="row">
    @forelse($venues as $venue)
        <div class="col-md-4 mb-4">
            <a href="{{ route('card.venue', $venue) }}">
                <div class="card h-100 shadow-sm">
                    @if ($venue['doc'])
                        <img src="{{ asset($venue['doc']) }}" class="card-img-top" alt="{{ $venue['venue_name'] }}">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="card-img-top" alt="No image available">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $venue['venue_name'] }}</h5>
                        <p class="card-text text-muted mb-1"><strong>City:</strong> {{ $venue['venue_city'] }}</p>
                        <p class="card-text">{{ $venue['description'] ?? 'No description available.' }}</p>
                    </div></a>

                    <div class="card-footer text-center">
                           <button id="heart_btn thumb-btn" class="heartt" aria-label="Like" data-id="{{$venue['id']}}">👎</button><span id="heartMsg" class="heart_m"></span>
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
const heartBtn = document.querySelectorAll(".heartt");
const heart_msg=document.querySelector('.heart_m');
heartBtn.forEach((btn) => {
    btn.addEventListener("click", async() => {
    // console.log('hii')
    const v_id=btn.dataset.id
    btn.classList.add("active");
    // return
    const origin=window.location.origin+'/customer/heart'
    console.log(origin);
    // return
    const response=await fetch(origin,{
        method:"POST",
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify({
            venue_id:v_id,
            user_id:@json(Auth::id())
        })
    })
    const data=await response.json();
    console.log(data)
        // remove the whole card instead of just the button
    const card = btn.closest(".col-md-4"); // your outer wrapper
    if (card) {
      card.remove();}
});
})


</script>
