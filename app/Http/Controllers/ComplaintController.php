<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pdf = Pdf::loadView('pdf.complaint');

        return $pdf->stream('complaint.pdf');
    }
}
