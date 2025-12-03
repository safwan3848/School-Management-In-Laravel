<div id="testimonialCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">

    {{-- Indicators --}}
    <ol class="carousel-indicators">
        @foreach ($testimonials as $i => $t)
            <li data-target="#testimonialCarousel" data-slide-to="{{ $i }}"
                class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    {{-- Carousel Items --}}
    <div class="carousel-inner">
        @foreach ($testimonials as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="site-section bg-image overlay"
                    style="background-image: url('{{ $item->background_image
                        ? asset('uploads/testimonials/backgroundImage/' . $item->background_image)
                        : asset('default-background.jpg') }}');">

                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-8 text-center testimony py-5">

                                {{-- User Image --}}
                                @if ($item->image)
                                    <img src="{{ asset('uploads/testimonials/userImage/' . $item->image) }}"
                                        alt="{{ $item->title }}" class="img-fluid w-25 mb-4 rounded-circle"
                                        loading="lazy">
                                @endif

                                {{-- Title --}}
                                <h3 class="mb-4">{{ $item->title }}</h3>

                                {{-- Description --}}
                                <blockquote>
                                    <p>&ldquo; {{ $item->description }} &rdquo;</p>
                                </blockquote>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Controls --}}
    <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>
