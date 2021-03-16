@extends('layouts.private_layouts.master')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container m-auto mt-2 ">
            <div class="my-4">
                <h1>Create New Brand</h1>
            </div>
            <form class="m-2" method="POST" action="{{route('brand.store')}}">
                @csrf

            <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-lg">Brand name</span>
                </div>
                <input type="text" class="form-control" name="brand_name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
              </div>
              <input type="submit" class="btn btn-primary m-2 float-right px-2" value="Add">
            </form>
        </div>
    </main>
   
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection