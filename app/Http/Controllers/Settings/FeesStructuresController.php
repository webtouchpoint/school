<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;
use App\Models\Settings\FeesCategory;
use App\Models\Students\AcademicInfo;
use App\Models\Settings\FeesStructure;
use App\Models\Settings\SchoolSession;

class FeesStructuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feesStructures = FeesStructure::orderBy('created_at', 'desc')
            ->get();
        
        return view('settings.fees_structures.index', compact('feesStructures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.fees_structures.create', [
            'feesStructure' => new FeesStructure,
            'schoolSessions' => SchoolSession::select('id', 'session')->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get(),
            'feesCategories' => FeesCategory::select('id', 'fees_category')->get()
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

        $feesStructure = FeesStructure::create($validatedData);

        if ($request->has('month_year'))
        {
            $feesStructure->month_year = $request->month_year;
            $feesStructure->save();
        }

        flash('Fees Structure has been saved!');

        return redirect()
            ->route('fees-structures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\FeesStructure  $feesStructure
     * @return \Illuminate\Http\Response
     */
    public function show(FeesStructure $feesStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\FeesStructure  $feesStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(FeesStructure $feesStructure)
    {
       return view('settings.fees_structures.edit', [
            'feesStructure' => $feesStructure,
            'schoolSessions' => SchoolSession::select('id', 'session')->get(),
            'schoolClasses' => SchoolClass::select('id', 'name')->get(),
            'feesCategories' => FeesCategory::select('id', 'fees_category')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\FeesStructure  $feesStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeesStructure $feesStructure)
    {
        $validatedData = $this->validateData($request);

        $feesStructure->update($validatedData);

        flash('Fees Structure has been updated!');
        
        return redirect(route('fees-structures.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\FeesStructure  $feesStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeesStructure $feesStructure)
    {
        flash('"'.$feesStructure->name.'" fees structure has been deleted!');
        $feesStructure->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'school_session_id' => 'required',
            'school_class_id' => 'required',
            'fees_category_id' => 'required',
            'fees_heading' => 'required',
            'amount' => 'required|numeric',
            'description' => 'nullable'
        ]);
    }

    public function fetchByAcademicInfoId($academicInfo_id)
    {
        $academicInfo = AcademicInfo::findOrFail($academicInfo_id);
        $fees = $academicInfo->feesStructures()->where('paid', 0)->get();

        return $fees;
    }
}
