<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Models\Settings\Subject;
use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\SubjectResource;

class SubjectsController extends DataTableController
{
    public function builder()
    {
    	return Subject::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'name', 'description'];
    }

    protected function getRecord($request)
    {
        $builder = $this->builder;

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

    	try { 
            $subjects = $this->builder->limit($request->limit)->orderBy('id', 'asc')->get();
        } catch (QueryException $e) {
            return [];
        }

        return SubjectResource::collection($subjects);
    }
}
