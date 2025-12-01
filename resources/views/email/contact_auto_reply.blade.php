<div style="max-width: 650px; margin: auto; background: #ffffff; border-radius: 14px; 
            font-family: 'Segoe UI', sans-serif; padding: 40px; 
            border: 1px solid #ece6ff; box-shadow: 0 8px 28px rgba(138, 43, 226, 0.15);">

    <!-- Header -->
    <h2 style="font-size: 26px; color: #5a0fe0; text-align: center; margin-bottom: 25px;">
        Hello {{ $contact->first_name }},
    </h2>

    <!-- Intro -->
    <p style="font-size: 16px; color: #5e5e5e; line-height: 1.6;">
        Thank you for contacting us! 💜  
        We’ve received your enquiry and our team will reach out to you very soon.
    </p>

    <!-- Details Box -->
    <div style="background: #f9f4ff; padding: 20px; border-left: 5px solid #7c2ae8; 
                border-radius: 10px; margin: 25px 0;">
        <h3 style="color: #7c2ae8; font-size: 18px; margin: 0 0 12px 0;">
            Your Details
        </h3>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Subject:</strong> {{ $contact->subject }}
        </p>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Phone Number:</strong> {{ $contact->phone_number }}
        </p>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Enquiry Type:</strong> {{ $contact->enquiry_type }}
        </p>
    </div>

    <!-- Message Section -->
    <div style="background: #f3eaff; padding: 20px; border-radius: 10px; 
                border: 1px solid #e4d7ff;">
        <h3 style="color: #5a0fe0; font-size: 18px; margin-bottom: 10px;">
            Your Message
        </h3>
        <p style="font-size: 15px; color: #555; line-height: 1.6;">
            {{ $contact->message }}
        </p>
    </div>

    <!-- Footer -->
    <p style="margin-top: 35px; font-size: 15px; color: #7c2ae8; text-align: center;">
        Regards,<br>
        <strong>OneSchool Team</strong>
    </p>

</div>
