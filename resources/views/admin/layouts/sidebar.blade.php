<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            AG-<span>Ahmed</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a href="{{ route('hero.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="star"></i>
                    <span class="link-title">Special pages</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Service" role="button" aria-expanded="false"
                    aria-controls="Service">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">My Quantity Services</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Service">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('services.index') }}" class="nav-link">All Service</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('services.create')}}" class="nav-link">Add Services</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#works" role="button" aria-expanded="false"
                    aria-controls="works">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">My Recent Works</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="works">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('portfolio.add_work') }}" class="nav-link">Add Work</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('portfolio.all_recent_works') }}" class="nav-link">Portoflio</a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#mySkill" role="button" aria-expanded="false"
                    aria-controls="mySkill">
                    <i class="link-icon" data-feather="cpu"></i>
                    <span class="link-title">My Skills</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="mySkill">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.skill') }}" class="nav-link">Add Skill</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.skills') }}" class="nav-link">All Skill</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Testinomial" role="button" aria-expanded="false"
                    aria-controls="Testinomial">
                    <i class="link-icon" data-feather="message-circle"></i>
                    <span class="link-title">My Testinomials</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Testinomial">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('testimonial.create') }}" class="nav-link">Add Testinomial</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('testimonial.index') }}" class="nav-link">All Testinomials</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Blogs" role="button" aria-expanded="false"
                    aria-controls="Blogs">
                    <i class="link-icon" data-feather="edit-3"></i>
                    <span class="link-title">Blogs</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Blogs">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('blog.create') }}" class="nav-link">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.index') }}" class="nav-link">All Post</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('experience.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="award"></i>
                    <span class="link-title">My Experience</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('education.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">My Education</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('commentBackend.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Comments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact.admin') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Contacts</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Site Settings</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="../demo1/dashboard.html">
                <img src="{{ asset('backend/assets/images/screenshots/light.jpg') }}" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item active" href="../demo2/dashboard.html">
                <img src="{{ asset('backend/assets/images/screenshots/dark.jpg') }}" alt="light theme">
            </a>
        </div>
    </div>
</nav>