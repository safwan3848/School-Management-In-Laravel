<div id="heroBanner" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">

        @foreach ($banners as $key => $banner)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <div class="banner-slide"
                    style="background-image: url('{{ asset('uploads/banner/' . $banner->image) }}');">
                    <div class="banner-overlay"></div>
                </div>
            </div>
        @endforeach

    </div>

    <a class="carousel-control-prev" href="#heroBanner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>

    <a class="carousel-control-next" href="#heroBanner" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
