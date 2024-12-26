@extends('layouts.master')
@section('content')

    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">
                    @if (request()->language == 'en')
                        {{ $documentCategory->title_en }}
                    @else
                        {{ $documentCategory->title }}
                    @endif
                </li> --}}
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="well-heading"
            style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
            <i class="fa fa-newspaper-o"></i>
            {{-- @if (request()->language == 'en')
                {{ $documentCategory->title_en }}
            @else
                {{ $documentCategory->title }}
            @endif --}}
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>{{ __('S.N') }}</th>
                        <th>{{ __('Title') }}</th>

                        <th>{{ __('Published Date') }}</th>
                        <th>{{ __('Publisher') }}</th>
                        <th>{{ __('Fill From') }}</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if (request()->language == 'en')
                                <td>{{ $document->title_en }}</td>
                            @else
                                <td>{{ $document->title }}</td>
                            @endif

                            <td>
                                {{ $document->published_date ? $document->published_date->toDateString() : '' }}
                            </td>
                            @if (request()->language == 'en')
                                <td>{{ $document->publisher_en }}</td>
                            @else
                                <td>{{ $document->publisher }}</td>
                            @endif
                            <td>
                                @if ($document->proposal_status === 1)
                                    <a href="{{ route('frontend.proposal-page', [$document->slug, 'language' => $language])}}" class="btn btn-sm btn-info" title="{{ __('Fill Form') }}">
                                        <i class="fa fa-edit"></i> {{ __('Fill Form') }}
                                    </a>
                                @endif

                            </td>


                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
