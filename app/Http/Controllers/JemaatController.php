<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermsAndCondition;
use Illuminate\Support\Facades\Auth;
use App\Models\MarriageApplication;

class JemaatController extends Controller
{
    public function getTermsAndCondition()
    {
        $terms = TermsAndCondition::all();
        return view('jemaat.terms_and_conditions', compact('terms'));
    }

    public function showMarriageApplicationsForm()
    {
        // Check if user has already submitted a marriage application
        $marriageApplication = MarriageApplication::where('user_id', auth()->user()->id)->first();

        // If marriage application exists, redirect back with an error message
        if ($marriageApplication) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan pernikahan sebelumnya.');
        }

        // Otherwise, return the view to submit marriage application
        return view('jemaat.marriage_applications');
    }

    public function storeMarriageApplicationsForm(Request $request)
    {
        $request->validate([
            'spouse_name' => ['required', 'string', 'max:255'],
            'spouse_birth_date' => ['required', 'date'],
            'spouse_religion' => ['required', 'string', 'max:255'],
            'marriage_date' => ['required', 'date'],
            'venue' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        $marriageApplication = new MarriageApplication();
        $marriageApplication->user_id = $user->id;
        $marriageApplication->spouse_name = $request->spouse_name;
        $marriageApplication->spouse_birth_date = $request->spouse_birth_date;
        $marriageApplication->spouse_religion = $request->spouse_religion;
        $marriageApplication->marriage_date = $request->marriage_date;
        $marriageApplication->venue = $request->venue;
        $marriageApplication->save();

        return redirect()->route('getMarriageApplicationStatus');
    }

    public function getMarriageApplicationStatus()
    {
        $user = Auth::user();
        $marriageApplication = MarriageApplication::where('user_id', $user->id)->latest()->first();

        return view('jemaat.marriage_applications_status', compact('marriageApplication'));
    }
}
