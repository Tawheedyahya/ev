@extends('welcome')

@push('styles')
<style>
/* === PROFESSIONAL TERMS OF USE STYLES === */
.terms-of-use {
    max-width: 1100px;
    margin: 0 auto;
    padding: 50px 16px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.65;
    color: #2d3748;
    font-size: 15px;
}

/* MAIN TITLE */
.terms-of-use h1 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #1a202c;
    /* text-align: center; */
    margin-bottom: 28px;
    letter-spacing: -0.4px;
}

/* SECTION HEADERS */
.terms-of-use h2 {
    font-size: 1.35rem;
    font-weight: 600;
    margin: 40px 0 18px;
    color: #1a202c;
}

.terms-of-use h3 {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 28px 0 14px;
    color: #2d3748;
}

/* BODY TEXT */
.terms-of-use p {
    font-size: 0.95rem;
    margin-bottom: 14px;
    color: #4a5568;
}

/* CONTENT SECTIONS */
.s-1, .s-2, .s-3, .s-4, .s-5, .s-6, .s-7 {
    background: #ffffff;
    padding: 28px 32px;
    margin-bottom: 24px;
    border-radius: 10px;
    border: 1px solid #edf2f7;
    box-shadow: 0 6px 18px rgba(0,0,0,0.05);
}

/* INFO HIGHLIGHT */
.highlight-box {
    background: #f0fff4;
    padding: 14px 18px;
    border-left: 4px solid #38a169;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #22543d;
}

/* WARNING / DISCLAIMER */
.warning-box {
    background: #fff5f5;
    padding: 14px 18px;
    border-left: 4px solid #e53e3e;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #742a2a;
}

/* SUBTLE SCROLL ANIMATION */
.scroll-animate {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease;
}
.scroll-animate.visible {
    opacity: 1;
    transform: translateY(0);
}

/* MOBILE */
@media (max-width: 768px) {
    .terms-of-use {
        font-size: 14px;
        padding: 36px 14px;
    }

    .terms-of-use h1 {
        font-size: 1.9rem;
    }

    .s-1, .s-2, .s-3, .s-4, .s-5, .s-6, .s-7 {
        padding: 22px 20px;
    }
}
</style>
@endpush

@section('title','Terms of Use')

@section('content')
<div class="container">
<section class="terms-of-use">

<!-- s-1 -->
<div class="s-1 scroll-animate">
    <h1>Terms of Use</h1>
    <p>
        These Terms govern your access to and use of <strong>www.eventvenues.asia</strong>, operated by
        <strong>Event Venues™</strong>, a sole proprietorship registered in Kuala Lumpur, Malaysia.
    </p>
    <p>
        By accessing or using our website, services, images, videos, floor plans, and related materials
        (“Work”), you agree to be bound by these Terms, our Privacy Policy, and all applicable notices.
    </p>
    <p>
        If you do not agree with these Terms, please discontinue use of our services.
    </p>
</div>

<!-- s-2 -->
<div class="s-2 scroll-animate">
    <h2>Use of Our Services</h2>
    <p>
        You agree to use our services lawfully and responsibly. You must not misuse, disrupt,
        or interfere with our platform or the rights of others.
    </p>
    <p>
        Modification, reproduction, or distribution of our content without written permission
        is strictly prohibited.
    </p>
</div>

<!-- s-3 -->
<div class="s-3 scroll-animate">
    <h3>Intellectual Property</h3>
    <p>
        All content on this platform is protected by intellectual property laws and is owned by
        or licensed to Event Venues™, unless otherwise stated.
    </p>
    <p>
        Clients retain ownership of materials they provide but grant Event Venues™ a license
        to use such materials for service delivery and promotion.
    </p>
</div>

<!-- s-4 -->
<div class="s-4 scroll-animate">
    <h3>Grant of Rights</h3>
    <p>
        Upon full payment, clients are granted a non-exclusive, non-transferable license
        to use the delivered Work for marketing and promotional purposes.
    </p>
    <p>
        Resale or transfer of copyright is not permitted without written consent.
    </p>
</div>

<!-- s-5 -->
<div class="s-5 scroll-animate">
    <h3>Limitation of Liability</h3>
    <p>
        Event Venues™’s liability is limited to the fees paid for the affected service.
        We are not liable for indirect or consequential losses.
    </p>
    <div class="highlight-box">
        Professional liability and Errors & Omissions insurance are maintained.
    </div>
</div>

<!-- s-6 -->
<div class="s-6 scroll-animate">
    <h3>Travel & Force Majeure</h3>
    <p>
        Outstation services may incur additional travel or accommodation charges.
    </p>
    <p>
        Performance may be delayed due to events beyond reasonable control,
        including natural disasters or government actions.
    </p>
</div>

<!-- s-7 -->
<div class="s-7 scroll-animate">
    <h3>Bookings, Payment & Cancellation</h3>
    <p>
        Services are confirmed only upon payment and email confirmation.
        Late cancellations or no-shows may incur charges.
    </p>
    <p>
        Additional revisions, overtime, or hosting services may incur extra fees.
    </p>
</div>

<!-- DELIVERY -->
<div class="s-2 scroll-animate">
    <h3>Delivery & Disclaimer</h3>
    <p>
        Delivery timelines depend on service scope. Clients must provide required
        information promptly to avoid delays.
    </p>
    <div class="warning-box">
        All information on this website is provided in good faith for general
        informational purposes only. Use is at your own risk.
    </div>
</div>

</section>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll('.scroll-animate');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.15 });

    items.forEach(item => observer.observe(item));
});
</script>
@endsection
