<footer class="tj-footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-logo-box">
                    <a href="#"><img src="{{ $sData->logo ? asset('logos/' . $sData->logo) : asset('backend/assets/images/no_image.jpg') }}" alt="" /></a>
                </div>
                <div class="footer-menu">
                    <nav>
                        <ul>
                            <li><a href="{{ url('/') }}#services-section">Services</a></li>
                            <li><a href="{{ url('/') }}#works-section">Works</a></li>
                            <li><a href="{{ url('/') }}#resume-section">Resume</a></li>
                            <li><a href="{{ url('/') }}#skills-section">Skills</a></li>
                            <li><a href="{{ url('/') }}#testimonials-section">Testimonials</a></li>
                            <li><a href="{{ url('/') }}#contact-section">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="copy-text">
                    <p>&copy; {{$sData->footer_note}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>