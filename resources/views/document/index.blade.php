@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Appointment</div>
                @resident
                    <button class="btn btn-primary btn-hover" data-bs-target="#createModal" data-bs-toggle="modal">
                        Request Document
                    </button>
                @endresident
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    {{-- CREATE REQUEST DOCUMENT --}}
    @include('document.modals.create')

    {{-- ACCEPT REQUEST DOCUMENT --}}
    @include('document.modals.accept')

    {{-- REJECT REQUEST DOCUMENT --}}
    @include('document.modals.reject')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(function() {
            // Initialize DataTable
            const tableInstance = window.LaravelDataTables['requestDocument_dataTable'] = $(
                '#requestDocument_dataTable').DataTable();

            // Event listener for DataTable redraw
            tableInstance.on('draw.dt', function() {
                // Accept button click handler
                $('.acceptBtn').click(function() {
                    $('#accept-form').attr('action', '/accept-document/' + $(this).data(
                        'document'));
                });

                // Reject button click handler
                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject-document/' + $(this).data(
                        'document'));
                });
            });

            // Handle change event for the document_name select dropdown
            $('#document_name').on('change', function() {
                var selectedValue = $(this).val();

                // Check if the selected value is "Barangay Clearance"
                if (selectedValue === 'Barangay Clearance') {
                    // Dynamically load the modal form if "Barangay Clearance" is selected
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-clearance') }}');
                } else if (selectedValue === 'Barangay Business Permit') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-business-permit') }}')
                } else if (selectedValue === 'Barangay Permit to Construct') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-request-building') }}')
                } else if (selectedValue === 'Barangay Indigency Certificate') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-certificate') }}')
                } else if (selectedValue === 'Barangay Blotter/Complaint Report') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-complaint') }}')
                } else if (selectedValue === 'Barangay Medic Legal Certificate') {
                    $('#brgy-document').load(
                        '{{ route('document.modals-form.brgy-medic') }}')
                } else {
                    // Clear the container content if a different value is selected
                    $('#brgy-document').empty();
                }
            });
        });
    </script>
@endpush
