<div id="testimonialCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
    <ol class="carousel-indicators">
        @foreach ($testimonials as $i => $t)
            <li data-target="#testimonialCarousel" data-slide-to="{{ $i }}"
                class="{{ $i === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach ($testimonials as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="site-section bg-image overlay"
                    style="background-image: url('{{ asset('uploads/testimonials/backgroundImage/' . ($item->background_image ?? '')) }}');">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-8 text-center testimony py-5">
                                @if ($item->image)
                                    <img src="{{ asset('uploads/testimonials/userImage/' . $item->image) }}"
                                        alt="User Image" class="img-fluid w-25 mb-4 rounded-circle">
                                @endif
                                <h3 class="mb-4">{{ $item->title }}</h3>
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

    <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Bootstrap 4 JS (include popper and jquery if not present) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
