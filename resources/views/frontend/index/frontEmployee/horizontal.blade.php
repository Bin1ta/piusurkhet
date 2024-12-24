<div class="col-sm-6 col-lg-12 mt-3 mt-md-0">
    <div class="card-01">
    @if($header->chief_id || $header->information_officer_id)
        <ul class="list list-01">
            <li>
                @if ($header->chief_id)
                    <div class="avatar avatar-lg">
                        <img src="{{$header->chief->photo ?? ''}}"
                             alt="{{$header->chief->name ?? ''}}">
                    </div>
                    <div class="textbox-01">
                        @if(request()->language=='en')
                            <h6>{{$header->chief->name_en ?? ''}}</h6>
                        @else
                            <h6>{{$header->chief->name ?? ''}}</h6>
                        @endif
                        <p>{{__('Office head')}}</p>
                        <p><i class="fa fa-phone"></i> {{$header->chief->phone ?? ''}}</p>
                        <p><i class="fa fa-envelope"></i> {{$header->chief->email ?? ''}}
                        </p>
                    </div>
            </li>
            @endif
            @if ($header->information_officer_id)
                <li>
                    <div class="avatar avatar-lg">
                        <img src="{{$header->informationOfficer->photo ?? ''}}"
                             alt="{{$header->informationOfficer->name ?? ''}}">
                    </div>
                    <div class="textbox-01">
                        @if(request()->language=='en')
                            <h6>{{$header->informationOfficer->name_en ?? ''}}</h6>
                        @else
                            <h6>{{$header->informationOfficer->name ?? ''}}</h6>
                        @endif
                        <p>{{__('Information Officer')}}</p>
                        <p>
                            <i class="fa fa-phone"></i> {{$header->informationOfficer->phone ?? ''}}
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i> {{$header->informationOfficer->email ?? ''}}
                        </p>
                    </div>
                </li>
            @endif
        </ul>
    @endif
</div>
</div>
