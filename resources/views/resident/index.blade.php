@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Resident</div>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>


    {{-- VIEW RESIDENT --}}
    @include('resident.modals.view')

    {{-- ACCEPT RESIDENT --}}
    @include('resident.modals.accept')

    {{-- REJECT RESIDENT --}}
    @include('resident.modals.reject')
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {
            const tableInstance = window.LaravelDataTables['resident_dataTable'] = $('#resident_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {
                $('.viewBtn').click(function() {
                    const residentId = $(this).data(
                        'resident'); // Get the resident ID from the button's data attribute

                    fetch('/resident/' + residentId)
                        .then(response => response.json())
                        .then(resident => {
                            // Populate resident details
                            $('#view_last_name').val(resident.last_name);
                            $('#view_name').val(resident.name);
                            $('#view_middle_name').val(resident.middle_name);
                            $('#view_birthdate').val(resident.birthdate);
                            $('#view_gender').val(resident.gender);
                            $('#view_contact_number').val(resident.contact_number);
                            $('#view_email').val(resident.email);
                            $('#view_number_of_years').val(resident.number_of_years);

                            // Access only the first house
                            if (resident.houses.length > 0) {
                                const firstHouse = resident.houses[0];
                                $('#view_address').val(firstHouse.address);
                                $('#view_barangay').val(firstHouse.barangay);
                                $('#view_municipality').val(firstHouse.municipality);
                                $('#view_province').val(firstHouse.province);
                            }

                            function setLinkOrMessage(fileKey, linkId, inputId) {
                                const fileName = resident[
                                fileKey]; // Get the file name from the resident object
                                if (fileName) {
                                    const fileUrl = '/storage/' +
                                    fileName; // Construct the file URL
                                    $(`#${linkId}`).attr('href', fileUrl)
                                .show(); // Set the link's href and show it
                                    $(`#${inputId}`).val(fileName)
                                .show(); // Display the file name in the input field
                                } else {
                                    $(`#${linkId}`).hide(); // Hide the link if no file is found
                                    $(`#${inputId}`).val('No file')
                                .show(); // Show "No file" in the input field
                                }
                            }


                            setLinkOrMessage('id_pic', 'link_id_pic', 'view_id_pic');

                            const mapUrl = 'https://maps.google.com/maps?q=' +
                                encodeURIComponent(resident.address + ' ' +
                                    resident.barangay + ' ' +
                                    resident.municipality + ' ' +
                                    resident.province) +
                                '&output=embed';

                            $('#map').attr('src', mapUrl);



                            console.log(mapUrl);


                        })
                        .catch(error => console.error('Error fetching resident data:', error));
                });


                $('.acceptBtn').click(function() {
                    $('#accept-form').attr('action', '/accept/' + $(this).data('resident'));
                })

                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject/' + $(this).data('resident'));
                })
            })
        });
    </script>
@endpush
