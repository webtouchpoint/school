<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolSession;

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
}
