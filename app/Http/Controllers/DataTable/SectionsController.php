<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Models\Settings\Section;
use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\SectionResource;

class SectionsController extends DataTableController
{
    public function builder()
    {
    	return Section::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'name', 'Class Name', 'description'];
    }

    protected function getRecord($request)
    {
        $builder = $this->builder;

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

    	try { 
            $sections = $this->builder->limit($request->limit)->orderBy('id', 'asc')->get();
        } catch (QueryException $e) {
            return [];
        }

        $sections = $sections->map(function ($item, $key) {
            $item['class_name'] = $item->schoolClass->name;
            return $item;
        });

        return SectionResource::collection($sections);
    }
}
