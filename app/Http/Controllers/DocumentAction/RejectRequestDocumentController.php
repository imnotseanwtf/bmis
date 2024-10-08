<?php

namespace App\Http\Controllers\DocumentAction;

use App\Http\Controllers\Controller;
use App\Models\RequestDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RejectRequestDocumentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RequestDocument $requestDocument): RedirectResponse
    {
        $requestDocument->update(
            [
                'status' => false,
            ]
        );

        alert()->success('Request Document Rejected Successfully!');

        return redirect()->route('request-document.index');
    }
}