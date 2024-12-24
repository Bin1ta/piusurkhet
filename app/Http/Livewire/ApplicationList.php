<?php

namespace App\Http\Livewire;

use App\Models\ApplicationList as ModelsApplicationList;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicationList extends Component
{
    use WithFileUploads;
    public $form = [

        'name' => null,
        'phone' => null,
        'email' => null,
        'organization_address' => null,
        'organization_name' => null,
        'address' => null,
        'files' => []
    ];
    public function mount()
    {
        $this->form['files'][] = ['file_name' => '', 'file' => null];
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
            'form.organization_name' => ['nullable'],
            'form.organization_address' => ['nullable'],
            'form.address' => ['required'],
            'form.files.*.file_name' => ['nullable', 'string'],
            'form.files.*.file' => ['nullable', 'file'],
        ]);

        DB::transaction(function () {
            $application =ModelsApplicationList::create([
                'name' => $this->form['name'],
                'phone' => $this->form['phone'],
                'email' => $this->form['email'],
                'organization_address' => $this->form['organization_address'],
                'organization_name' => $this->form['organization_name'],
                'address' => $this->form['address'],
            ]);

            if (array_key_exists('files', $this->form)) {
                foreach ($this->form['files'] as $fileData) {
                    if ($fileData['file']) {
                        $path = $fileData['file']->store('application_files', 'public');
                        $application->applicationFiles()->create([
                            'title' => $fileData['file_name'],
                            'file' => $path,
                        ]);
                    }
                }
            }
        });

        $this->reset('form');
        session()->flash('message', 'Application  submitted successfully!');
    }
    public function render()
    {
        return view('livewire.application-list');
    }
}
