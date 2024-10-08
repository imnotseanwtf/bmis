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
                    fetch('/resident/' + $(this).data('resident'))
                        .then(response => response.json())
                        .then(resident => {
                            $('#view_last_name').val(resident.last_name);
                            $('#view_name').val(resident.name);
                            $('#view_middle_name').val(resident.middle_name);
                            $('#view_birthdate').val(resident.birthdate);
                            $('#view_gender').val(resident.gender);
                            $('#view_contact_number').val(resident.contact_number);
                            $('#view_address').val(resident.address);
                            $('#view_barangay').val(resident.barangay);
                            $('#view_municipality').val(resident.municipality);
                            $('#view_province').val(resident.province);
                            $('#view_email').val(resident.email);
                            $('#view_id_pic').attr('src', 'storage/' + resident.id_pic);

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
