<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FencingPermitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pdf = Pdf::loadView('pdf.fencing-permit');

        return $pdf->stream('fencing-permit.pdf');
    }
}
