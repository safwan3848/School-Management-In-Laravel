<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        {{-- header --}}
        @include('home.header')

        {{-- About Banner --}}
        <div class="site-section bg-image overlay">
            <div class="container text-center">
                <h1 class="text-white font-weight-bold py-5">About Us</h1>
            </div>
        </div>

        {{-- About Content --}}
        <div class="site-section">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-6 mb-4">
                        <img src="{{ asset('frontend/images/about_img.png') }}" class="img-fluid rounded shadow">
                    </div>

                    <div class="col-md-6">
                        <h2>Who We Are</h2>
                        <p class="lead text-muted">
                            We are a dedicated educational institution committed to nurturing students with
                            knowledge, creativity and discipline.
                        </p>

                        <p>
                            With experienced faculty, modern learning environments, and a strong educational
                            approach, we strive to bring out the best in every child.
                        </p>

                        <ul class="list-unstyled">
                            <li>✔ Experienced & Qualified Staff</li>
                            <li>✔ Student-Centered Learning</li>
                            <li>✔ Modern Infrastructure & Facilities</li>
                            <li>✔ Sports, Culture & Extra Activities</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        {{-- Mission & Vision --}}
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <div class="p-4 bg-white rounded shadow">
                            <h3>🎯 Our Mission</h3>
                            <p>
                                To provide excellent education that empowers students with knowledge, values,
                                and life skills.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="p-4 bg-white rounded shadow">
                            <h3>🌟 Our Vision</h3>
                            <p>
                                To be a leading educational institution recognized for innovation, discipline
                                and student success.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Why Choose Us --}}
        <div class="site-section">
            <div class="container text-center">
                <h2>Why Choose Us?</h2>
                <p class="text-muted mb-5">A perfect balance of education, discipline and creativity.</p>

                <div class="row">

                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded shadow">
                            <h4>🏫 Modern Infrastructure</h4>
                            <p>Smart classrooms, labs, library & safe environment.</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded shadow">
                            <h4>👨‍🏫 Expert Teachers</h4>
                            <p>Highly qualified & experienced educators.</p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="p-4 rounded shadow">
                            <h4>🎨 Holistic Development</h4>
                            <p>Sports, arts, cultural and extra activities.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- footer --}}
        @include('home.footer')

    </div>

    @include('home.js')
</body>

</html>
