<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('home.css')
</head>

<body>
    <div class="event-container">
        <div class="event-card">
            <img src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->title }}" class="event-image">
            <div class="event-content">
                <h1 class="event-title">{{ $event->title }}</h1>
                <p class="event-info"><strong>Date & Time:</strong>
                    {{ \Carbon\Carbon::parse($event->event_datetime)->format('d M Y h:i A') }}</p>
                <p class="event-info"><strong>Price:</strong> {{ $event->price ?? 'Free' }}</p>
                <p class="event-info"><strong>Attendees:</strong> {{ $event->attendees }}</p>
                <p class="event-description">{{ $event->description }}</p>
                <a href="{{ route('home') }}" class="btn-register">Back Event</a>
            </div>
        </div>
    </div>
</body>

</html>
