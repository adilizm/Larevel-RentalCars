@extends('layouts\private_layouts\master')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="card mb-4 mt-3">
                        @if (session()->has('Order_Canceld'))
                        <div class="alert alert-warning" role="alert">
                            Order is Deleted 
                          </div>
                        @endif
                        @if (session()->has('Car_out'))
                        <div class="alert alert-success" role="alert">
                            Car is Out Good order 
                          </div>
                        @endif
                        @if (session()->has('Note'))
                        <div class="alert alert-primary" role="alert">
                            {{session()->get('Note')}}
                          </div>
                        @endif
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Confirmed Orders
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead id="hee">
                                    <tr id="nnnn">
                                        <th>Tools</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email </th>
                                        <th>Country </th>
                                        <th>Car Model</th>
                                        <th>Number days</th>
                                        <th>Price</th>
                                        <th>Start Rent</th>
                                        <th>End's Rent</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex ">
                                                    
                                                    <a href="{{route('edit2',$order->id)}}"
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
                                            <td>{{ $order->Costumer_First_name .' '.$order->Costumer_Last_name }}</td>
                                            <td>{{ $order->Phone_number}}</td>
                                            <td>{{ $order->Costumer_email }}</td>
                                            <td>{{ $order->client_Country }}</td>
                                            <td>{{ $order->Car->model }}</td>
                                            <td>{{ $Number_days[$loop->index] }}</td>
                                            <td>{{ $Price[$loop->index] }}</td>
                                            <td>{{ $order->Start_renting .' at '. $order->start_hour }}</td>
                                            <td>{{ $order->End_renting .' at '. $order->Finish_hour }}</td>
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
