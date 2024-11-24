@php
    use App\Enums\DocumentTypeEnum;

    $documentUrls = [
        DocumentTypeEnum::Barangay_Clearance->value => route('brgy-clearance', $document->id),
        DocumentTypeEnum::Barangay_Business_Permit->value => route('business-permit', $document->id),
        DocumentTypeEnum::Barangay_Indigency_Certificate->value => route(
            'certificate-of-indigency',
            $document->id,
        ),
        DocumentTypeEnum::Barangay_Blotter_Complaint_Report->value => route('complaint', $document->id),
        DocumentTypeEnum::Barangay_Permit_to_Construct->value => route(
            'request-for-building-construction',
            $document->id,
        ),
        DocumentTypeEnum::Barangay_Certificate->value => route('brgy-certificate', $document->id),
        DocumentTypeEnum::Barangay_Medic_Legal_Certificate->value => route(
            'medical-legal-certificate',
            $document->id,
        ),
        DocumentTypeEnum::Barangay_Fencing_Permit->value => route('fencing-permit', $document->id),
    ];

    // Determine the URL for the current document, if it exists
    $documentUrl = $documentUrls[$document->document_name];
@endphp

@if ($document->status === null)
    <button class="btn btn-success acceptBtn" data-bs-toggle="modal" data-bs-target="#acceptModal"
        data-document="{{ $document->id }}">
        <i class="fa-solid fa-check"></i>
    </button>

    <button class="btn btn-danger rejectBtn" data-bs-toggle="modal" data-bs-target="#rejectModal"
        data-document="{{ $document->id }}">
        <i class="fa-solid fa-times"></i>
    </button>
@endif

@admin
    <a href="{{ $documentUrl }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
@endadmin
