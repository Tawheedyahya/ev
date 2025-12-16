@php
$events = [
    ['name' => 'Company Dinner', 'bi' => 'bi-people'],
    ['name' => 'Meeting', 'bi' => 'bi-laptop'],
    ['name' => 'Seminar', 'bi' => 'bi-people-fill'],
    ['name' => 'Baby Shower', 'bi' => 'bi-bicycle'],
    ['name' => 'Christmas Party', 'bi' => 'bi-tree'],
    ['name' => 'Dinner & Dance', 'bi' => 'bi-disc'],
    ['name' => 'Office Party', 'bi' => 'bi-trophy'],
    ['name' => 'Conference', 'bi' => 'bi-easel2'],
    ['name' => '21st Birthday', 'bi' => 'bi-cake2'],
    ['name' => 'Workshop', 'bi' => 'bi-journal-text'],
    ['name' => 'Networking', 'bi' => 'bi-people'],
];
@endphp

<div class="event-strip-wrapper">

    <h3 class="occasion-title">Popular Event Categories</h3>

    <div class="event-strip" id="eventStrip">
        @foreach ($events as $e)
            <div class="event-item">
                <i class="bi {{ $e['bi'] }}"></i>
                <span>{{ $e['name'] }}</span>
            </div>
        @endforeach
    </div>

    <button class="scroll-btn" id="scrollRight">
        <i class="bi bi-chevron-right"></i>
    </button>

</div>



<style>
/* MAIN WRAPPER */
.event-strip-wrapper {
    position: relative;
    padding: 15px 0;
    border-top: 1px solid #e5e7eb;
    border-bottom: 1px solid #e5e7eb;
}

/* SCROLL STRIP */
.event-strip {
    display: flex;
    gap: 40px;
    padding: 12px 8px;
    overflow-x: auto;
    scrollbar-width: none;  /* hide scrollbar in Firefox */
}

.event-strip::-webkit-scrollbar {
    display: none;          /* hide scrollbar in Chrome */
}

/* EACH ITEM */
.event-item {
    text-align: center;
    min-width: 90px;
    cursor: pointer;
}

/* HEADING */
.occasion-title {
    font-size: 26px;
    padding: 10px;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 28px;
    text-align: center;
}

.event-item i {
    font-size: 28px;
    color: #9aa3b1;
    display: block;
    margin-bottom: 4px;
}

.event-item span {
    font-size: 13px;
    letter-spacing: 0.3px;
    font-weight: 600;
    color: #6c7480;
}

/* RIGHT SCROLL BUTTON */
.scroll-btn {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: white;
    box-shadow: 0 0 8px rgba(0,0,0,0.15);
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
}

.scroll-btn i {
    font-size: 18px;
    color: #4a5568;
}

</style>
<script>
    document.getElementById("scrollRight").addEventListener("click", function () {
    document.getElementById("eventStrip").scrollBy({
        left: 200,
        behavior: "smooth"
    });
});


</script>
