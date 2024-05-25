<?php

namespace App\Http\Controllers;

use App\DataTables\HouseDataTable;
use App\Models\House;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HouseDataTable $houseDataTable): JsonResponse | View
    {
        return $houseDataTable->render('house.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHouseRequest $storeHouseRequest): RedirectResponse
    {
        House::create($storeHouseRequest->validated());

        alert()->success('House Created Successfully!');

        return redirect()->route('house.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house): JsonResponse | View
    {
        return response()->json($house);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHouseRequest $updateHouseRequest, House $house): RedirectResponse
    {
        $house->update($updateHouseRequest->validated());

        alert()->success('House Updated Successfully!');

        return redirect()->route('house.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house): RedirectResponse
    {
        $house->delete();

        alert()->success('House Deleted Successfully!');

        return redirect()->route('house.index');
    }
}
