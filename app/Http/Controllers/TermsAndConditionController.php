<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermsAndCondition;

class TermsAndConditionController extends Controller
{
    public function index()
    {
        $terms = TermsAndCondition::all();
        return view('ketua_stasi.data_terms', compact('terms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        TermsAndCondition::create($request->all());

        return response()->json(['success' => 'Syarat dan ketentuan berhasil dibuat.']);
    }

    public function edit($id)
    {
        $term = TermsAndCondition::findOrFail($id);
        return response()->json($term);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $term = TermsAndCondition::findOrFail($id);
        $term->update($request->all());

        return response()->json(['success' => 'Syarat dan ketentuan berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        $term = TermsAndCondition::findOrFail($id);
        $term->delete();

        return response()->json(['success' => 'Syarat dan ketentuan berhasil dihapus.']);
    }
}
