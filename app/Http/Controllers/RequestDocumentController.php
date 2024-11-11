<?php

namespace App\Http\Controllers;

use App\DataTables\RequestDocumentDataTable;
use App\Enums\DocumentTypeEnum;
use App\Http\Requests\StoreDocumentRequest;
use App\Models\BaranggayCertificate;
use App\Models\BaranggayClearance;
use App\Models\BusinessPermit;
use App\Models\CertificateOfIndigency;
use App\Models\CertificateOfResidency;
use App\Models\Complaint;
use App\Models\MedicalLegalCertificate;
use App\Models\RequestDocument;
use App\Models\RequestForBuildingConstruction;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RequestDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RequestDocumentDataTable $requestDocumentDataTable): JsonResponse | View
    {
        return $requestDocumentDataTable->render('document.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $storeDocumentRequest): RedirectResponse
    {
        $requestDocument = RequestDocument::create(
            $storeDocumentRequest->only('document_name') + [
                'user_id' => auth()->id(),
            ],
        );

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Certificate->value) {
            BaranggayCertificate::create(
                [
                    'user_id' => $requestDocument->user_id,
                    'request_document_id' => $requestDocument->id,
                ]
            );
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Clearance->value) {
            BaranggayClearance::create($storeDocumentRequest->only('is_certified', 'purpose')
                +
                [
                    'valid_until' => Carbon::today()->addMonths(6),
                    'user_id' => $requestDocument->user_id,
                    'request_document_id' => $requestDocument->id,
                ]);
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Certificate_of_Residency->value) {
            CertificateOfResidency::create([
                'user_id' => $requestDocument->user_id,
                'request_document_id' => $requestDocument->id,
            ]);
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Indigency_Certificate->value) {
            CertificateOfIndigency::create(
                $storeDocumentRequest->only('purpose', 'subject')
                    +
                    [
                        'user_id' => $requestDocument->user_id,
                        'request_document_id' => $requestDocument->id,
                    ]
            );
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Business_Permit->value) {
            BusinessPermit::create($storeDocumentRequest->only('proprietor', 'permit_number', 'address', 'business_location', 'status')
                +
                [
                    'name' => $storeDocumentRequest->nature_of_business,
                    'user_id' => $requestDocument->user_id,
                    'request_document_id' => $requestDocument->id,
                ]);
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Permit_to_Construct->value) {
            RequestForBuildingConstruction::create($storeDocumentRequest->only('address')
                +
                [
                    'user_id' => $requestDocument->user_id,
                    'request_document_id' => $requestDocument->id,
                ]);
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Blotter_Complaint_Report->value) {
            Complaint::create(
                $storeDocumentRequest->only('complainant', 'against', 'respondents')
                    +
                    [
                        'user_id' => $requestDocument->user_id,
                        'request_document_id' => $requestDocument->id,
                    ]
            );
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Medic_Legal_Certificate->value) {
            MedicalLegalCertificate::create(
                $storeDocumentRequest
                    ->only('medical_facility', 'medical_conditions', 'start_date', 'end_date', 'time_of_arrival', 'brought_by', 'relationship', 'start', 'end', 'address')
                    +
                    [
                        'user_id' => $requestDocument->user_id,
                        'request_document_id' => $requestDocument->id,
                    ]
            );
        }

        if ($storeDocumentRequest->document_name == DocumentTypeEnum::Barangay_Fencing_Permit->value) {
            // Code for Barangay Fencing Permit
        }



        flash()->success('Document Requested Successfully!');

        return redirect()->route('request-document.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestDocument $requestDocument): JsonResponse | View
    {
        return response()->json($requestDocument);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestDocument $requestDocument): RedirectResponse
    {
        $requestDocument->delete();

        flash()->success('Document Deleted Successfully!');

        return redirect()->route('request-document');
    }
}
