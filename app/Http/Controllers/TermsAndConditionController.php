<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTermsAndConditionRequest;
use App\Http\Requests\UpdateTermsAndConditionRequest;
use App\Models\TermsAndCondition;

class TermsAndConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTermsAndConditionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermsAndConditionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermsAndCondition  $TermsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermsAndCondition $TermsAndCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermsAndCondition  $TermsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(TermsAndCondition $TermsAndCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTermsAndConditionRequest  $request
     * @param  \App\Models\TermsAndCondition  $TermsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermsAndConditionRequest $request, TermsAndCondition $TermsAndCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsAndCondition  $TermsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsAndCondition $TermsAndCondition)
    {
        //
    }
}
