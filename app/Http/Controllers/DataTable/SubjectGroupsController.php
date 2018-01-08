<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SubjectGroup;
use App\Http\Resources\Settings\SubjectGroupResource;

class SubjectGroupsController extends DataTableController
{
    public function builder()
    {
    	return SubjectGroup::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'name', 'class_name', 'description'];
    }

    protected function getRecord($request)
    {
        $builder = $this->builder;

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

    	try { 
            $subjectGroups = $this->builder->limit($request->limit)->orderBy('id', 'asc')->get();
        } catch (QueryException $e) {
            return [];
        }

        return SubjectGroupResource::collection($subjectGroups);
    }
}
