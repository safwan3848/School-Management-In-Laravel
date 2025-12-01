<div class="site-section" id="gallery-section">
    <div class="container">

        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up">
                <h2 class="section-title">Our Gallery</h2>
                <p>Explore moments captured from our school events and activities.</p>
            </div>
        </div>

        <!-- Owl Carousel Slider -->
        <div class="owl-carousel gallery-slider">

            @foreach ($galleries as $gallery)
                @if ($gallery->status == 1)
                    <div class="item">
                        <a href="{{ asset($gallery->image) }}" class="image-popup">
                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
                        </a>
                    </div>
                @endif
            @endforeach

            @if ($galleries->where('status', 1)->count() == 0)
                <p class="text-center">No gallery images available</p>
            @endif

        </div>

    </div>
</div>
