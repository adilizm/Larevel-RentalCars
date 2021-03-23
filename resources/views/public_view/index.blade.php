@extends('layouts.public_layouts.public_master')

@section('content')
@if (session()->has('Make_Order'))
    
<div class="alert alert-success" role="alert">
    Your Order is Accepted - we will call you stay in touch 
  </div>

@endif
    <div class="position-relative">
        @extends('layouts.public_layouts.public_navBar')
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sliders as $slider)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="active"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item @if ($loop->index == 0) active @endif ">
                        <img src="{{ '/sliders/' . $slider->Slide_link }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->Titel }}</h5>
                            <p>{{ $slider->Discription }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <!-- start car Card -->
    <div class="container cars-section">
        <h1 class="justify-content-center mt-4 carter">Pick your next ride</h1>
        <div class="row ">
            @foreach ($cars as $car)
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div id="carouselExampleIndicators{{ $car->id }}" class="carousel slide" data-interval="false"
                        data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($car->Images as $image)
                                <li data-target="#carouselExampleIndicators{{ $car->id }}"
                                    data-slide-to="{{ $loop->index }}" class="@if ($loop->first) active @endif "></li>
                            @endforeach


                        </ol>
                        <div class="carousel-inner" style="border-radius:20px">
                            <a href="{{route('carselected',$car->id)}}">
                            @foreach ($car->Images as $image)
                                <div class="carousel-item @if ($loop->first) active @endif ">
                                    <img src="{{ '/images/' . $image->image_link }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </a>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $car->id }}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators{{ $car->id }}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="pt-3"><a class="text-decoration-none car-name" style="font-size: 26.25px; color: #232f3b;font-weight:
                            600; font-family: Fira sans;" href="#">{{ $car->model }}</a>
                        <div class="d-block mt-3">
                            <div class="d-flex">
                                <div class="d-flex mr-2"><img class=""
                                        style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                                        src="images/icones//user-ico.svg" alt=""> <span
                                        style="font-size: small;">{{ $car->Number_perso }}</span>
                                </div>

                                <div class="d-flex mx-2"><img class=""
                                        style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                                        src="images/icones/door-ico.svg" alt=""> <span
                                        style="font-size: small;">{{ $car->Door_number }}</span>
                                </div>

                                <div class="d-flex mx-2"><img class=""
                                        style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                                        src="images/icones/pack-ico.svg" alt=""> <span
                                        style="font-size: small;">{{ $car->Number_balisat }}</span>
                                </div>

                                <div class="d-flex mx-2"><img class=""
                                        style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                                        src="images/icones/transm-ico.svg" alt=""> <span
                                        style="font-size: small;">{{ $car->gear_type }}</span></div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-primary  px-3 rounded-pill">Book Now</a>
                            <h2 class=" text-danger float-right"> from {{$car->Price_one_day}}/day</h2>
                        </div>
                    </div>

                    <hr>
                </div>

            @endforeach
        </div>
    </div>



@endsection
