<div id="heroBanner" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner">

        @foreach ($banners as $key => $banner)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                <div
                    style="
                height: 650px;
                position: relative;
                background-image: url('{{ asset('uploads/banner/' . $banner->image) }}');
                background-size: contain;
                background-position: center;
                background-repeat: no-repeat;
                background-color: #000;
            ">

                    <div
                        style="
                    position: absolute;
                    left: 0;
                    top: 0;
                    height: 100%;
                    width: 100%;
                    background: linear-gradient(to right, rgba(0,0,0,0.6), transparent);
                    display: flex;
                    align-items: center;
                ">
                    </div>
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
