<!DOCTYPE html>
<html lang="en">

<head>
    {{-- css section start --}}
    @include('home.css')
    {{-- css section end --}}
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        {{-- header section start --}}
        @include('home.header')
        {{-- header section end --}}

        {{-- banner section start --}}
        @include('home.banner')
        {{-- banner section end --}}

        {{-- event section start --}}
        @include('home.event')
        {{-- event section end --}}

        {{-- our program section start --}}
        @include('home.gallery')
        {{-- our program section end --}}

        {{-- teacher section start --}}
        @include('home.teacher')
        {{-- teacher section end --}}

        {{-- Testimonials section start --}}
        @include('home.testimonials')
        {{-- Testimonials section end --}}

        {{-- choose us section start --}}
        @include('home.choose_us')
        {{-- choose us section end --}}

        {{-- contact us section start --}}
        @include('home.contact_us')
        {{-- contact us section end --}}

        {{-- FAQ section start --}}
        @include('home.faq')
        {{-- FAQ section end --}}

        {{-- footer section start --}}
        @include('home.footer')
        {{-- footer section end --}}

    </div> <!-- .site-wrap -->

    {{-- script section start --}}
    @include('home.js')
    {{-- script section end --}}
</body>

</html>
