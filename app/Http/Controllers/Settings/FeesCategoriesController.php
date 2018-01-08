<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\Settings\FeesCategory;

class FeesCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.fees_categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.fees_categories.create', [
            'feesCategory' => new FeesCategory,
            'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        FeesCategory::create($validatedData);

        flash('Fees Category has been saved!');

        return redirect(route('fees-categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\FeesCategory  $feesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FeesCategory $feesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\FeesCategory  $feesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FeesCategory $feesCategory)
    {
        return view('settings.fees_categories.edit', [
            'feesCategory' => $feesCategory,
             'schoolClasses' => SchoolClass::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\FeesCategory  $feesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeesCategory $feesCategory)
    {
       $validatedData = $this->validateData($request);

        $feesCategory->update($validatedData);

        flash('Fees Category has been updated!');

        return redirect(route('fees-categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\FeesCategory  $feesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeesCategory $feesCategory)
    {
        //
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'school_class_id' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);
    }
}
