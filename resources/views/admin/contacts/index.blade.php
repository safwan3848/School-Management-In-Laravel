@extends('admin.layout')

@section('title', 'Contact Us List')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Contact Us List</h6>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Phone Number</th>
                            <th>Enquiry Type</th>
                            <th>Message</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>
                                    <select class="form-control enquiryTypeSelect" data-id="{{ $contact->id }}">
                                        <option value="Admission Enquiry"
                                            {{ $contact->enquiry_type == 'Admission Enquiry' ? 'selected' : '' }}>
                                            Admission Enquiry
                                        </option>
                                        <option value="General Enquiry"
                                            {{ $contact->enquiry_type == 'General Enquiry' ? 'selected' : '' }}>
                                            General Enquiry
                                        </option>
                                    </select>
                                </td>
                                <td>{{ Str::limit($contact->message, 50) }}</td>

                                <td>
                                    <a href="{{ route('contact.delete', $contact->id) }}"
                                        onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger">No Contact Us Data found!</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
    <div class="mt-3">
        {{ $contacts->links('pagination::bootstrap-5') }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on('change', '.enquiryTypeSelect', function() {
            let id = $(this).data('id');
            let enquiry_type = $(this).val();

            $.ajax({
                url: "{{ route('contact.updateEnquiryType') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    enquiry_type: enquiry_type
                },
                success: function(response) {
                    if (response.status) {
                        alert("Enquiry Type updated successfully!");
                    } else {
                        alert("Failed to update!");
                    }
                }
            });
        });
    </script>
@endsection
