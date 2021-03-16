@extends('layouts.public_layouts.public_master')

@section('content')
<div class="position-relative">
    @extends('layouts.public_layouts.public_navBar')
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($yy[0]->Images as $image)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="active"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($yy[0]->Images as $image)
                <div class="carousel-item @if ($loop->index == 0) active @endif ">
                    <img src="{{ '/images/' . $image->image_link }}" class="d-block w-100" alt="...">
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
@endsection
