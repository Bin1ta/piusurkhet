@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <!-- input style start -->
                    <div class="card-style">

                        @if ($document && $document->proposal_status == 1)
                            @livewire('proposal-form-livewire',['document' => $document]) <!-- Show the form if proposal_status is 1 -->
                        @else
                            <h3 class="mt-4 text-center">!!! प्रस्ताव आवहान फारम खुलेको छैन !!!</h3>
                            <!-- Show message if proposal_status is not 1 -->
                        @endif
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
