<div style="font-family: 'Segoe UI', sans-serif; background:#eefaf8; padding:28px;">
    <div style="max-width:650px; margin:auto; background:#ffffff; border-radius:18px; padding:35px; 
                box-shadow:0 12px 40px rgba(0,0,0,0.10);">

        <h2 style="color:#007f7b; text-align:center; margin:0 0 20px; 
                   font-size:28px; letter-spacing:0.5px; font-weight:700;">
            New Contact Message
        </h2>

        <div style="padding-top:10px;">

            <p style="font-size:15px; color:#333; margin:10px 0;">
                <strong style="color:#007f7b;">Name:</strong> 
                {{ $contact->first_name }} {{ $contact->last_name }}
            </p>

            <p style="font-size:15px; color:#333; margin:10px 0;">
                <strong style="color:#007f7b;">Email:</strong> 
                {{ $contact->email }}
            </p>

            <p style="font-size:15px; color:#333; margin:10px 0;">
                <strong style="color:#007f7b;">Subject:</strong> 
                {{ $contact->subject }}
            </p>

            <p style="font-size:15px; color:#333; margin:10px 0;">
                <strong style="color:#007f7b;">Phone Number:</strong> 
                {{ $contact->phone_number }}
            </p>

            <p style="font-size:15px; color:#333; margin:10px 0;">
                <strong style="color:#007f7b;">Enquiry Type:</strong> 
                {{ $contact->enquiry_type }}
            </p>

            <p style="margin-top:25px; font-size:16px; color:#007f7b; font-weight:600;">
                Message:
            </p>

            <div style="
                background: linear-gradient(to right, #e8fffb, #ffffff);
                padding:20px; 
                border-radius:14px; 
                color:#555; 
                line-height:1.6;
                box-shadow:0 4px 18px rgba(0, 127, 123, 0.15);
            ">
                {{ $contact->message }}
            </div>

            <p style="margin-top:35px; color:#006963; font-size:15px;">
                Warm Regards,<br>
                <strong>OneSchool Team</strong>
            </p>

        </div>
    </div>
</div>
