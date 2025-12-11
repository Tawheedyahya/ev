@php
$l = [
    ['name' => 'Marriage', 'bi' => 'bi-heart-fill'],
    ['name' => 'Engagement', 'bi' => 'bi-gem'],
    ['name' => 'Birthday Party', 'bi' => 'bi-gift-fill'],
    ['name' => 'Reception', 'bi' => 'bi-people-fill'],
    ['name' => 'Social Gathering', 'bi' => 'bi-emoji-smile'],
    ['name' => 'Corporate Party', 'bi' => 'bi-briefcase-fill'],
    ['name' => 'Anniversary', 'bi' => 'bi-heart-pulse-fill'],
];
@endphp

<div class="occasion-section">
    <div class="occasion-title-box">
        <h2 class="occasion-heading">Most Viewed Occasions</h2>
        <div class="title-underline"></div>
    </div>

    <div class="occasion-slider-container">
        <button class="occasion-arrow left-arrow"><i class="bi bi-chevron-left"></i></button>

        <div class="occasion-slider">
            @foreach ($l as $list)
            <div class="occasion-card">
                <div class="occasion-icon">
                    <i class="bi {{ $list['bi'] }}"></i>
                </div>
                <p class="occasion-name">{{ $list['name'] }}</p>
            </div>
            @endforeach
        </div>

        <button class="occasion-arrow right-arrow"><i class="bi bi-chevron-right"></i></button>
    </div>
</div>
<style>
    /* MAIN SECTION */
.occasion-section {
    width: 95%;
    margin: 0 auto;
    padding: 50px 0;
    background: linear-gradient(135deg, #ffffff, #fff5ef);
    border-radius: 18px;
}

/* TITLE */
.occasion-title-box {
    text-align: center;
    margin-bottom: 35px;
}

.occasion-heading {
    font-size: 34px;
    font-weight: 800;
    color: #1e293b;
}

.title-underline {
    width: 90px;
    height: 4px;
    background: #ff5722;
    margin: 10px auto 0;
    border-radius: 20px;
}

/* SLIDER CONTAINER */
.occasion-slider-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* SLIDER */
.occasion-slider {
    display: flex;
    gap: 28px;
    overflow: hidden;
    scroll-behavior: smooth;
    padding: 20px 10px;
    width: 85%;
}

/* CARD */
.occasion-card {
    flex: 0 0 150px;
    background: white;
    padding: 22px 10px;
    border-radius: 18px;
    text-align: center;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    transition: 0.35s ease;
}

.occasion-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 28px rgba(0,0,0,0.12);
}

/* ICON CIRCLE */
.occasion-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(90deg, #ff6a00, #f7b733) !important;
    padding: 10px;
    margin: 0 auto 12px auto;
    border-radius: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: iconPulse 2s infinite;
}

.occasion-icon i {
    font-size: 45px;
    color: white;
}

/* NAME */
.occasion-name {
    font-size: 17px;
    font-weight: 700;
    color: #1e293b;
}

/* ARROWS */
.occasion-arrow {
    border: none;
    background: #ffffff;
    width: 55px;
    height: 55px;
    border-radius: 18px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    cursor: pointer;
    transition: 0.3s;
    display: flex;
    justify-content: center;
    align-items: center;
}

.occasion-arrow:hover {
    background: #ffeee6;
    transform: scale(1.05);
}

.occasion-arrow i {
    font-size: 28px;
    color: #ff5722;
    font-weight: bold;
}

.left-arrow {
    margin-right: 15px;
}

.right-arrow {
    margin-left: 15px;
}

/* ANIMATIONS */
@keyframes iconPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.08); }
    100% { transform: scale(1); }
}

/* MOBILE */
@media (max-width: 480px) {
    .occasion-slider {
        width: 100%;
        overflow-x: scroll;
    }

    .occasion-arrow {
        display: none;
    }
}

</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const slider = document.querySelector(".occasion-slider");
    const left = document.querySelector(".left-arrow");
    const right = document.querySelector(".right-arrow");

    const scrollAmount = 180;

    right.addEventListener("click", () => {
        slider.scrollBy({ left: scrollAmount, behavior: "smooth" });
    });

    left.addEventListener("click", () => {
        slider.scrollBy({ left: -scrollAmount, behavior: "smooth" });
    });
});

</script>
