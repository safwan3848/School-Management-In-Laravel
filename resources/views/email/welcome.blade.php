<div
    style="max-width: 650px; margin: auto; background: #ffffff; border-radius: 14px;
            font-family: 'Segoe UI', sans-serif; padding: 40px;
            border: 1px solid #ece6ff; box-shadow: 0 8px 28px rgba(138, 43, 226, 0.15);">

    <h2 style="font-size: 26px; color: #5a0fe0; text-align: center; margin-bottom: 25px;">
        Welcome to OneSchool 🎉
    </h2>

    <p style="font-size: 16px; color: #5e5e5e; line-height: 1.6;">
        Dear <strong>{{ $user->name }}</strong>,<br><br>
        Thank you for registering with us! We’re excited to have you as part of our online community.
        Below is your registration information:
    </p>

    <div
        style="background: #f9f4ff; padding: 20px; border-left: 5px solid #7c2ae8;
                border-radius: 10px; margin: 25px 0;">
        <h3 style="color: #7c2ae8; font-size: 18px; margin: 0 0 12px 0;">
            Account Details
        </h3>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Name:</strong> {{ $user->name }}
        </p>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Email:</strong> {{ $user->email }}
        </p>

        <p style="margin: 6px 0; font-size: 15px; color: #555;">
            <strong>Role:</strong> {{ ucfirst($user->role) }}
        </p>
    </div>

    <p style="margin-top: 20px; font-size: 15px; color: #555;">
        If you have any questions, feel free to contact us anytime!
    </p>

    <p style="margin-top: 35px; font-size: 15px; color: #7c2ae8; text-align: center;">
        Regards,<br>
        <strong>OneSchool Team</strong>
    </p>
</div>
