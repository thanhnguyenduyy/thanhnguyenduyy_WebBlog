@extends('client.layouts.app')

@section('title', 'Contact | thanhnguyenduyy')
@section('description', 'Get in touch - Always open for interesting projects or just a cup of coffee')

@section('content')
<!-- Contact Page -->
<section class="page page-contact active" id="page-contact">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title font-serif">Contact</h2>
            <div class="section-line"></div>
            <p class="section-subtitle font-serif italic">"Always open for interesting projects or just a cup of
                coffee."</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info">
                <p class="contact-text">
                    Have an idea or a project in mind? Reach out and let's build something exceptional together.
                </p>
                <div class="contact-links">
                    <a href="mailto:{{ $settings['contact_email'] }}" class="contact-email-link">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div>
                            <span class="contact-label">EMAIL</span>
                            <span class="contact-value">{{ $settings['contact_email'] }}</span>
                        </div>
                    </a>
                    <div class="social-links">
                        <a href="{{ $settings['social_github'] }}" class="social-link social-github">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>
                            <span>GITHUB</span>
                        </a>
                        <a href="{{ $settings['social_instagram'] }}" class="social-link social-instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                            <span>INSTA</span>
                        </a>
                        <a href="{{ $settings['social_facebook'] }}" class="social-link social-facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                </path>
                            </svg>
                            <span>FB</span>
                        </a>
                    </div>
                </div>
            </div>

            <form class="contact-form" id="contactForm" action="{{ route('client.contact.send') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-input" placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input" placeholder="Your email address">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-textarea" rows="6"
                        placeholder="Tell me about your project..."></textarea>
                </div>
                <button type="submit" class="form-submit">Send Message</button>
            </form>
        </div>
    </div>
</section>
@endsection
