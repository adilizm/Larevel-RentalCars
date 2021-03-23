@extends('layouts\private_layouts\master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <script>
                function sync()
                {
                  var n1 = document.getElementById('note');
                  var n2 = document.getElementById('note2');
                  n2.value = n1.value;
                }
                </script>
            <div class="container m-auto mt-2">
                <form style="margin-top: 2rem;" action="{{ route('Order.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" class="form-control" value="{{ $order->Costumer_First_name }}"
                                id="inputEmail4" name="Costumer_First_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Last Name</label>
                            <input type="text" class="form-control" value="{{ $order->Costumer_Last_name }}"
                                id="inputEmail4" name="Costumer_Last_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Car Model</label>
                            <select id="inputState" class="form-control" name="model">
                                @foreach ($cars as $car)
                                    <option value="{{$car->model}}" @if ($car->id == $order->car_id) selected @endif>{{ $car->model }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Phone number</label>
                            <input type="text" class="form-control" id="inputAddress" value="{{ $order->Phone_number }}"
                                placeholder="Phone number" name="Phone_number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Email</label>
                            <input type="Email" class="form-control" id="inputAddress"
                                value="{{ $order->Costumer_email }}" placeholder="exam@izm.com" name="Costumer_email">
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Start date</label>
                            <input type="date" class="form-control" id="inputAddress" value="{{ $order->Start_renting }}"
                                name="Start_renting">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Time :</label>
                            <input type="time" class="form-control" id="inputAddress" value="{{ $order->start_hour }}"
                                placeholder="exam@izm.com" name="start_hour">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Ends date</label>
                            <input type="date" class="form-control" id="inputAddress" value="{{ $order->End_renting }}"
                                name="End_renting">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Time :</label>
                            <input type="time" class="form-control" id="inputAddress" value="{{ $order->Finish_hour }}"
                                placeholder="exam@izm.com" name="Finish_hour">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Price</label>
                            <input type="text" disabled class="form-control" id="inputAddress" value="{{ $order->Price }}"
                                name="Price">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputAddress">Costumer Country</label>
                            <input type="text" class="form-control" id="inputAddress"
                                value="{{ $order->client_Country }}" name="client_Country">
                        </div>
                        <div class="form-check form-check-inline mx-4">
                            <input class="form-check-input" type="checkbox" name="Confermed" id="inlineRadio1"
                                value="{{ $order->Confermed }}">
                            <label class="form-check-label" for="inlineRadio1"> Confermed </label>
                        </div>

                       
                      
                        <div class="form-check form-check-inline mx-3">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                Delete
                              </button>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress"> Note :</label>
                            <textarea class="form-control" onkeyup="sync()" id="note" name="Note">{{ $order->Note }} </textarea>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right p-2 px-2" style="padding-right: 2rem !important;
                                        padding-left: 2rem !important;">Update Order</button>
                </form>

<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deleting Order Alert</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('Order.destroy', $order->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <h4 class="text-danger">Order will be deleted ! <br> Are you sure ?</h4>
                <button type="button" class="btn btn-secondary btn-sm float-right mx-1" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-sm float-right mx-1"> Delete order </button>
                <input type="hidden" name="note" id="note2">
            </form>
        </div>
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
