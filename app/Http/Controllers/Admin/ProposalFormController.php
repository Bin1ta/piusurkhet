<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProposalForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProposalFormController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $documents = Document::where('proposal_status',1)->latest()->paginate(10);
        return view('admin.proposalForm.index', compact('documents'));
    }

    public function proposalList(Document $document)
    {
        $proposalForms = $document->proposalForms;

        return view('admin.proposalForm.proposalList', compact('document', 'proposalForms'));
    }
    public function show($id)
    {
        $proposalForm = ProposalForm::with('proposalFiles')->findOrFail($id);
        return view('admin.proposalForm.show', compact('proposalForm'));
    }

    public function proposalSelected(ProposalForm $proposalForm)
    {
        abort_if(
            Gate::denies('document_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $proposalForm->update([
            'is_selected' => !$proposalForm->is_selected
        ]);

        toast('Proposal Selected  successfully', 'success');

        return back();
    }
}
