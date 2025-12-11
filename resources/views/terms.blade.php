@extends('welcome')
@push('styles')
    <style>
        /* Terms of Use - Professional Design */
        .terms-of-use {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.7;
            color: #2d3748;
        }

        .terms-of-use h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
        }

        .terms-of-use h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1a202c;
            margin: 60px 0 30px;
            position: relative;
            padding-bottom: 15px;
        }

        .terms-of-use h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .terms-of-use h3 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #2d3748;
            margin: 40px 0 20px;
            position: relative;
            padding-left: 20px;
        }

        .terms-of-use h3::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.2em;
            width: 4px;
            height: 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .terms-of-use h4 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #4a5568;
            margin: 30px 0 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e2e8f0;
        }

        .s-1 {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            padding: 50px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .s-1::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        }

        .s-2,
        .s-3,
        .s-4,
        .s-5,
        .s-6,
        .s-7 {
            background: #ffffff;
            padding: 40px;
            margin-bottom: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .s-2:hover,
        .s-3:hover,
        .s-4:hover,
        .s-5:hover,
        .s-6:hover,
        .s-7:hover {
            transform: translateY(-4px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.12);
            border-color: #667eea;
        }

        .terms-of-use p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: #4a5568;
        }

        .terms-of-use p:last-child {
            margin-bottom: 0;
        }

        .company-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 16px;
            margin: 30px 0;
            text-align: center;
            font-weight: 500;
        }

        .company-info strong {
            font-weight: 700;
            color: #fff;
        }

        .warning-box {
            background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
            border-left: 5px solid #fc8181;
            padding: 25px;
            margin: 25px 0;
            border-radius: 12px;
            font-weight: 600;
            color: #742a2a;
        }

        .highlight-box {
            background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
            border-left: 5px solid #48bb78;
            padding: 25px;
            margin: 25px 0;
            border-radius: 12px;
            font-weight: 600;
            color: #22543d;
        }

        .terms-nav {
            position: sticky;
            top: 100px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 25px;
            border-radius: 16px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .terms-nav h3 {
            margin: 0 0 20px 0;
            color: #1a202c;
            font-size: 1.3rem;
        }

        .terms-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .terms-nav li {
            margin-bottom: 12px;
        }

        .terms-nav a {
            color: #4a5568;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: block;
            padding: 8px 12px;
            border-radius: 8px;
        }

        .terms-nav a:hover {
            color: #667eea;
            background: rgba(102, 126, 234, 0.1);
            padding-left: 16px;
        }

        /* Scroll Animations */
        .scroll-animate {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-animate.fade-left {
            transform: translateX(-40px);
        }

        .scroll-animate.fade-left.visible {
            transform: translateX(0);
        }

        .scroll-animate.fade-right {
            transform: translateX(40px);
        }

        .scroll-animate.fade-right.visible {
            transform: translateX(0);
        }

        .scroll-animate.fade-up {
            transform: translateY(40px);
        }

        .scroll-animate.fade-up.visible {
            transform: translateY(0);
        }

        .scroll-animate.bounce {
            transform: translateY(20px) scale(0.95);
        }

        .scroll-animate.bounce.visible {
            transform: translateY(0) scale(1);
        }

        .blink {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .terms-of-use {
                padding: 40px 15px;
            }

            .s-1,
            .s-2,
            .s-3,
            .s-4,
            .s-5,
            .s-6,
            .s-7 {
                padding: 25px 20px;
            }

            .terms-nav {
                position: relative;
                top: 0;
                margin: 0 0 30px 0;
            }
        }

        @media (max-width: 480px) {
            .terms-of-use h1 {
                font-size: 2.2rem;
            }

            .terms-of-use h2 {
                font-size: 1.8rem;
            }
        }
    </style>
@endpush

@section('title', 'Terms of Use')
@section('content')
    <div class="container">


        <section class="terms-of-use" id="intro">
            <!-- Company Info Highlight -->
            {{-- <div class="company-info scroll-animate bounce">
            <strong>Event Venues™</strong> | Reg. No. 202103200846 (CA0327251-D)<br>
            <small>Sole Proprietor registered in Kuala Lumpur, Malaysia</small><br>
            📧 <a href="mailto:support@eventvenues.asia" style="color: #e2e8f0;">support@eventvenues.asia</a>
        </div> --}}

            <div class="s-1" id="intro-section">
                <h1 class="scroll-animate bounce">Terms of Use</h1>
                <p class="scroll-animate bounce">These services (www.eventvenues.asia) are provided by Event Venues™, Reg.
                    No. 202103200846 (CA0327251-D), a
                    sole proprietor which is registered in Kuala Lumpur, Malaysia. Please email all your queries to
                    support@eventvenues.asia
                    1. Please read these terms and conditions (the “Terms”) carefully. By accessing and using our website
                    and
                    any content, features, photographs, videos, measurements, floor plans, and other services provided
                    therein
                    (together, our “Work”), you indicate your acceptance of these Terms, the Privacy Policy and any other
                    notices, guidelines and rules published by Event Venues on our Services from time to time (each of which
                    is
                    incorporated into the Terms by this reference). The Privacy Policy can be accessed from links at the
                    bottom
                    of our webpages.
                    2. If you do not accept these Terms please do not access and/or use the Services.
                    3. Event Venues may update these Terms at any time. Please review the Terms regularly to ensure you are
                    aware of any changes. Your continued access to and/or use of our Services after changes have been made
                    to
                    the Terms indicates your agreement to be legally bound by the updated and/or amended Terms.
                </p>
                {{-- <div class="warning-box scroll-animate fade-left">
                ⚠️ <strong>Important:</strong> Do not use our services if you do not accept these Terms. Event Venues may update these Terms at any time—continued use indicates your agreement to the updated Terms.
            </div> --}}
            </div>

            <div class="s-2" id="usage">
                <h2 class="scroll-animate fade-right">Use of Our Service</h2>
                <p class="scroll-animate fade-left">4.You agree to use our Work for lawful purposes only and in a way that
                    does not infringe the rights of or
                    restrict or inhibit any person’s use and enjoyment of our Work and in compliance at all times with these
                    Terms and with all laws and regulations that apply.
                    5. In using our services, you agree not to adapt, alter or create a derivative work from any content
                    provided to you, whether by adding or removing material from the Work. You will need our prior written
                    permission if you want to use any content from our Work for any other reason. Alterations shall be
                    deemed to
                    include the addition of any illustrations, photographs, videos, sound, text, or computerized effects.
                    6. Any personal information supplied to us as part of the registration process and/or or other
                    interaction
                    will be collected, stored and used in accordance with our Privacy Policy. We have the right to refuse
                    service to any client, whether chosen by you or allocated by us, at any time, if in our opinion you have
                    failed to comply with any of the provisions of these Terms.
                </p>
                {{-- <div class="highlight-box scroll-animate fade-left">
                ✅ You may not adapt, alter, or create derivative works from our content without prior written permission. This includes adding/removing material, illustrations, or effects.
            </div>
            <p class="scroll-animate fade-left">
                Personal information is handled per our Privacy Policy. We reserve the right to refuse service for non-compliance with these Terms.
            </p> --}}
            </div>

            <div class="s-3" id="ip">
                <h3 class="scroll-animate fade-left">Intellectual Property Rights</h3>
                <p class="scroll-animate fade-left">7.to all rights in preliminary materials and all electronic and
                    non-electronic rights. For purposes of the
                    Terms, electronic rights are defined as rights in the digitized form of works that can be encoded,
                    stored,
                    and retrieved from such media as computer disks, CD-ROM, USB, computer databases, network servers, and
                    any
                    other digital format known now or later.
                    8. All information, data, text, documents, graphics, logos, designs, images, pictures, photographs,
                    videos,
                    podcasts, weblogs, RSS feeds, widgets, embeddable media players, software, interactive features,
                    advertisements or other content, or our services, are protected by copyright, trade marks, database
                    rights
                    and other intellectual property rights and are owned by or licensed to us or are otherwise used by us as
                    permitted by applicable law or regulation. Nothing contained herein shall be construed as conferring by
                    implication, estoppel or otherwise, any licence or right to use the Materials other than as permitted in
                    these Terms. All such content as listed above and copyrights or trademarks, provided to Event Venues by
                    clients, is considered to be owned or licensed by the client, and such license granted to Event Venues™
                    for
                    use, reproduction, and delivery when commissioning for any work.
                    9. The ownership of the Work shall remain property of Event Venues™. Event Venues™ reserves all
                    reproduction
                    rights, including the right to claim statutory copyright, in the Work (produced by Event Venues. Except
                    as
                    specifically permitted in our client agreements, you undertake not to copy, store in any medium
                    (including
                    on any other website), distribute, transmit, re-transmit, re-publish, broadcast, modify, or show in
                    public
                    any part of our Work without the express, written consent of Event Venues™. All approved reproductions
                    shall
                    bear the following copyright notice: Copyright © Event Venues™ 2021. All rights reserved.
                    10. All media published on behalf of Event Venues™ on YouTube or any alternate social media avenues or
                    websites operated by Event Venues™ and its officers, employees, or contractors for the purpose of
                    marketing
                    and promotion is subject to being branded by the company. Media files are provided to the client for
                    their
                    own discretion on upload and optimization. All residential video projects are tagged with Event Venues™
                    Branding in an effort to reduce the cost to the residential real estate market. This branding can
                    however be
                    requested for removal for a fee.
                </p>
            </div>

            <div class="s-4" id="rights">
                <h3 class="scroll-animate fade-up">Grant of Rights</h3>
                <p>11.Upon receipt of full payment, Event Venues™ grants to the Client the following rights in the Work: For
                    use
                    online on the www.eventvenues.asia, Clients website, any social media pages, any property listing
                    websites,
                    and on other promotional avenues specifically targeted towards marketing the said project. The Client
                    may
                    not sell the product, alone or in combination with any other material, unless a transfer of copyright
                    has
                    been issued from Event Venues™.</p>
            </div>

            <div class="s-5" id="liability">
                <h3 class="scroll-animate fade-right">Limitation of Liability</h3>
                <p class="scroll-animate fade-right">12. In the unlikely event that all or some of the photographs, videos,
                    measurements, floor plans, or other
                    works fail to materialize or there is total photographic failure due to reasons beyond Event Venues™’s
                    control, the liability of Event Venues™ will be limited to the refund of all money paid towards that
                    portion
                    of the project. If the final product has been delivered to the client for a period of 07 days, Event
                    Venues™
                    carries no responsibility for the loss of such material from our archive drives. Neither party shall be
                    liable for indirect or consequential losses. In any event, the limit of Event Venues’s liability shall
                    not
                    exceed the Package Price.
                    13. You accept that Event Venues™, a division of Novo Reperio Sdn. Bhd., a sole proprietor entity, has
                    an
                    interest in limiting the personal liability of its officers and employees. You agree that you will not
                    bring
                    any claim personally against Event Venues nor Novo Reperio Sdn Bhd’s officers or employees in respect of
                    any
                    losses you suffer in connection with the website or any of the services offered by the company. Event
                    Venues
                    and Nov Reperio Sdn. Bhd. does carry Errors & Omissions insurance for its measurement and floor plan
                    services, as well as general commercial liability insurance.
                </p>
                <div class="highlight-box scroll-animate fade-up">
                    🛡️ Event Venues™ and Novo Reperio Sdn Bhd carry Errors & Omissions insurance and general commercial
                    liability insurance.
                </div>
            </div>

            <div class="s-6" id="travel">
                <h3 class="scroll-animate fade-right">Travel Policy</h3>
                <p class="fade-up">14. Jobs outside of Klang Valley,or outstation travel could incur a travel charge. Travel
                    charges are
                    applied at the discretion of Event Venues, and overnight accommodation will be charged to the Client if
                    necessary.</p>
                <p class="scroll-animate fade-up">15. Event Venues™ will take every care to the performance of this
                    Agreement. But Agreement is subject to Acts
                    of God beyond our control; i.e. natural disaster, calamity, fire or police action.</p>

                <h3 class="blink scroll-animate">Act of God</h3>
                <p class="blink scroll-animate">
                    16. Performance is subject to Acts of God (natural disasters, fire, police action) beyond our control.
                </p>
            </div>

            <div class="s-7" id="payment">
                <h3 class="blink scroll-animate">Package Selection, Payment & Cancellation</h3>
                <p class="blink scroll-animate ">17. Clients must select a service, pay and receive an email confirmation
                    for a project to be considered
                    booked. There will be a 50% of total package price; (including all travel costs if applicable) applied
                    to
                    cancellations made less than 24 hours notice prior to session time. Cancellation times apply to business
                    hours – 9:00am to 5:00pm Monday to Friday. All payments must be made in full, on or before the time of
                    product delivery. In the event that no one is at the premise where the session is to take place for 15
                    minutes after the session start time, the Photographer, Videographer, or other service provider will
                    leave
                    and the Client will be charged a 100% of total package price; (including all travel costs if
                    applicable).
                    Any cancellation made on-site, before or during the scheduled appointment, will be subject to a 100%
                    on-site
                    cancellation fee per service (including all travel costs if applicable). The session ends once the
                    Service
                    Provider has left the premises, and if the Client chooses to add services after this point, it will
                    constitute a new job. Any cancellation made 24 hours before the scheduled appointment, will be subject
                    to
                    full refund or a credit note, transferable to next assignment (excluding accommodation cost if
                    applicable).
                    18. Substantial cleaning and staging required prior to 360 photography for unprepared properties will be
                    billed at RM150/hr (Billed in 30 minute increments). Additional ad-hoc production on location will also
                    be
                    billed at RM150/hr.
                    19. Parking fees must be covered by the client (agents, agency, property developer). Any charges
                    incurred by
                    the team on site will be added to the invoice for reimbursement. Overtime, weekend, public holiday,
                    bookings
                    are subject to a RM150 – RM350 add-on and are accepted at the discretion of the Event Venues team.
                    Matterport 3D hosting, 360 virtual fees of RM300/yr will apply after the initial 1yr free hosting period
                    ends. If you wish to cancel the cloud hosting and have the tour removed from being publicly available
                    online, you must contact our team and receive confirmation of cancellation a minimum of 7 business days
                    before the end of your free hosting period.
                    20. Prices are subject to change without notice. Please contact us for an updated price list.
                    21. There will be a maximum of one set of edit requests per video production (if applicable on the
                    selected
                    package), if required by the client. Commercial video projects may have a maximum of three edit requests
                    (if
                    applicable on the selected package). Additional edit requests will be charged at RM350/hr (minimum 1
                    hour).</p>
            </div>

            <div class="s-2" style="margin-top: 40px;">
                <h4>Delivery Date</h4>
                <p>22. Event Venues™ agrees to deliver the final images for residential real estate within 5 business days
                    from
                    session date. Interactive tours, video can take from 2 to 7 business days to complete, and even longer
                    for
                    custom projects; and will be delivered accordingly. Delivery times for other services not listed should
                    be
                    discussed with the Event Venues™ team. If the Client requests a specific delivery date, arrangements can
                    be
                    made and a new delivery date shall be agreed upon mutually. Commercial projects require additional
                    business
                    days before delivery, but arrangements can be made if requested by the client, and a new delivery date
                    shall
                    be agreed upon mutually.
                    23. All information, ie. property description, logo’s, contact information, etc must be provided to
                    Event
                    Venues™ before the session date to avoid delay of delivery. Failure to provide information, or
                    inadequate
                    communication with the production team will result in the delay of the final project. Event Venues will
                    take
                    no responsibility in delayed projects.
                    -P24. Offline copy of the completed virtual tour projects (if any) must be downloaded by the client
                    within
                    30 days from delivery date. After this point, the projects are deleted from the server and can no longer
                    be
                    recovered. Matterport 3D Capture data is only kept for a period of 30 days from delivery; if
                    modifications
                    are required they must be completed within this period of time. After the 30 day period is up, Capture
                    data
                    is deleted.</p>

                <h4 style="margin-top: 25px;">Website Disclaimer</h4>
                <div class="warning-box">
                    <h3>AFFILIATES & AGENCY</h3>
                    <p>25. As an affiliate of Event Venues™, you agree to thoroughly read through our website content and
                        familiarize yourself with our services. You represent the Event Venues brand when speaking to
                        prospective
                        clients, and therefore must do it with the utmost respect, and professionally. You are not an
                        employee of
                        Event Venues, and acknowledge that you cannot engage any responsibility nor contract any obligation
                        on
                        behalf of Event Venues under any circumstances.</p>
                    {{-- <h3>PARTNERS</h3> --}}
                    <h3>PARTNERS</h3>
                    <p>26. Event Venues works closely with Novo Reperio Sdn. Bhd (Reg. No. 1098147-P) as a trusted service
                        partner
                    </p>
                </div>
            </div>
            <div class="s-6" id="travel">
                <h3 class="scroll-animate fade-right">MISCELLANEOUS</h3>
                  <p>27. A waiver or any breach of any of the provisions in this Terms agreement shall not be construed as a
                continuing waiver of other breaches of the same or other provisions hereof.</p>
            <h4>DISCLAIMER</h4>
            <p>The Site may contain testimonials by users of our products and/or services. These testimonials reflect the
                real-life experiences and opinions of such users. However, the experiences are personal to those particular
                users, and may not necessarily be representative of all users of our products and/or services. We do not
                claim, and you should not assume, that all users will have the same experiences. YOUR INDIVIDUAL RESULTS MAY
                VARY.
                The testimonials on the Site are submitted in various forms such as text, audio and/or video, and are
                reviewed by us before being posted. They appear on the Site verbatim as given by the users, except for the
                correction of grammar or typing errors. Some testimonials may have been shortened for the sake of brevity
                where the full testimonial contained extraneous information not relevant to the general public.
                The views and opinions contained in the testimonials belong solely to the individual user and do not reflect
                our views and opinions. We are not affiliated with users who provide testimonials, and users are not paid or
                otherwise compensated for their testimonials
            </p>
              <p>The Site may contain (or you may be sent through the Site) links to other websites or content belonging to or
                originating from third parties or links to websites and features in banners or other advertising. Such
                external links are not investigated, monitored, or checked for accuracy, adequacy, validity, reliability,
                availability or completeness by us. WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR THE
                ACCURACY OR RELIABILITY OF ANY INFORMATION OFFERED BY THIRD-PARTY WEBSITES LINKED THROUGH THE SITE OR ANY
                WEBSITE OR FEATURE LINKED IN ANY BANNER OR OTHER ADVERTISING. WE WILL NOT BE A PARTY TO OR IN ANY WAY BE
                RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES.
            </p>
            <h4> WEBSITE DISCLAIMER</h4>
            <p>The information provided by Event Venues Limited (“we,” “us” or “our”) on www.eventvenues.asia (the “Site”)
                is for general informational purposes only. All information on the Site is provided in good faith, however
                we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy,
                validity, reliability, availability or completeness of any information on the Site. UNDER NO CIRCUMSTANCE
                SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE
                SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY
                INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.</p>

            </div>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Enhanced Scroll Animations
            const elements = document.querySelectorAll('.scroll-animate');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            });

            elements.forEach(el => observer.observe(el));

            // Smooth scrolling for navigation links
            document.querySelectorAll('.terms-nav a').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Parallax effect for sections
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelector('.s-1');
                if (parallax) {
                    const speed = scrolled * 0.5;
                    parallax.style.transform = `translateY(${speed}px)`;
                }
            });
        });
    </script>
@endsection
