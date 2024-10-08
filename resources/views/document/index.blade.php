@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Request Document</div>
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
        $(() => {
            const tableInstance = window.LaravelDataTables['requestDocument_dataTable'] = $('#requestDocument_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.acceptBtn').click(function() {
                    $('#accept-form').attr('action', '/accept-document/' + $(this).data('document'));
                })

                $('.rejectBtn').click(function() {
                    $('#reject-form').attr('action', '/reject-document/' + $(this).data('document'));
                })
            })
        });
    </script>
@endpush
