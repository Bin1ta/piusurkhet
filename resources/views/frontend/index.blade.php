@extends('layouts.master')
@section('content')
    <section class="newsbar-section mt-2">
        <div class="container-fluid">
            <div class="newsbar-container" style="background-color: {{$colors->scroller}}">
                <div class="flex-shrink-0 newsbar-title pr-lg-3">{{__('Latest News')}}</div>
                <div class="d-block jctkr-wrapper jctkr-initialized">
                    <ul class="marquee-list">
                        <marquee onmouseover="stop()" onmouseout="start()">
                            @foreach($tickerFiles as $tickerFile)
                                <li>
                                    <a href="{{route('documentDetail',[$tickerFile->slug,'language'=>$language])}}">
                                        @if(request()->language=='en')
                                            {{$tickerFile->title_en}}
                                        @else
                                            {{$tickerFile->title}}
                                        @endif {{$tickerFile->published_date->toDateString()}}
                                        <span class="type">{{__('New')}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </marquee>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="introduction mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 order-3 order-lg-1">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInRight m-b-15">
                            <div class="well-heading"
                                 style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                                {{__('Related Information')}}<h6 class="content_title"><span class="pull-right"></span>
                                </h6>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="clearall"></div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="blockmenu" style="background-color: {{$colors->nav}}">
                                <a href="{{route('static',["faq",'language'=>$language])}}">
                                    <span class="block-icon"><i class="fa fa-question-circle"></i></span>
                                    <div class="block-content">
                                        <div class="block-content-title"
                                             style="color: #fff;">{{__('Frequently Asked Questions')}}</div>
                                    </div>
                                </a>
                            </div>
                            <!--button end-->
                            <!--button start-->
                            <div class="blockmenu" style="background-color: {{$colors->nav}}">
                                <a href="#">
                                    <span class="block-icon"><i class="fa fa-envelope"></i></span>
                                    <div class="block-content">
                                        <div class="block-content-title"
                                             style="color: #fff;">{{ __('Check Mail') }}</div>
                                    </div>
                                </a>
                            </div>
                            <!--button end-->
                            <!--button start-->
                            <div class="blockmenu" style="background-color: {{$colors->nav}}">
                                <a href="{{route('static',["bill",'language'=>$language])}}">
                                    <span class="block-icon"><i class="fa fa-calculator"></i></span>
                                    <div class="block-content">
                                        <div class="block-content-title"
                                             style="color: #fff;">
                                            {{__('Bill Publicity')}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--button end-->
                            <div class="blockmenu" style="background-color: {{$colors->nav}}">
                                <a href="https://twitter.com/">
                                    <span class="block-icon"><i class="fa fa-twitter"></i></span>
                                    <div class="block-content">
                                        <div class="block-content-title"
                                             style="color: #fff;">{{ __('Twitter Link') }}</div>
                                    </div>
                                </a>
                            </div>
                            <!--button start-->
                            @if(config('default.subDivision'))
                                <div class="blockmenu" style="background-color: {{$colors->nav}}">
                                    <a href="{{route('static', ["smuggling",'language'=>$language])}}">
                                        <span class="block-icon"><i class="fa fa-clipboard"></i></span>
                                        <div class="block-content">
                                            <div class="block-content-title"
                                                 style="color: #fff;">{{__('Smuggling')}}</div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            <!--button end-->
                            <!--button start-->
                            <div class="blockmenu" style="background-color: {{$colors->nav}}">
                                <a href="{{route('static',["links",'language'=>$language])}}">
                                    <span class="block-icon"><i class="fa fa-link"></i></span>
                                    <div class="block-content">
                                        <div class="block-content-title" style="color: #fff;">
                                            {{__('Links')}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--button end-->
                        </div>
                    </div>
                    <div class="clearall"></div>

                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div id="slider" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($sliders as $sliderButton)
                                <button type="button" data-bs-target="#slider"
                                        data-bs-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"
                                        @if($loop->first) aria-current="true" @endif
                                        aria-label="Slide {{$loop->iteration}}"
                                ></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                    <img src="{{$slider->photo}}" class="d-block w-100 height-455"
                                         alt="{{$slider->title}}">
                                    <div class="carousel-caption d-none d-md-block">
                                        @if(request()->language=='en')
                                            <p>{{$slider->title_en}}</p>
                                        @else
                                            <p>{{$slider->title}}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#slider"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#slider"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-3 order-2 order-lg-3">
                    <div class="row">

                        @include('frontend.index.frontEmployee.'.config('indexSetting.employeeSetting'))

                        @if(config('indexSetting.showIntroduction') && config('indexSetting.introductionPosition')=='withEmployee')
                            <div class="col-sm-6 col-lg-12 mt-3">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.index.document')
    <section class="gallery-section mt-2">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($galleries as $gallery)
                            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="{{route('photoGalleryDetails',[$gallery->slug,'language'=>$language])}}">
                                                <img src="{{asset('storage/'.$gallery->photos->first()->images)}}"
                                                     style="width: 100%" class="img-fluid" alt="Image">
                                            </a>
                                        </div>
                                        <div class="carousel-caption d-none d-md-block">
                                            @if(request()->language=='en')
                                                {{$gallery ->title_en}}
                                            @else
                                                {{$gallery ->title}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#galleryCarousel" role="button"
                       data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#galleryCarousel" role="button"
                       data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    @if($noticePopups->count()>0)
        <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noticeModal"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach($noticePopups as $noticePopup)
                        @if ($noticePopup->proposal_status === 1)
                        <a href="{{ route('frontend.proposal-page', [$noticePopup->slug])}}" class="btn btn-sm btn-success" title="{{ __('Fill Form') }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endif
                            @foreach($noticePopup->files as $file)
                                @if($file->extension=='pdf')
                                    <iframe src="{{asset('storage/'.$file->url)}}" frameborder="0"
                                            style="width:100%;height:600px;"></iframe>
                                @else
                                    <img src="{{asset('storage/'.$file->url)}}" alt="" style="width:100%;">
                                @endif
                                <hr>
                            @endforeach
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @endif

    @push('script')
        <script>
            const myCarousel = document.querySelector('#myCarousel');
            const carousel = new bootstrap.Carousel(myCarousel, {
                interval: 2000,
                wrap: false,
                loop: true
            });

        </script>
        <script>
            let items = document.querySelectorAll('#galleryCarousel .carousel-item')
            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })

        </script>
        <script>
            $(document).ready(function () {
                $("#noticeModal").modal("show");
                setTimeout(function () {
                    $('#noticeModal').modal('hide');
                }, 10000);
            });
        </script>

    @endpush
@endsection
