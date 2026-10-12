<!DOCTYPE html>
<html class="no-js" lang="en">

@include('frontend.layouts.head')

<body>
    <!-- Preloader Area Start -->
    @include('frontend.layouts.preloader')
    <!-- Preloader Area End -->

    <!-- start: Back To Top -->
    @include('frontend.layouts.backToTop')
    <!-- end: Back To Top -->

    <!-- HEADER START -->
    @include('frontend.layouts.header')
    <!-- HEADER END -->

    <main class="site-content" id="content">

        <!-- START: Breadcrumb Area -->
        <section class="breadcrumb_area" data-bg-image="{{ asset('frontend/assets/img/breadcrumb/breadcrumb-bg.jpg') }}"
            data-bg-color="#140C1C">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb_content d-flex flex-column align-items-center">
                            <h2 class="title wow fadeInUp" data-wow-delay=".3s" style="text-align: center">
                                {{$post->post_title}}
                            </h2>
                            <div class="breadcrumb_navigation wow fadeInUp" data-wow-delay=".5s">
                                <span><a href="/">Home</a></span>
                                <i class="far fa-long-arrow-right"></i>
                                <span class="current-item">Blog Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Breadcrumb Area -->

        <!-- START: Blog Section -->
        <section class="full-width tj-post-details__area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tj-post-details__container">
                            <article class="tj-single__post">
                                <div class="tj-post__thumb">
                                    <img src="{{ $post->photo ? asset('blogs/' . $post->photo) : asset('backend/assets/images/no_image.jpg') }}"
                                        style="width: 850px; height: 400px;" alt="" />

                                    <a href="#" class="category">Tutorial</a>
                                </div>

                                <div class="tj-post__content">
                                    <div class="tj-post__meta entry-meta">
                                        <span><i class="fa-light fa-user"></i> <a href="#">By
                                                {{$post->author->name}}</a></span>
                                        <span><i class="fa-light fa-calendar-days"></i>
                                            {{$post->created_at->format('D M,Y')}}</span>
                                        <span><i class="fa-light fa-comments"></i><a href="#comments">
                                                {{ $commentsCount }} Comments
                                            </a></span>
                                    </div>
                                    <h3 class="tj-post__title entry-title">{{$post->post_title}}</h3>

                                    <div class="tj-post__content">
                                        {!! $post->post_description !!}
                                    </div>
                                </div>
                            </article>
                            @php
                                $tags = explode(',', $post->post_tags)
                            @endphp
                            <!-- post tags & social share -->
                            <div class="single-post_tag_share">
                                <!-- post tags -->
                                <div class="tj_tag">
                                    <h4 class="tag__title">Tags:</h4>
                                    <div class="tagcloud">
                                        @foreach ($tags as $tag)
                                            <a href="#">{{$tag}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="share_link">
                                    <a href="#" target="_blank" class="facebook" title="Share this on Facebook"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#" class="twitter" title="Share this on Twitter" target="_blank"><i
                                            class="fa-brands fa-x-twitter"></i></a>
                                    <a href="#" class="linkedin" title="Share this on Linkedin" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#" class="pinterest" title="Pin this Post" target="_blank"><i
                                            class="fa-brands fa-pinterest-p"></i></a>
                                </div>
                            </div>



                            <!-- comments area -->
                            <div class="tj-comments__container">
                                <div class="tj-comments__wrap">
                                    <div class="tj-comment__title">
                                        <h3>{{ $commentsCount }} Comments</h3>
                                    </div>

                                    <div class="tj-latest__comments">
                                        <ul>
                                            @forelse($comments as $comment)
                                                <li class="tj__comment">
                                                    <div class="tj-comment__wrap">
                                                        <div class="comment__avatar">
                                                            <img alt=""
                                                                src="{{asset('backend/assets/images/no-img-avatar.png') }}" />
                                                        </div>
                                                        <div class="comment__text">
                                                            <div class="avatar__name">
                                                                <h5><a href="#">{{ $comment->user_name }}</a></h5>
                                                                <span>{{ $comment->created_at?->format('M D, Y') ?? 'N/A' }}</span>
                                                            </div>
                                                            <p>

                                                                {{ $comment->comment}}
                                                            </p>

                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <p>No experience found!! </p>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>

                                @include('frontend.blog.comment')
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="tj_main_sidebar">
                            <div class="sidebar_widget widget_search wow fadeInUp" data-wow-delay=".3s">
                                <div class="tj-widget__search form_group">
                                    <form class="search-form" action="#" method="get">
                                        <input type="search" id="search" name="search" placeholder="Search..." />
                                        <button class="search-btn" type="submit"><i
                                                class="fa-light fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="sidebar_widget tj_recent_posts wow fadeInUp" data-wow-delay=".3s">
                                <div class="widget_title">
                                    <h3 class="title">Recent post</h3>
                                </div>

                                <ul>
                                    @foreach ($rposts as $rpost)

                                        <li>
                                            <div class="recent-post_thumb">
                                                <a href="blog-details.html">
                                                    <img src="{{ $rpost->photo ? asset('blogs/' . $rpost->photo) : asset('backend/assets/images/no_image.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>

                                            <div class="recent-post_content">
                                                <div class="tj-post__meta entry-meta">
                                                    <span><i
                                                            class="fa-light fa-calendar-days"></i>{{$rpost->created_at->format('D M,Y')}}</span>
                                                    <span><i class="fa-light fa-comments"></i><a href="#">
                                                            ({{ $commentsCount }} Comments)</a></span>
                                                </div>
                                                <h4 class="recent-post_title">
                                                    <a
                                                        href="/post/details/{{ $rpost->post_slug }}">{{Illuminate\Support\Str::limit($rpost->post_title, 30)}}</a>
                                                </h4>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>


                            <div class="sidebar_widget widget_tag_cloud wow fadeInUp" data-wow-delay=".3s">
                                <div class="widget_title">
                                    <h3 class="title">Popular tag</h3>
                                </div>

                                <div class="tagcloud">
                                    @foreach ($tags as $tag)

                                        <a href="#">{{$tag}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END: Blog Section -->

    </main>

    <!-- FOOTER AREA START -->
    @include('frontend.layouts.footer')
    <!-- FOOTER AREA END -->

    @include('frontend.layouts.scripts')
</body>

</html>