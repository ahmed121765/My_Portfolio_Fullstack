<section class="blog-section" id="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">Recent Blogs</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                        We put your ideas and thus your wishes in the form of a unique web project that inspires
                        you and
                        you customers.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="blog-thumb">
                            <a href="/post/details/{{ $blog->post_slug }}">
                                <img src="{{ $blog->photo ? asset('blogs/' . $blog->photo) : asset('backend/assets/images/no_image.jpg') }}"
                                    alt="Blog" />
                            </a>
                            <a href="#" class="category">Tutorial</a>
                        </div>

                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul class="ul-reset">
                                    <li><i class="fa-light fa-calendar-days"></i> {{$blog->created_at->format('D M,Y')}}
                                    </li>
                                    <a href="{{ url('/post/details/' . $blog->post_slug) }}" style="color: #8750f7; text-decoration: none;">
                                        {{ $blog->comments_count }} Comments
                                    </a>
                                </ul>
                            </div>
                            <h3 class="blog-title"><a
                                    href="/post/details/{{ $blog->post_slug }}">{{ Illuminate\Support\Str::limit($blog->post_title, 40) }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @empty
                <p>No experience found!! </p>
            @endforelse
        </div>
    </div>
</section>