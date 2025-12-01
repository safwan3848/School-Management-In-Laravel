<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        {{-- header --}}
        @include('home.header')

        {{-- Career Banner --}}
        <div class="site-section bg-image overlay">
            <div class="container text-center">
                <h1 class="text-white font-weight-bold py-5">Career</h1>
            </div>
        </div>

        {{-- Career Content --}}
        <div class="site-section">
            <div class="container">
                <div class="row">

                    <!-- Left: Jobs List -->
                    <div class="col-md-6 mb-4">
                        <h3>Available Positions</h3>
                        <ul class="list-group">
                            @forelse($jobs as $job)
                                @php
                                    $isLong = strlen($job->description) > 80;
                                @endphp

                                <li class="list-group-item mb-3">

                                    <h5>{{ $job->title }}</h5>

                                    <p>{{ $job->department ?? '-' }} | {{ $job->location ?? '-' }} | {{ $job->type }}
                                    </p>

                                    <!-- Short Description -->
                                    <p id="short-desc-{{ $job->id }}">
                                        {{ $isLong ? \Illuminate\Support\Str::limit($job->description, 50) : $job->description }}
                                    </p>

                                    <!-- Full Description (Hidden Only If Long) -->
                                    @if ($isLong)
                                        <p id="full-desc-{{ $job->id }}" style="display: none;">
                                            {{ $job->description }}
                                        </p>

                                        <a href="javascript:void(0)" onclick="toggleDescription({{ $job->id }})"
                                            id="toggle-btn-{{ $job->id }}">
                                            Read More
                                        </a>
                                    @endif

                                </li>
                            @empty
                                <li class="list-group-item">No jobs available at the moment.</li>
                            @endforelse
                        </ul>

                        <div class="mt-3">
                            {{ $jobs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                    <!-- Right: Application Form -->
                    <div class="col-md-6 mb-4">
                        <h3>Apply for a Job</h3>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('career.apply') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Personal Info -->
                            <div class="form-group">
                                <label>Name*</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Email*</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Phone*</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>

                            <!-- Job / Qualification -->
                            <div class="form-group">
                                <label>Position*</label>
                                <select name="position" class="form-control" required>
                                    <option value="">Select Position</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->title }}">{{ $job->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Highest Qualification</label>
                                <input type="text" name="highest_qualification" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Experience (Years)</label>
                                <input type="number" name="experience" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Subjects</label>
                                <input type="text" name="subjects" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Preferred Grade</label>
                                <input type="text" name="preferred_grade" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Expected Salary</label>
                                <input type="text" name="expected_salary" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Availability</label>
                                <input type="text" name="availability" class="form-control">
                            </div>

                            <!-- Documents -->
                            <div class="form-group">
                                <label>Resume (PDF/DOC)</label>
                                <input type="file" name="resume" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Other Documents</label>
                                <input type="file" name="other_docs" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Submit Application</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Job Details Modal -->
        <div class="modal fade" id="jobDetailModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="jobTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <p id="jobDescription"></p>
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
