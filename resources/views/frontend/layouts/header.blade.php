<header class="tj-header-area header-absolute">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap align-items-center">
                <div class="logo-box">
                    <a href="{{ url('/') }}">
                        <img src="{{ $sData->logo ? asset('logos/' . $sData->logo) : asset('backend/assets/images/no_image.jpg') }}" alt="" />
                    </a>
                </div>

                <div class="header-info-list d-none d-md-inline-block">
                    <ul class="ul-reset">
                        <li><a href="mailto:{{$sData->email}}">{{$sData->email}}</a></li>
                    </ul>
                </div>
                <div class="header-menu">
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
                <div class="header-button">
                    <a href="{{ url('/') }}#contact-section" class="btn tj-btn-primary">Hire me!</a>
                </div>
                <div class="menu-bar d-lg-none">
                    <button>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="tj-header-area header-2 header-sticky sticky-out">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap align-items-center">
                <div class="logo-box">
                    <a href="index.html">
                        <img src="{{ $sData->logo ? asset('logos/' . $sData->logo) : asset('backend/assets/images/no_image.jpg') }}" alt="logo" />
                    </a>
                </div>

                <div class="header-info-list d-none d-md-inline-block">
                    <ul class="ul-reset">
                        <li><a href="mailto:{{$sData->email}}">{{$sData->email}}</a></li>
                    </ul>
                </div>

                <div class="header-menu">
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

                <div class="header-button">
                    <a href="#contact-section" class="btn tj-btn-primary">Hire me!</a>
                </div>

                <div class="menu-bar d-lg-none">
                    <button>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>