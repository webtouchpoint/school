<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SchoolClass;

class SchoolClassesController extends DataTableController
{
    public function builder()
    {
    	return SchoolClass::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'name', 'numeric', 'description'];
    }
}
