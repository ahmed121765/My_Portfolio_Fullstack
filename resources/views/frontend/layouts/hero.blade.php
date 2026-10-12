<section class="hero-section d-flex align-items-center" id="intro">
    <div class="intro_text">
        <svg viewBox="0 0 1320 300">
            <text x="50%" Y="50%" text-anchor="middle">HI</text>
        </svg>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="hero-content-box">
                    <span class="hero-sub-title">{{ $hero->name }}</span>
                    <h1 class="hero-title">{{ $hero->profession }}</h1>

                    <div class="hero-image-box d-md-none text-center">
                        <img src="{{ $hero->photo ? asset('heros/' . $hero->photo) : asset('backend/assets/images/no-img-avatar.png') }}"
                            alt="" />
                    </div>

                    <p class="lead">
                        {{ $hero->short_description }}
                    </p>
                    <div class="button-box d-flex flex-wrap align-items-center">
                        @if($hero->resume)
                            <a href="{{ asset('resumes/' . $hero->resume) }}" class="btn tj-btn-secondary" download>
                                Download CV
                                <i class="flaticon-download"></i>
                            </a>
                        @endif
                        <ul class="ul-reset social-icons">
                            <li>
                                <a href="{{ $hero->twitter_url }}"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="{{ $hero->youtube_url }}"><i class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="{{ $hero->linkin_url }}"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="{{ $hero->github_url }}"><i class="fa-brands fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <div class="hero-image-box text-center">
                    <img src="{{ $hero->photo ? asset('heros/' . $hero->photo) : asset('backend/assets/images/no-img-avatar.png') }}" alt="" />
                </div>
            </div>
        </div>
        <div class="funfact-area">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                        <div class="number"><span class="odometer" data-count="{{ $hero->YOE }}">0</span></div>
                        <div class="text">Years of <br />Experience</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                        <div class="number"><span class="odometer" data-count="{{ $hero->PC }}">0</span>+</div>
                        <div class="text">Project <br />Completed</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                        <div class="number"><span class="odometer" data-count="{{ $hero->HC }}">0</span>K</div>
                        <div class="text">Happy <br />Clients</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>