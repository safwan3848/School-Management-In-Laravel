<div
    style="max-width: 650px; margin: auto; background: #ffffff; border-radius: 14px;
            font-family: 'Segoe UI', sans-serif; padding: 40px;
            border: 1px solid #ece6ff; box-shadow: 0 8px 28px rgba(138, 43, 226, 0.15);">

    <!-- Header -->
    <h2 style="font-size: 26px; color: #5a0fe0; text-align: center; margin-bottom: 25px;">
        New Career Application Received 📩
    </h2>

    <!-- Intro -->
    <p style="font-size: 16px; color: #5e5e5e; line-height: 1.6;">
        A new candidate has submitted a job application.
        Below are the details submitted by the applicant.
    </p>

    <!-- Applicant Details Box -->
    <div
        style="background: #f9f4ff; padding: 20px; border-left: 5px solid #7c2ae8;
                border-radius: 10px; margin: 25px 0;">
        <h3 style="color: #7c2ae8; font-size: 18px; margin: 0 0 12px 0;">
            Applicant Details
        </h3>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Name:</strong> {{ $career->name }}
        </p>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Email:</strong> {{ $career->email }}
        </p>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Phone:</strong> {{ $career->phone }}
        </p>

        @if ($career->dob)
            <p style="margin: 6px 0; font-size: 15px; color: #555;">
                <strong>DOB:</strong> {{ $career->dob }}
            </p>
        @endif

        @if ($career->gender)
            <p style="margin: 6px 0; font-size: 15px; color: #555;">
                <strong>Gender:</strong> {{ $career->gender }}
            </p>
        @endif

        @if ($career->address)
            <p style="margin: 6px 0; font-size: 15px; color: #555;">
                <strong>Address:</strong> {{ $career->address }}
            </p>
        @endif
    </div>

    <!-- Job & Qualification Section -->
    <div
        style="background: #f3eaff; padding: 20px; border-radius: 10px;
                border: 1px solid #e4d7ff; margin-bottom: 20px;">
        <h3 style="color: #5a0fe0; font-size: 18px; margin-bottom: 10px;">
            Job & Qualification Details
        </h3>

        @if ($career->position)
            <p style="font-size: 15px; color: #555;"><strong>Position:</strong> {{ $career->position }}</p>
        @endif

        @if ($career->highest_qualification)
            <p style="font-size: 15px; color: #555;"><strong>Qualification:</strong>
                {{ $career->highest_qualification }}</p>
        @endif

        @if ($career->experience)
            <p style="font-size: 15px; color: #555;"><strong>Experience:</strong> {{ $career->experience }} years</p>
        @endif

        @if ($career->subjects)
            <p style="font-size: 15px; color: #555;"><strong>Subjects:</strong> {{ $career->subjects }}</p>
        @endif

        @if ($career->preferred_grade)
            <p style="font-size: 15px; color: #555;"><strong>Preferred Grade:</strong> {{ $career->preferred_grade }}
            </p>
        @endif

        @if ($career->expected_salary)
            <p style="font-size: 15px; color: #555;"><strong>Expected Salary:</strong> {{ $career->expected_salary }}
            </p>
        @endif

        @if ($career->availability)
            <p style="font-size: 15px; color: #555;"><strong>Availability:</strong> {{ $career->availability }}</p>
        @endif
    </div>

    <!-- Documents -->
    <h3 style="color: #5a0fe0; font-size: 18px; margin: 20px 0 10px;">
        Documents
    </h3>

    <ul style="list-style: none; padding: 0; font-size: 15px; color: #555;">
        <li>
            <strong>Resume:</strong>
            <a href="{{ asset('uploads/career/resume/' . $career->resume_path) }}" target="_blank">
                Download
            </a>
        </li>

        @if ($career->photo_path)
            <li>
                <strong>Photo:</strong>
                <a href="{{ asset('uploads/career/photo/' . $career->photo_path) }}" target="_blank">
                    View
                </a>
            </li>
        @endif

        @if ($career->other_docs_path)
            <li>
                <strong>Other Document:</strong>
                <a href="{{ asset('uploads/career/otherdoc/' . $career->other_docs_path) }}" target="_blank">
                    Download
                </a>
            </li>
        @endif
    </ul>

    <!-- Message -->
    @if ($career->message)
        <div
            style="margin-top: 20px; background: #f9f4ff; padding: 20px;
                border-radius: 10px; border-left: 5px solid #7c2ae8;">
            <h3 style="color: #7c2ae8; font-size: 18px;">Applicant Message</h3>
            <p style="font-size: 15px; color: #555; line-height: 1.6;">
                {{ $career->message }}
            </p>
        </div>
    @endif

    <!-- Footer -->
    <p style="margin-top: 35px; font-size: 15px; color: #7c2ae8; text-align: center;">
        Regards,<br>
        <strong>OneSchool Team</strong>
    </p>
</div>
