@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30 mb-4 text-center" style="font-size: 18px;">



    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">प्रस्ताव आवहान फारमहरूको सुचि </h6>

                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> SN </th>
                                <th>Form Title</th>
                                <th>Applied Forms</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{Str::words($document->title,15,'...')}}</td>
                                    <td>

                                        <a href="{{route('admin.document.proposalLists',$document)}}" class="text-info" title="प्रस्ताव आवहानहरु">
                                            <i class="mdi mdi-file mdi-24px"></i>
                                        </a>

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
