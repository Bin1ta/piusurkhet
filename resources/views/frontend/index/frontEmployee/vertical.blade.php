<div class=" col-lg-12 mt-3 mt-md-0">
    <div class="card-01">
        @if ($header->chief_id || $header->information_officer_id)
            <div class="list list-01 row">

                @if ($header->chief_id)
                    <div class="col-md-12 col-lg-12">
                        <div class="card-container-index">
                            <h4>{{ __('Office head') }}</h4>
                            <img class="rounded" src="{{ $header->chief->photo ?? '' }}" height="120" width="120"
                                alt="{{ $header->chief->name ?? '' }}">
                            <p class="name">
                                {{ request()->language == 'en' ? $header->chief->name_en : $header->chief->name }}</p>
                            <p>{{ $header->chief->phone ?? '' }}</p>
                        </div>
                    </div>
                @endif
                @if ($header->information_officer_id)
                    <div class="col-md-12 col-lg-12">
                        <div class="card-container-index">
                            <h4>{{ __('Information Officer') }}</h4>
                            <img class="rounded" src="{{ $header->informationOfficer->photo ?? '' }}" height="120"
                                width="120" alt="{{ $header->informationOfficer->name ?? '' }}">
                            <p class="name">
                                {{ request()->language == 'en' ? $header->informationOfficer->name_en : $header->informationOfficer->name }}
                            </p>

                            <p>{{ $header->informationOfficer->phone ?? '' }}</p>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
