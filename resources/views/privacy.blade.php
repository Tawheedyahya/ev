@extends('welcome')

@push('styles')
<style>
/* === PROFESSIONAL PRIVACY NOTICE STYLES === */
.privacy-notice {
    max-width: 1100px;
    margin: 0 auto;
    padding: 50px 16px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.65;
    color: #2d3748;
    font-size: 15px;
}

/* MAIN TITLE */
.privacy-notice h1 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #1a202c;
    /* text-align: center; */
    margin-bottom: 28px;
    letter-spacing: -0.4px;
}

/* SECTION HEADERS */
.privacy-notice h2 {
    font-size: 1.35rem;
    font-weight: 600;
    margin: 40px 0 18px;
    color: #1a202c;
}

.privacy-notice h3 {
    font-size: 1.1rem;
    font-weight: 600;
    margin: 28px 0 14px;
    color: #2d3748;
}

/* BODY TEXT */
.privacy-notice p {
    font-size: 0.95rem;
    color: #4a5568;
    margin-bottom: 14px;
}

/* LISTS */
.privacy-notice ul {
    padding-left: 18px;
    margin-bottom: 16px;
}
.privacy-notice li {
    font-size: 0.95rem;
    color: #4a5568;
    margin-bottom: 8px;
}

/* SECTION CARDS */
.section-card {
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

/* WARNING BOX */
.warning-box {
    background: #fff5f5;
    padding: 14px 18px;
    border-left: 4px solid #e53e3e;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #742a2a;
}

/* MOBILE */
@media (max-width: 768px) {
    .privacy-notice {
        font-size: 14px;
        padding: 36px 14px;
    }

    .privacy-notice h1 {
        font-size: 1.9rem;
    }

    .section-card {
        padding: 22px 20px;
    }
}
</style>
@endpush

@section('title','Privacy Notice')

@section('content')
<div class="container">
<section class="privacy-notice">

<!-- INTRO -->
<div class="section-card">
    <h1>Privacy Notice</h1>
    <p>
        This Privacy Notice explains how <strong>Event Venues™</strong> (“we”, “us”, or “our”)
        collects, uses, stores, and protects your personal information when you visit
        <strong>www.eventvenues.asia</strong> or use our services.
    </p>
</div>

<!-- CONTACT -->
<div class="section-card">
    <h2>How Can You Contact Us?</h2>
    <p>
        If you have questions or concerns about this Privacy Notice, you may contact us at:
    </p>
    <div class="highlight-box">
        support@eventvenues.asia
    </div>
</div>

<!-- INFORMATION WE COLLECT -->
<div class="section-card">
    <h2>What Information Do We Collect?</h2>

    <h3>Information You Provide</h3>
    <p>
        We collect personal information you voluntarily provide when you register, contact us,
        or use our services. This may include:
    </p>
    <ul>
        <li>Name and contact details</li>
        <li>Account login credentials</li>
        <li>Payment and billing information</li>
        <li>Social media login details (if used)</li>
    </ul>

    <h3>Information Collected Automatically</h3>
    <p>
        When you visit our website, we automatically collect technical data such as IP address,
        browser type, device information, operating system, and usage patterns.
        This information helps us maintain site security and improve user experience.
    </p>

    <h3>Information from Third Parties</h3>
    <p>
        We may receive limited information from social media platforms, public databases,
        or marketing partners, in accordance with their privacy policies.
    </p>
</div>

<!-- HOW WE USE DATA -->
<div class="section-card">
    <h2>How Do We Use Your Information?</h2>
    <p>We use your information to:</p>
    <ul>
        <li>Create and manage user accounts</li>
        <li>Deliver and manage services</li>
        <li>Process payments and invoices</li>
        <li>Send service updates and administrative communications</li>
        <li>Send marketing communications (with opt-out options)</li>
        <li>Improve our website, services, and security</li>
        <li>Comply with legal and regulatory obligations</li>
    </ul>
</div>

<!-- SHARING -->
<div class="section-card">
    <h2>Who Do We Share Your Information With?</h2>
    <p>
        We only share your information when necessary, including with:
    </p>
    <ul>
        <li>CRM and marketing platforms</li>
        <li>Billing and accounting providers</li>
        <li>Social media and advertising platforms</li>
        <li>Authentication providers</li>
        <li>Website hosting providers</li>
    </ul>
    <p>
        We do not sell or rent your personal information to third parties for marketing purposes.
    </p>
</div>

<!-- COOKIES -->
<div class="section-card">
    <h2>Cookies & Tracking Technologies</h2>
    <p>
        We use cookies and similar technologies to improve site functionality and analytics.
        You may disable cookies via your browser settings, though this may affect site features.
    </p>
</div>

<!-- PRIVACY RIGHTS -->
<div class="section-card">
    <h2>Your Privacy Rights</h2>
    <p>
        Depending on your location, you may have rights to access, correct, delete,
        restrict, or transfer your personal data.
    </p>
    <p>
        You may withdraw consent at any time by contacting us.
        This will not affect prior lawful processing.
    </p>
</div>

<!-- DATA RETENTION -->
<div class="section-card">
    <h2>How Long Do We Keep Your Information?</h2>
    <p>
        We retain personal data only as long as necessary for the purposes outlined in this Notice,
        unless a longer retention period is required by law.
    </p>
    <p>
        When data is no longer needed, it is securely deleted or anonymized.
    </p>
</div>

<!-- SECURITY -->
<div class="section-card">
    <h2>How Do We Keep Your Information Safe?</h2>
    <p>
        We implement appropriate technical and organizational security measures
        to protect your personal information. However, no online system is 100% secure.
    </p>
    <div class="warning-box">
        Please access our services only in secure environments.
    </div>
</div>

<!-- MINORS -->
<div class="section-card">
    <h2>Children’s Privacy</h2>
    <p>
        We do not knowingly collect or market to individuals under 18 years of age.
        If such data is discovered, we will promptly delete it.
    </p>
</div>

<!-- UPDATES -->
<div class="section-card">
    <h2>Policy Updates</h2>
    <p>
        We may update this Privacy Notice from time to time to remain compliant with laws.
        Updates will be effective immediately upon publication.
    </p>
</div>

</section>
</div>
@endsection
