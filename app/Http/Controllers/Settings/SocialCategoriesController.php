<?php

namespace App\Http\Controllers\Settings;

use App\Models\Settings\SocialCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialCategories = SocialCategory::orderBy('created_at', 'desc')
            ->get();
        return view('settings.social_categories.index', compact('socialCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.social_categories.create', [
            'socialCategory' => new SocialCategory
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

        SocialCategory::create($validatedData);

        flash('Social category has been saved!');

        return redirect()
            ->route('social-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\SocialCategory  $socialCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SocialCategory $socialCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\SocialCategory  $socialCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialCategory $socialCategory)
    {
        return view('settings.social_categories.edit', [
            'socialCategory' => $socialCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\SocialCategory  $socialCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialCategory $socialCategory)
    {
        $validatedData = $this->validateData($request);

        $socialCategory->update($validatedData);

        flash('Social category has been updated!');

        return redirect()
            ->route('social-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\SocialCategory  $socialCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialCategory $socialCategory)
    {
        flash('"'.$socialCategory->name.'" social category has been deleted!');
        $socialCategory->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);
    }
}
