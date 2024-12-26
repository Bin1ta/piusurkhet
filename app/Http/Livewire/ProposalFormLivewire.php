<?php

namespace App\Http\Livewire;

use App\Models\ProposalForm;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProposalFormLivewire extends Component
{
    use WithFileUploads;
    public $form = [

        'name' => null,
        'phone' => null,
        'email' => null,
        'spouse_name' => null,
        'address' => null,
        'document_id' => null,
        'files' => []
    ];
    public $document;
    public function mount($document)
    {
        $this->form['document_id'] = $document->id;
        $this->form['files'][] = ['file_name' => '', 'file' => null];
        $this->document = $document;
    }

    public function fileArrayIncrement()
    {
        $this->form['files'][] = ['file_name' => '', 'file' => null];
    }

    public function fileArrayDecrement($index)
    {
        unset($this->form['files'][$index]);
        $this->form['files'] = array_values($this->form['files']);
    }
    public function submit()
    {
        $this->validate([
            'form.name' => ['required'],
            'form.phone' => ['required'],
            'form.email' => ['nullable'],
            'form.spouse_name' => ['nullable'],
            'form.address' => ['required'],
            'form.document_id' => ['required', 'exists:documents,id'],
            'form.files.*.file_name' => ['nullable', 'string'],
            'form.files.*.file' => ['nullable', 'file'],
        ]);

        DB::transaction(function () {
            $proposal = ProposalForm::create([
                'name' => $this->form['name'],
                'phone' => $this->form['phone'],
                'email' => $this->form['email'],
                'spouse_name' => $this->form['spouse_name'],
                'address' => $this->form['address'],
                'document_id' => $this->form['document_id'],
            ]);

            if (array_key_exists('files', $this->form)) {
                foreach ($this->form['files'] as $fileData) {
                    if ($fileData['file']) {
                        $path = $fileData['file']->store('proposal_files', 'public');
                        $proposal->proposalFiles()->create([
                            'title' => $fileData['file_name'],
                            'file' => $path,
                        ]);
                    }
                }
            }
        });

        $this->reset('form');
        session()->flash('message', 'Proposal submitted successfully!');
    }


    public function render()
    {
        return view('livewire.proposal-form-livewire');
    }
}
