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
        <!-- HERO SECTION START -->
        @include('frontend.layouts.hero')
        <!-- HERO SECTION END -->

        <!-- SERVICES SECTION START -->
        @include('frontend.layouts.services')
        <!-- SERVICES SECTION END -->

        <!-- start: Service Popup -->
        @include('frontend.layouts.servicePopup')
        <!-- end: Service Popup -->

        <!-- PORTFOLIO SECTION START -->
        @include('frontend.layouts.portfolio')
        <!-- PORTFOLIO SECTION END -->

        <!-- start: Portfolio Popup -->
        @include('frontend.layouts.portfolioPopup')
        <!-- end: Portfolio Popup -->

        <!-- RESUME SECTION START -->
        @include('frontend.layouts.resume')
        <!-- RESUME SECTION END -->

        <!-- SKILLS SECTION START -->
        @include('frontend.layouts.skills')
        <!-- SKILLS SECTION END -->

        <!-- TESTIMONIAL SECTION START -->
        @include('frontend.layouts.testimonial')
        <!-- TESTIMONIAL SECTION END -->

        <!-- BLOG SECTION STAR -->
        @include('frontend.layouts.blog')
        <!-- BLOG SECTION END -->

        <!-- CONTACT SECTION START -->
        @include('frontend.layouts.contact')
        <!-- CONTACT SECTION END -->

        
    </main>

    <!-- FOOTER AREA START -->
    @include('frontend.layouts.footer')
    <!-- FOOTER AREA END -->

    @include('frontend.layouts.scripts')
</body>

</html>