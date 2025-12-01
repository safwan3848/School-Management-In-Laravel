<div class="site-section position-relative" id="top-management-section" style="background: linear-gradient(135deg, #f0f4f8, #d9e2ec); padding: 80px 0;">
    <div class="container position-relative">

        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 mb-5 text-center" data-aos="fade-up">
                <h2 class="section-title">Top Management</h2>
                <p class="mb-5">Meet our respected school leadership team.</p>
            </div>
        </div>

        <!-- Slider -->
        <div class="owl-carousel top-management-slider">

            @foreach ($management as $item)
                <div class="management-card text-center">

                    <div class="photo-wrapper">
                        @if ($item->photo)
                            <img src="{{ asset('uploads/top_management/' . $item->photo) }}"
                                alt="{{ $item->name }}" class="photo">
                        @else
                            <img src="{{ asset('frontend/images/default-user.jpg') }}"
                                class="photo">
                        @endif
                    </div>

                    <h3 class="name">{{ $item->name }}</h3>
                    <p class="designation">{{ $item->designation }}</p>
                    <p class="message">{{ $item->message }}</p>
                </div>
            @endforeach

        </div>

    </div>
</div>
