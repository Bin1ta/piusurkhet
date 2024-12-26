@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30 mb-4 text-center" style="font-size: 18px;">

       <strong>
        <h2>प्रस्ताव फारम शीर्षक - {{ $document->title }}</h2>
       </strong>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">प्रस्ताव आवहान फारमहरूको सुचि </h6>

                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> <h6>SN</h6> </th>
                                <th><h6>नाम</h6></th>
                                <th> <h6>ठेगाना</h6></th>
                                <th><h6>इमेल</h6></th>
                                <th><h6>फोन नं</h6> </th>
                                <th><h6>पति/पत्नीको नाम</h6></th>
                                <th>Selected</th>

                                <th></th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($proposalForms as $proposalForm)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $proposalForm->name ?? '' }}</td>
                                    <td>{{ $proposalForm->address ?? '' }}</td>
                                    <td>{{ $proposalForm->email ?? '' }}</td>
                                    <td>{{ $proposalForm->phone ?? '' }}</td>
                                    <td>{{ $proposalForm->spouse_name ?? '' }}</td>
                                    <td>
                                        @can('document_edit')
                                            <a href="{{route('admin.proposalForm.selected',$proposalForm)}}">
                                                @if($proposalForm->is_selected==1)
                                                    <i class="mdi mdi-check mdi-24px text-success"></i>
                                                @else
                                                    <i class="mdi mdi-window-close mdi-24px text-danger"></i>
                                                @endif

                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        <div class="action">
                                            <a href="{{ route('admin.proposalForm.show',$proposalForm) }}" class="text-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
