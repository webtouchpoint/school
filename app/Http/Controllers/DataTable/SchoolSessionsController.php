<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolSession;
use App\Http\Resources\Settings\SchoolSessionResource;

class SchoolSessionsController extends DataTableController
{
    public function builder()
    {
    	return SchoolSession::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'session', 'start_date', 'end_date', 'is_current'];
    }

    protected function getRecord($request)
    {
        $builder = $this->builder;

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

    	try { 
            $choolSessions = $this->builder->limit($request->limit)->orderBy('id', 'asc')->get();
        } catch (QueryException $e) {
            return [];
        }

        return SchoolSessionResource::collection($choolSessions);
    }
}
