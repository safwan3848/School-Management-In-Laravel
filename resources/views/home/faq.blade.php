<div class="site-section" id="faq-section" style="padding: 80px 0; background: #f9fafb;">
    <div class="container">

        <!-- Section Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="section-title" data-aos="fade-up">Frequently Asked Questions</h2>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">
                    Find quick answers to common questions asked by parents and students.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($faqs as $key => $faq)
                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 50 }}">
                    <div class="faq-card-flip">
                        <div class="faq-card-inner">
                            <!-- Front Side -->
                            <div class="faq-card-front">
                                <i class="fas fa-question-circle fa-2x text-white mb-3"></i>
                                <h5 class="text-white">{{ $faq->question }}</h5>
                                <span class="read-more">Click to view answer</span>
                            </div>
                            <!-- Back Side -->
                            <div class="faq-card-back">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
