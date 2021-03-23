@extends('layouts\private_layouts\master')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                    @if (session()->has('order'))
                    <div class="alert alert-primary" role="alert">
                        {{ session()->get('order')}}
                      </div>                   
                    @endif
                <div class="card mb-4 mt-3">
                       
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Runing Orders 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead id="hee">
                                    <tr id="nnnn">
                                        <th>Tools</th>
                                        <th>Out since</th>
                                        <th>Arrive in</th>
                                        <th>Days left</th>
                                        <th>Name</th>
                                        <th>Model </th>
                                        <th>Phone</th>
                                        <th>Price</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex ">
                                                   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_{{$order->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
    <path  d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
  </svg></button>
  
  <!-- Modal -->
  <div class="modal fade" id="Modal_{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">End of the Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         Warning!! <br> You will end this rent, Are you sure ??
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('end_rent',$order->id)}}" class="btn btn-warning">Car is back</a>
        </div>
      </div>
    </div>
  </div>
                                                </div>
                                                    </td>
                                           
                                            <td>{{ $order->Start_renting .' in '. $order->start_hour}}</td>
                                            <td>{{ $order->End_renting.' in '.$order->Finish_hour }}</td>
                                            <td>{{$days_left[$loop->index]}}</td>
                                            <td>{{ $order->Costumer_First_name .' '.$order->Costumer_Last_name }}</td>
                                            <td>{{ $order->car->model }}</td>
                                            <td>{{ $order->Phone_number }}</td>
                                            <td>{{ $order->Price }}</td>
                                            <td>{{ $order->Note }}</td>
                                    @endforeach
                                </tbody>
                            </table>
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
