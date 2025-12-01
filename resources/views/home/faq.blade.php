<div class="site-section bg-light" id="faq-section">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="lead">Find quick answers to common questions asked by parents and students.</p>
            </div>
        </div>

        <div class="accordion" id="faqAccordion">

            @foreach ($faqs as $faq)
                <div class="card faq-card mb-3">
                    <div class="faq-header" id="heading{{ $faq->id }}" data-toggle="collapse"
                        data-target="#collapse{{ $faq->id }}" aria-expanded="true"
                        aria-controls="collapse{{ $faq->id }}">
                        
                        <span class="faq-question">
                            <i class="fas fa-question-circle text-primary mr-2"></i>
                            {{ $faq->question }}
                        </span>

                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>

                    <div id="collapse{{ $faq->id }}" class="collapse"
                        aria-labelledby="heading{{ $faq->id }}" data-parent="#faqAccordion">
                        <div class="faq-body">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
