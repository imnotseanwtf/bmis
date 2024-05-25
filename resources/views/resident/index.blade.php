@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Resident</div>
                <button class="btn btn-primary" data-bs-target="#createModal" data-bs-toggle="modal">Create Resident
                </button>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    {{-- CREATE RESIDENT --}}

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create</h5>

                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ route('resident.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" placeholder="Enter birthdate"
                                value="{{ old('birthdate') }}">
                            @error('birthdate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option @selected(true) @disabled(true)>Select</option>
                                @foreach (App\Enums\Gender::cases() as $gender)
                                    <option value="{{ $gender->value }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="contact_information">Contact Information</label>
                            <input type="number" class="form-control" name="contact_information"
                                placeholder="Enter contact information" value="{{ old('contact_information') }}">
                            @error('contact_information')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- VIEW RESIDENT --}}

    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <div class="input-group">
                            <input name="name" type="text" id="view_name" @class(['form-control'])
                                placeholder="{{ __('Name') }}" value="{{ old('name') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="birthdate">{{ __('Birthdate') }}</label>
                        <div class="input-group">
                            <input name="birthdate" type="date" id="view_birthdate" @class(['form-control'])
                                placeholder="{{ __('Birthdate') }}" value="{{ old('birthdate') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="gender">{{ __('Gender') }}</label>
                        <div class="input-group">
                            <input name="gender" type="text" id="view_gender" @class(['form-control'])
                                placeholder="{{ __('Gender') }}" value="{{ old('gender') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="contact_information">{{ __('Contact Information') }}</label>
                        <div class="input-group">
                            <input name="contact_information" type="text" id="view_contact_information"
                                @class(['form-control']) placeholder="{{ __('Contact Information') }}"
                                value="{{ old('contact_information') }}" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- EDIT RESIDENT --}}

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="update-form">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                value="{{ old('name') }}" id="edit_name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" placeholder="Enter birthdate"
                                value="{{ old('birthdate') }}" id="edit_birthdate">
                            @error('birthdate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option @selected(true) @disabled(true)>Select</option>
                                @foreach (App\Enums\Gender::cases() as $gender)
                                    <option value="{{ $gender->value }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="contact_information">Contact Information</label>
                            <input type="number" class="form-control" name="contact_information" id="edit_contact_information"
                                placeholder="Enter contact information" value="{{ old('contact_information') }}">
                            @error('contact_information')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DELETE RESIDENT --}}

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deletePromoModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-2">Are you sure you want to delete this?</div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                            $('#view_name').val(resident.name);
                            $('#view_birthdate').val(resident.birthdate);
                            $('#view_gender').val(resident.gender);
                            $('#view_contact_information').val(resident.contact_information);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/resident/' + $(this).data('resident'))
                        .then(response => response.json())
                        .then(resident => {
                            $('#edit_name').val(resident.name);
                            $('#edit_birthdate').val(resident.birthdate);
                            $('#edit_gender').val(resident.gender);
                            $('#edit_contact_information').val(resident.contact_information);
                            $('#update-form').attr('action', '/resident/' + $(this).data(
                                'resident'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/resident/' + $(this).data('resident'));
                });

            })
        });
    </script>
@endpush
