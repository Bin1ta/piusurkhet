<section class="document-section mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                @if(config('indexSetting.showIntroduction') && config('indexSetting.introductionPosition')=='withDocument')
                    <div class="col-lg-12 mt-3">
                        <div class="card-01 h-100">
                            <h6 class="heading mb-2">
                                @if(request()->language=='en')
                                    {{$officeDetail->title_en ?? ''}}
                                @else
                                    {{$officeDetail->title ?? ''}}
                                @endif
                            </h6>
                            <p class="text-withlink">
                                @if(request()->language=='en')
                                    {!! Str::words(strip_tags($officeDetail->description_en ?? ''), 50, '...') !!}
                                @else
                                    {!! Str::words(strip_tags($officeDetail->description ?? ''), 50, '...') !!}
                                @endif
                                <a class="intro-title"
                                   href="{{route('officeDetail',[$officeDetail->slug ?? '','language'=>$language])}}">
                                    {{__('View More')}}
                                </a>
                        </div>
                    </div>
                @endif
                @if($header->document_list_type=="list")
                    @include("frontend.index.list")
                @else
                    @include("frontend.index.card")
                @endif
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInRight m-b-15">
                        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                           {{__('Calendar')}}<h6 class="content_title"><span class="pull-right"></span>
                            </h6>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="clearall"></div>
                <div class="row">
                    <iframe src="https://www.hamropatro.com/widgets/calender-medium.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:385px;" allowtransparency="true"></iframe>
                </div>
                <div class="clearall"></div>



                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInRight m-b-15">
                        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                            {{__('Facebook')}}<h6 class="content_title"><span class="pull-right"></span>
                            </h6>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="clearall"></div>
                <div class="row">
                    <iframe src="{{$header->facebook_iframe}}" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>

        </div>
    </div>
</section>
