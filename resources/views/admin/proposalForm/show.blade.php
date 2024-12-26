@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">प्रस्ताव आवहानको फारम</h1>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header text-center bg-primary text-white">
                <h3 class="card-title text-white">विवरण</h3>
            </div>
            <div class="card-body">

                <div class="row mb-2">
                    <div class="col-md-4"><strong> नाम:</strong></div>
                    <div class="col-md-8">{{ $proposalForm->name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><strong>ठेगाना:</strong></div>
                    <div class="col-md-8">{{ $proposalForm->address }}</div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-4"><strong>फोन नं:</strong></div>
                    <div class="col-md-8">{{ $proposalForm->phone }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><strong>इमेल:</strong></div>
                    <div class="col-md-8">{{ $proposalForm->email }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><strong>पति/पत्नीको नाम:</strong></div>
                    <div class="col-md-8">{{ $proposalForm->spouse_name }}</div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title text-center text-white">कागजातहरु</h3>
            </div>
            <div class="card-body">
                @if($proposalForm->proposalFiles && $proposalForm->proposalFiles->isNotEmpty())
                <ul class="list-group">
                    @foreach($proposalForm->proposalFiles as $file)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><strong>{{ $file->title }}</strong></span>
                            <a href="{{ asset('storage/' . $file->file) }}" download="{{ $file->title }}" class="btn btn-outline-primary btn-sm">
                                Download
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>कागजातहरु उपलब्ध छैन |</p>
            @endif

            </div>
        </div>
    </div>
</div>

    </div>
@endsection
