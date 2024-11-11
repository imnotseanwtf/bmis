<?php

namespace App\Http\Controllers\DocumentAction;

use App\Enums\DocumentTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestDocument;
use App\Models\BaranggayCertificate;
use App\Models\BaranggayClearance;
use App\Models\RequestDocument;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcceptRequestDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequestDocument $storeRequestDocument, RequestDocument $requestDocument): RedirectResponse
    {
        $schedule = $storeRequestDocument->schedule;
        $valid_until = Carbon::parse($schedule)->addDays(7);

        $requestDocument->update(
            [
                'status' => true,
                'schedule' => $schedule,
                'valid_until' => $valid_until,
                'is_announce' => 1,
            ]
        );

        flash()->success('Request Document Accepted Successfully!');

        return redirect()->route('request-document.index');
    }
}
