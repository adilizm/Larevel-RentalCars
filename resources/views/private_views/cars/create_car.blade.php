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
            <div class="container m-auto mt-2">
                <form style="margin-top: 2rem;" action="{{ route('car.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Model</label>
                            <input type="text" class="form-control" id="inputEmail4" name="model">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Brand</label>
                            <select class="custom-select custom-select-md" name="brand_id">
                                <option selected>Open this select menu</option>
                               @foreach ($brands as $brand)
                               <option value="{{$loop->index+1}}">{{$brand->brand_name}}</option>
                               @endforeach
                               
                             
                            </select>
                            <!-- <input type="hidden" name="brand">  -->
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">plaka</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1111-d-1" name="plaka">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="d-block mt-1" for="inlineRadio1">Type Carburant</label>
                            <div class="form-check form-check-inline" style="margin-left: 1.5rem;">
                                <input class="form-check-input" type="radio" name="type_fule" id="inlineRadio1"
                                    value="essance">
                                <label class="form-check-label" for="inlineRadio1">Essance</label>
                            </div>
                            <div class="form-check form-check-inline" style="margin-left: 1.5rem;">
                                <input class="form-check-input" type="radio" name="type_fule" id="inlineRadio2"
                                    value="Diesel">
                                <label class="form-check-label" for="inlineRadio2">Diesl</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState"> Car type</label>
                            <select id="inputState" class="form-control" name="type_car">
                                <option selected>Choose...</option>
                                <option>Sport</option>
                                <option>SUV</option>
                                <option>Confort</option>
                                <option>Normal</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Gear type</label>
                            <select id="inputState" class="form-control" name="gear_type">
                                <option selected>Choose...</option>
                                <option>Auto</option>
                                <option>Manual</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Number seates</label>
                            <select id="inputState" class="form-control" name="Seat_number">
                                <option selected>Choose...</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group ">

                        <label class="label" for="discr">Car Discription</label>
                        <textarea class="form-control" style="max-height: 120px" name="car_description" id="discr" cols="30"
                            rows="10"></textarea>

                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" onchange="myFunction(this)" class="custom-file-input" name="images[]" multiple>
                            <label class="custom-file-label" id="file_lable">Choose file</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Number balisat</label>
                            <select id="inputState" class="form-control" name="Number_balisat">
                                <option selected>Choose...</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>4+</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Number Doors</label>
                            <select id="inputState" class="form-control" name="Door_number">
                                <option selected>Choose...</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Number passangers</label>
                            <select id="inputState" class="form-control" name="Number_perso">
                                <option selected>Choose...</option>
                                <option>2</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6+</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Speet to 100Km</label>
                            <input type="number" name="speedTo100km">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Hors power</label>
                            <input type="number" name="hors_power">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Engin Model</label>
                            <input type="text" name="motor_model">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputState">Price One day</label>
                            <input type="number" name="Price_one_day">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Car price</label>
                            <input type="number" name="car_price">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Distance Fee</label>
                            <input type="text" name="Distance_fee">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right p-2 px-2" style="padding-right: 2rem !important;
                                                padding-left: 2rem !important;">Add</button>
                </form>


            </div>
        </main>
        <script>
            function myFunction(fileInput) {
                var files = fileInput.files;
                for (var i = 0; i < files.length; i++) {
                    if (i == 0) {
                        let fileType = files[i].type;
                        let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
                        if (!validExtensions.includes(fileType)) {
                            alert("invalide file selected pleas try again");
                            break;
                        }
                        document.getElementById("file_lable").innerHTML = files[i].name;
                    } else {
                        document.getElementById("file_lable").innerHTML = document.getElementById("file_lable").innerText +
                            " | " + files[i].name;
                    }


                }
            }
        </script>
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
