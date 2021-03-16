@extends('layouts\private_layouts\master')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="card mb-4 mt-3">
                    @if (session()->has('added'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('added')}}
                      </div>
                    @endif
                    @if (session()->has('deleted'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('deleted')}}
                      </div>
                    @endif
                    @if (session()->has('Notadded'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('Notdeleted')}}
                      </div>
                    @endif
                    @if (session()->has('Notdeleted'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('Notdeleted')}}
                      </div>
                    @endif
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Sliders list
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead id="hee">
                                    <tr id="nnnn">
                                        <th>Tools</th>
                                        <th>Titel </th>
                                        <th>Discription </th>
                                        <th>Image </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Sliders as $slider)
                                        <tr>
                                            <td>
                                                <div class="d-flex ">
                                                    <form action="{{route('slider.destroy',$slider->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mr-1 "><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg></button>
                                                    </form>

                                                    <a href="{{route('slider.edit',$slider->id)}}"
                                                        class="btn btn-success btn-sm "><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-arrow-counterclockwise"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                            <path
                                                                d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                                        </svg></a>
                                                </div>
                                            </td>
                                            <td>{{ $slider->Titel }}</td>
                                            <td>{{ $slider->Discription}}</td>
                                            <td><img src="{{'sliders/'.$slider->Slide_link}}" alt="Slider" height="100px"></td>
                                            
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('slider.create')}}" class="btn btn-primary float-right"> New Slider</a>
                        </div>
                    </div>
                </div>
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
