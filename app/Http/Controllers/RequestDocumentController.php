<?php

namespace App\Http\Controllers;

use App\DataTables\RequestDocumentDataTable;
use App\Http\Requests\StoreDocumentRequest;
use App\Models\RequestDocument;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        RequestDocument::create(
            $storeDocumentRequest->validated() + [
                'user_id' => auth()->id(),
            ],
        );

        alert()->success('Ducoment Requested Successfully!');

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

        alert()->success('Document Deleted Successfully!');

        return redirect()->route('request-document');
    }
}
