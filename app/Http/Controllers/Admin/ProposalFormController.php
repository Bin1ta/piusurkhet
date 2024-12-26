<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProposalForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProposalFormController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $proposalForms = ProposalForm::latest()
            ->get();
        return view('admin.proposalForm.index', compact('proposalForms'));
    }

    public function show($id)
    {
        $proposalForm = ProposalForm::with('proposalFiles')->findOrFail($id);
        return view('admin.proposalForm.show', compact('proposalForm'));
    }
}
