<?php

namespace App\Http\Controllers;

use App\Models\MarriageApplication;

class MarriageApplicationController extends Controller
{
    public function getMarriageApplicationsData()
    {
        $marriageApplications = MarriageApplication::all();
        return view('ketua_stasi.data_marriage_applications', compact('marriageApplications'));
    }

    public function approveMarriageApplications($id)
    {
        $marriageApplication = MarriageApplication::findOrFail($id);
        $marriageApplication->status = 'approved'; // Assuming approval status change logic
        $marriageApplication->save();

        return redirect()->route('getMarriageApplicationsData')->with('success', 'Status pengajuan berhasil diubah.');
    }
}
