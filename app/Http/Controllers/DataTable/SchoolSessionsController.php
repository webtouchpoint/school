<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolSession;

class SchoolSessionsController extends DataTableController
{
    protected $allowCreation = false;

    public function builder()
    {
    	return SchoolSession::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'session', 'start_date', 'end_date', 'is_current'];
    }

    public function getUpdatableColumns()
    {
        return ['session', 'start_date', 'end_date', 'is_current'];
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'session' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_current' => 'boolean'
        ]);

        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }
}
