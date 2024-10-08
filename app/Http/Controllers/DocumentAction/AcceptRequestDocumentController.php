<?php

namespace App\Http\Controllers\DocumentAction;

use App\Http\Controllers\Controller;
use App\Models\RequestDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcceptRequestDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, RequestDocument $requestDocument): RedirectResponse
    {
        $requestDocument->update(
            [
                'status' => true,
                'schedule' => $request->input('schedule')
            ]
        );

        alert()->success('Request Document Accepted Successfully!');

        return redirect()->route('request-document.index');
    }
}
