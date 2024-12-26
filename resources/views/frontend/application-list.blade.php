@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- input style start -->
                    <div class="card-style">

                        @if ($header->application_list == 1)
                        @livewire('application-list')

                        @else
                         <h3 class="mt-4 text-center">!!! सुचिकृत फारम खुलेको छैन !!!</h3>
                        @endif

                    </div>
                    <!-- end card -->

                </div>

            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
