<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarriageApplicationRequest;
use App\Http\Requests\UpdateMarriageApplicationRequest;
use App\Models\MarriageApplication;

class MarriageApplicationController extends Controller
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
     * @param  \App\Http\Requests\StoreMarriageApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarriageApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarriageApplication  $marriageApplication
     * @return \Illuminate\Http\Response
     */
    public function show(MarriageApplication $marriageApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarriageApplication  $marriageApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(MarriageApplication $marriageApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarriageApplicationRequest  $request
     * @param  \App\Models\MarriageApplication  $marriageApplication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarriageApplicationRequest $request, MarriageApplication $marriageApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarriageApplication  $marriageApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarriageApplication $marriageApplication)
    {
        //
    }
}
