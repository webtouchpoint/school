<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\FeesCategory;
use App\Http\Resources\Settings\FeesCategoryResource;

class FeesCategoriesController extends DataTableController
{
    public function builder()
    {
    	return FeesCategory::query();
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
            $feesCategory = $this->builder->limit($request->limit)->orderBy('id', 'asc')->get();
        } catch (QueryException $e) {
            return [];
        }

        return FeesCategoryResource::collection($feesCategory);
    }
}
