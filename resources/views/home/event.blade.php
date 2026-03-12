        <div class="site-section courses-title" id="events-section">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                        <h2 class="section-title">Events</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">

            <div class="container">
                <div class="row">
                    <div class="owl-carousel col-12 nonloop-block-14">
                        @foreach ($events as $event)
                            <div class="course bg-white h-100 align-self-stretch">
                                <figure class="m-0">
                                    <a href="{{ asset('uploads/event/' . $event->image) }}" class="image-popup">
                                        <img src="{{ asset('uploads/events/' . $event->image) }}"
                                            alt="{{ $event->title ?? 'Gallery Image' }}" class="img-fluid">
                                    </a>
                                </figure>
                                <div class="course-inner-text py-4 px-4">
                                    <span class="course-price">{{ $event->price ?? 'Free' }}</span>
                                    <div class="meta">
                                        <span class="icon-clock-o"></span>
                                        {{ \Carbon\Carbon::parse($event->event_datetime)->format('h:i A') }} /
                                        {{ \Carbon\Carbon::parse($event->event_datetime)->format('d M Y') }}
                                    </div>
                                    <h3><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></h3>
                                    <p>{{ $event->description }}</p>
                                </div>
                                <div class="d-flex border-top stats">
                                    <div class="py-3 px-4"><span class="icon-users"></span> {{ $event->attendees }}
                                        attendees</div>
                                    <div class="py-3 px-4 w-25 ml-auto border-left">
                                        <span class="icon-chat"></span> Active
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-7 text-center">
                        <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                        <button class="customNextBtn btn btn-primary m-1">Next</button>
                    </div>
                </div>
            </div>
        </div>
