@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style">
                        @isset($document)
                        @livewire('proposal-form-livewire', ['document' => $document])
                    @endisset

                    @isset($mainDocument)
                        @livewire('proposal-form-livewire', ['mainDocument' => $mainDocument])
                    @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
