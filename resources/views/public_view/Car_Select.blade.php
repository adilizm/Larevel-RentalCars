@extends('layouts.public_layouts.public_master')

@section('content')
@if (session()->has('Make_Order'))
<div class="alert alert-success" role="alert">
    Your Order is Accepted TankYou - we will call you stay in touch
  </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="position-relative">
        @extends('layouts.public_layouts.public_navBar')
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($car[0]->Images as $image)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="active"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($car[0]->Images as $image)
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
    <div class="container">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row my-3 ">
                <div class="col-sm-12 col-md-4 col-lg-4 text-uppercase font-weight-bold  my-3 " style="font-size: 25px">
                    {{ $car[0]->model }}</div>
                <div class="col-sm-12 col-md-8 col-lg-8 align-self-center">
                    <div class="row">
                        <div class=" col-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="d-flex">
                                <img src="images/icones/star-ico.png" alt="star">
                                <img src="images/icones/star-ico.png" alt="star">
                                <img src="images/icones/star-ico.png" alt="star">
                                <img src="images/icones/star-ico.png" alt="star">
                                <img src="images/icones/star-ico.png" alt="star">
                            </div>
                            <div>4.9 out of 5.0</div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 float-right" style="font-size: 23px"> <b>$
                                {{ $car[0]->Price_one_day }} a day</b> </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <p> <b> Discription</b> <br>{{ $car[0]->car_description }}</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class=" mx-1">
                    <div class="d-flex m-2"><img class="" style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                            src="images/icones//user-ico.svg" alt=""> <span
                            style="font-size: small;">{{ $car[0]->Number_perso }} seats</span>
                    </div>

                    <div class="d-flex m-2"><img class="" style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                            src="images/icones/door-ico.svg" alt=""> <span
                            style="font-size: small;">{{ $car[0]->Door_number }} Doors</span>
                    </div>

                    <div class="d-flex m-2"><img class="" style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                            src="images/icones/pack-ico.svg" alt=""> <span
                            style="font-size: small;">{{ $car[0]->Number_balisat }} Suitcases</span>
                    </div>
                    <div class="d-flex m-2"><img class="" style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                            src="images/icones/price-ico.svg" alt=""> <span
                            style="font-size: small;">${{ $car[0]->car_price }}</span>
                    </div>

                    <div class="d-flex m-2"><img class="" style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                            src="images/icones/transm-ico.svg" alt=""> <span
                            style="font-size: small;">{{ $car[0]->gear_type }}</span>
                    </div>
                    <div class="d-flex m-2"><img class="" style="width: 1rem; vertical-align: middle;margin-right: 0.3rem;"
                            src="images/icones/power-ico.svg" alt=""> <span
                            style="font-size: small;">{{ $car[0]->hors_power }}Hp</span>
                    </div>
                    <div class="d-flex m-2"><span>⛽ {{ $car[0]->type_fule }}</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class=" d-block "><b>Distance per day </b> <b> 100 mi </b> </br> US${{ $car[0]->Distance_fee }}/mi
                    fee
                    for additional Kilometre
                    <hr>
                </div>
                <div class=" d-block "><b>Enhance Clean </b></br> 5-step enhanced cleaning process
                    <hr>
                </div>
                <div class=" d-block "><b>Free delivery </b></br> At Agadir International Airport </div>
            </div>
        </div>

        <div class="container my-5 ">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <form action="{{ route('Order.store') }} " method="POST">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car[0]->id }}" class="form-control"
                            id="inputEmail4">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control" name="Costumer_First_name" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Last Name</label>
                                <input type="text" class="form-control" name="Costumer_Last_name" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Phone Number</label>
                                <input type="text" class="form-control" name="Phone_number" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="Costumer_email" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Rent start from </label>
                                <input id="Start_renting" type="text" name="Start_renting"
                                    class="form-control Start_renting" value="Select Date Start" />
                                <!-- <input type="date"  name="Start_renting" id="Start_renting">-->
                                <label for="inputEmail4">In :</label>
                                <input type="time" class="form-control" name="start_hour" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="End_renting">To </label>
                                <input id="End_renting" type="text" name="End_renting" class="form-control Start_renting"
                                    value="Select Date End" />
                                <label for="inputEmail4">In :</label>
                                <input type="time" class="form-control" name="Finish_hour" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Contry of Origin</label>
                                <input type="text" class="form-control" name="client_Country" id="inputCity">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" required type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    I'm Over 25 years old
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" required type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Agree <a href="#"> Terms and Conditions</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right  " style=" width:20%">Sent</button>
                    </form>
                </div>
                <div
                    class="col-12 col-sm-12 col-md-6 col-lg-6 text-center d-none d-sm-block d-md-block d-lg-block d-xl-block">
                    <img src="images/Car-Rent-Vector-Illustration.png" alt=" image" style="height: 60%;">
                </div>
            </div>
        </div>


        <script type="text/javascript">
            var orders = @json($orders);
            var dateRange = [];

            for (let i = 0; i < orders.length; i++) {
                if (i % 2 === 0) {

                    var startDate = orders[i], // some start date
                        endDate = orders[i + 1]; // some end date

                    // populate the array
                    for (var d = new Date(startDate); d <= new Date(endDate); d.setDate(d.getDate() + 1)) {
                        dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
                    }

                }
            }


            $('#Start_renting').datepicker({
                minDate: 0,
                beforeShowDay: function(date) {
                    var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    return [dateRange.indexOf(dateString) == -1];
                }
            });
            $('#End_renting').datepicker({
                minDate: 0,
                beforeShowDay: function(date) {
                    var dateString = jQuery.datepicker.formatDate('yy-mm-dd', date);
                    return [dateRange.indexOf(dateString) == -1];
                }
            });

        </script>
    </div>
@endsection
