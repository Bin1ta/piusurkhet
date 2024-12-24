@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>सुचिकृत फारम</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">ड्यासबोर्ड</a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">
                                सुचिकृत फारम
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">सुचिकृत फारमको  सुचि </h6>

                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><h6>SN</h6></th>
                            <th><h6> नाम</h6></th>
                            <th><h6>ठेगाना</h6></th>
                            <th><h6>इमेल</h6></th>
                            <th><h6>फोन नं</h6></th>
                            <th><h6>संस्थाको नाम</h6></th>
                            <th><h6>संस्थाको ठेगाना</h6></th>
                            <th></th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @foreach($applicationLists as $applicationList)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>

                                <td class="min-width">
                                    <p>{{$applicationList->name ?? ''}}</p>
                                </td>

                                <td class="min-width">
                                    <p>{{$applicationList->address ?? ''}}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{$applicationList->email?? ''}}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{$applicationList->phone ?? ''}}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{$applicationList->organization_name ?? ''}}</p>
                                </td>
                                </td>
                                <td class="min-width">
                                    <p>{{$applicationList->organization_address ?? ''}}</p>
                                </td>

                                <td>
                                    <div class="action">
                                        <a href="{{route('admin.applicationList.show', $applicationList)}}" class="text-info">
                                            <i class="lni lni-eye"></i>
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
