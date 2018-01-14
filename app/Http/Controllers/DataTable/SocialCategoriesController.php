<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\SocialCategory;

class SocialCategoriesController extends DataTableController
{
    public function builder()
    {
    	return SocialCategory::query();
    }

    public function getDisplayableColumns()
    {
    	return ['id', 'name', 'description'];
    }
}