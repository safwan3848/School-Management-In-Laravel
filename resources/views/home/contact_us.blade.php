<div class="site-section bg-light" id="contact-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="section-title mb-3">Message Us</h2>
                <p class="mb-5">Natus totam voluptatibus animi aspernatur ducimus quas obcaecati mollitia
                    quibusdam temporibus culpa dolore molestias blanditiis consequuntur sunt nisi.</p>

                <form method="POST" action="{{ route('contact.store') }}" data-aos="fade">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 mb-3 mb-lg-0">
                            <input type="text" name="first_name" class="form-control" placeholder="First name"
                                required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="last_name" class="form-control" placeholder="Last name"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number"
                                required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <select name="enquiry_type" class="form-control" required>
                                <option value="">-- Select Enquiry Type --</option>
                                <option value="Admission Enquiry">Admission Enquiry</option>
                                <option value="General Enquiry">General Enquiry</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Write your message here."
                                required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill"
                                value="Send Message">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
