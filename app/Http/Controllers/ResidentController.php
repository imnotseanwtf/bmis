<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentDataTable;
use App\Models\Resident;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ResidentDataTable $residentDataTable): JsonResponse | View
    {
        return $residentDataTable->render('resident.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResidentRequest $storeResidentRequest): RedirectResponse
    {
        Resident::create($storeResidentRequest->validated());

        alert()->success('Resident Create Successfully!');

        return redirect()->route('resident.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident): JsonResponse | View
    {
        return response()->json($resident);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResidentRequest $updateResidentRequest, Resident $resident): RedirectResponse
    {
        $resident->update($updateResidentRequest->validated());

        alert()->success('Resident Update Successfully!');

        return redirect()->route('resident.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident): RedirectResponse
    {
        $resident->delete();

        alert()->success('Resident Delete Successfully!');

        return redirect()->route('resident.index');
    }
}
