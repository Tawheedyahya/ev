<!-- GUIDE SECTION -->
<div class="container my-5">

    <div class="ped-wrapper">

        <!-- LEFT IMAGE CARD -->
        <div class="ped-image">
            <img src="{{ asset('ev_photos/work4.jpg') }}" alt="Event Planning Guide" loading="lazy">

            <div class="ped-image-overlay">
                <h2 class="ped-image-title">
                    Malaysia Event Planning & Venue Marketing Guide:<br>
                    How to Book or Get<br>
                    Booked
                </h2>
            </div>
        </div>

        <!-- RIGHT CONTENT CARD -->
        <div class="ped-content">
            <h3>For Event Planners: How to Book Smart and Save Time</h3>

            <h5>1. Start With the Right Filters on EV.asia</h5>
            <p>
                Planners rarely search for “event venue” without context. You know what you need,
                you just need a fast way to find it. Instead of browsing aimlessly or guessing,
                use EV.asia's filters to match your exact event type, size, and budget.
            </p>

            <p>
                Using EV.asia's smart filter helps you skip the noise, cut your shortlist in half,
                and connect only with venues that match your goals. The “Venue With Packages” toggle
                is especially useful if you want bundled deals without the back-and-forth.
            </p>

            <h5>2. Compare Features, Not Just Price</h5>
            <ul>
                <li>Included amenities (tables, AV, Wi-Fi, air conditioning)</li>
                <li>Rental terms (minimum spend, hourly vs full-day)</li>
                <li>Layout flexibility (workshops vs social events)</li>
            </ul>

            <p>
                Look at the full package. Many event venues are priced low
                but exclude basic needs like audio or setup.
            </p>

            <h5>3. Read Venue Reviews</h5>
            <p>
                Don't just look at ratings. Read how others used the venue.
                A wedding review may not help if you're planning a seminar.
            </p>
        </div>

    </div>

</div>

<!-- GIRL IMAGE -->
<div class="girl my-4">
    <img src="{{ asset('ev_photos/girl.png') }}" alt="" class="img-fluid" loading="lazy">
</div>

<!-- HALAL IMAGE -->
<div class="halal my-3">
    <img src="{{ asset('ev_photos/halal.png') }}" alt="" class="img-fluid" loading="lazy">
</div>

<style>
/* =========================
   MAIN WRAPPER
========================= */
.ped-wrapper {
    display: flex;
    gap: 24px;
    background: #ffffff;
    padding: 20px;
    height: 500px;                 /* FIXED CARD HEIGHT */
    border-radius: 24px;
    box-shadow: 0 12px 32px rgba(0,0,0,0.08);
    align-items: stretch;          /* KEY FOR SAME HEIGHT */
}

/* =========================
   LEFT IMAGE CARD
========================= */
.ped-image {
    position: relative;
    flex: 0 0 42%;
    height: 100%;
    border-radius: 18px;
    overflow: hidden;
}

.ped-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.ped-image::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.75) 0%,
        rgba(0,0,0,0.45) 40%,
        rgba(0,0,0,0.15) 100%
    );
}

.ped-image-overlay {
    position: absolute;
    bottom: 28px;
    left: 28px;
    right: 28px;
    z-index: 2;
}

.ped-image-title {
    color: #ffffff;
    font-size: 1.5rem;
    font-weight: 800;
    line-height: 1.25;
    margin: 0;
    max-width: 95%;
}

/* =========================
   RIGHT CONTENT CARD
========================= */
.ped-content {
    flex: 1;
    height: 100%;
    background: #ffffff;
    border-radius: 18px;
    padding: 28px;
    overflow-y: auto;
}

.ped-content h3 {
    font-weight: 800;
    margin-bottom: 18px;
}

.ped-content h5 {
    font-weight: 700;
    margin-top: 22px;
}

.ped-content p,
.ped-content li {
    font-size: 0.95rem;
    line-height: 1.6;
    color: #444;
}

/* NICE SCROLLBAR */
.ped-content::-webkit-scrollbar {
    width: 6px;
}
.ped-content::-webkit-scrollbar-thumb {
    background: #cfcfcf;
    border-radius: 10px;
}

/* =========================
   EXTRA IMAGES
========================= */
.girl,
.halal {
    text-align: center;
}

.halal img {
    width: 100%;
    height: auto;
    display: block;
}

/* =========================
   MOBILE
========================= */
/* =========================
   ENHANCED MOBILE RESPONSIVENESS
========================= */
/* =========================
   MOBILE FIX (CRITICAL)
========================= */
@media (max-width: 991px) {

    .ped-wrapper {
        flex-direction: column;   /* STACK IMAGE + CONTENT */
        height: auto;             /* REMOVE FIXED HEIGHT */
        padding: 16px;
    }

    .ped-image {
        flex: none;
        width: 100%;
        height: 260px;            /* CONTROL IMAGE HEIGHT */
    }

    .ped-content {
        height: auto;
        overflow: visible;        /* PAGE SCROLL, NOT CARD SCROLL */
    }
}
@media (max-width: 480px) {

    .ped-image {
        height: 200px;
    }

    .ped-image-title {
        font-size: 1.05rem;
        line-height: 1.3;
    }
}

</style>
