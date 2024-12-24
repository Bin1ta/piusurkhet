<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationList;
use App\Models\OfficeSetting;
use Illuminate\Http\Request;

class ApplicationListController extends  BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $applicationLists = ApplicationList::latest()
            ->get();
        return view('admin.applicationList.index', compact('applicationLists'));
    }

    public function show($id)
    {
        $applicationList = ApplicationList::with('applicationFiles')->findOrFail($id);
        return view('admin.applicationList.show', compact('applicationList'));
    }

}
