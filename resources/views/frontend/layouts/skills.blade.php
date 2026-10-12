<section class="skills-section" id="skills-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Skills</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        We put your ideas and thus your wishes in the form of a unique web project that inspires
                        you and
                        you customers.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="skills-widget d-flex flex-wrap justify-content-center align-items-center">
                    @forelse ($skills as $skill)
                        <div class="skill-item wow fadeInUp" data-wow-delay=".3s">
                            <div class="skill-inner">
                                <div class="icon-box">
                                    <img src="{{ $skill->icon ? asset('skills/' . $skill->icon) : asset('backend/assets/images/no_image.jpg') }}"
                                        alt="Skill" />
                                </div>
                                <div class="number">{{ $skill->exp_level }}%</div>
                            </div>
                            <p>{{ $skill->technology_name }}</p>
                        </div>
                    @empty
                        <p>No skill found!!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>