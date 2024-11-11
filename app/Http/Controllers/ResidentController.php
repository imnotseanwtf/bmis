<?php

namespace App\Http\Controllers;

use App\DataTables\ResidentDataTable;
use App\Models\Resident;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ResidentDataTable $residentDataTable)
    {
        return $residentDataTable->render('resident.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $resident): JsonResponse | View
    {
        return response()->json($resident);
    }
}
