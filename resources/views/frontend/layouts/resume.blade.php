<section class="resume-section" id="resume-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-header wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="section-title"><i class="flaticon-recommendation"></i> My Experience</h2>
                </div>

                <div class="resume-widget">
                    @forelse ($experiences as $experience)
                        <div class="resume-item wow fadeInLeft" data-wow-delay=".4s">
                            <div class="time">
                                {{ $experience->from_year }} - {{ $experience->to_year }}
                            </div>

                            <h3 class="resume-title">
                                {{ $experience->resume_title }}
                            </h3>

                            <div class="institute">
                                {{ $experience->institution }}
                            </div>
                        </div>
                    @empty
                        <p>No experience found!! </p>
                    @endforelse

                </div>
            </div>

            <div class="col-md-6">
                <div class="section-header wow fadeInUp" data-wow-delay=".4s">
                    <h2 class="section-title"><i class="flaticon-graduation-cap"></i> My Education</h2>
                </div>

                <div class="resume-widget">
                    @forelse ($eductions as $education)

                        <div class="resume-item wow fadeInLeft" data-wow-delay=".4s">
                            <div class="time">
                                {{ $education->from_year }} - {{ $education->to_year }}
                            </div>

                            <h3 class="resume-title">
                                {{ $education->resume_title }}
                            </h3>

                            <div class="institute">
                                {{ $education->institution }}
                            </div>
                        </div>

                    @empty

                        <p>No education found!! </p>

                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>