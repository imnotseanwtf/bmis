<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\BlotterRecord;
use App\Models\RequestDocument;
use App\Models\ResidentInformation;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requestDocuments = RequestDocument::all()->where('user_id', auth()->id());

        foreach ($requestDocuments as $document) {
            // Check if is_announce is 1
            if ($document->is_announce == 1) {
                flash()->success('Document ' . $document->document_name . ' is Accepted, the document valid until ' . $document->valid_until);
                $document->is_announce = 2;
            }
            // Check if is_announce is 0
            elseif ($document->is_announce == 3) {
                flash()->flash('error', 'Document ' . $document->document_name . ' is Rejected.', [], 'Rejected');
                $document->is_announce = 5;
            }
            // Check if is_announce is 2
            elseif ($document->is_announce == 2) {
                flash()->flash('warning' ,'Document ' . $document->document_name . ' valid until ' . $document->valid_until, [], 'Notice');
            }

            // Check if status is 2 and valid_until date is beyond current date
            if ($document->status == 2 && Carbon::parse($document->valid_until)->isPast()) {
                flash()->flash('error', 'Document ' . $document->document_name . ' validity has expired.', [], 'Expired');
                $document->is_announce = 5;
                $document->status = 4;
            }

            $document->save();
        }

        return view('home');
    }

    public function dashboard()
    {
        $role = UserTypeEnum::Resident->value;

        $residentCount = User::role($role)->where('status', true)->count();
        $pendingResidentCount = User::role($role)->where('status', null)->count();

        $maleCount = User::role($role)
            ->where('status', true)
            ->where('gender', 'male')->count();
        $femaleCount = User::role($role)
            ->where('status', true)
            ->where('gender', 'female')->count();
        $otherGenderCount = User::role($role)
            ->where('status', true)
            ->where('gender', 'others')->count();

        $pendingDocument = RequestDocument::where('status', null)->count();
        $blotterRecordCount = BlotterRecord::count();

        $appointmentPendingCount = RequestDocument::where('status', null)->count();


        return view('dashboard', compact('residentCount', 'maleCount', 'femaleCount', 'otherGenderCount', 'appointmentPendingCount', 'pendingResidentCount', 'pendingDocument', 'blotterRecordCount'));
    }
}
