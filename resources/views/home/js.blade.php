<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>


<script src="{{ asset('frontend/js/main.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {
        $('.gallery-slider').owlCarousel({
            loop: true,
            margin: 15,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    });
</script>

<script>
    function toggleDescription(id) {
        const shortDesc = document.getElementById('short-desc-' + id);
        const fullDesc = document.getElementById('full-desc-' + id);
        const btn = document.getElementById('toggle-btn-' + id);

        if (fullDesc.style.display === "none") {
            fullDesc.style.display = "block";
            shortDesc.style.display = "none";
            btn.innerText = "Read Less";
        } else {
            fullDesc.style.display = "none";
            shortDesc.style.display = "block";
            btn.innerText = "Read More";
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.top-management-slider').owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            smartSpeed: 700,
            dots: true,
            nav: false,
            responsive: {
                0: { items: 1 },
                576: { items: 1 },
                768: { items: 2 },
                1200: { items: 3 }
            }
        });
    });
</script>