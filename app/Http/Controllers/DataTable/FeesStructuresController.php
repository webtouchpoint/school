<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Models\Settings\FeesStructure;
use App\Http\Controllers\Controller;
use App\Http\Resources\Settings\FeesStructureResource;

class FeesStructuresController extends DataTableController
{
    public function builder()
    {
    	return FeesStructure::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'name', 'class_name', 'fees_category', 'amount', 'description'];
    }

    protected function getRecord($request)
    {
        $builder = $this->builder;

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

    	try { 
            $feesStructure = $this->builder->limit($request->limit)->orderBy('id', 'asc')->get();
        } catch (QueryException $e) {
            return [];
        }

        return FeesStructureResource::collection($feesStructure);
    }
}
