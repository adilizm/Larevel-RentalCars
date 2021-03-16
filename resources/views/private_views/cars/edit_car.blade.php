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
                <form style="margin-top: 2rem;" action="{{ route('car.update', $car->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6"><a href="#" onclick="s()">alert images</a>
                            <label for="inputEmail4">Model</label>
                            <input type="text" class="form-control" value="{{ $car->model }}" id="inputEmail4"
                                name="model">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Brand</label>
                            <select class="custom-select custom-select-md" name="brand_id">
                                <option>Open this select menu</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @if ($loop->index + 1 == $car->brand_id) selected @endif>{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">plaka</label>
                            <input type="text" class="form-control" id="inputAddress" value="{{ $car->plaka }}"
                                placeholder="1111-d-1" name="plaka">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="d-block mt-1" for="inlineRadio1">Type Carburant</label>
                            <div class="form-check form-check-inline" style="margin-left: 1.5rem;">
                                <input class="form-check-input" @if ($car->type_fule == 'essance') checked @endif type="radio" name="type_fule" id="inlineRadio1"
                                    value="essance">
                                <label class="form-check-label" for="inlineRadio1">Essance</label>
                            </div>
                            <div class="form-check form-check-inline" style="margin-left: 1.5rem;">
                                <input class="form-check-input" @if ($car->type_fule == 'Diesel') checked @endif type="radio" name="type_fule" id="inlineRadio2"
                                    value="Diesel">
                                <label class="form-check-label" for="inlineRadio2">Diesl</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex">
                        <div class="custom-file col-md-6">
                            <input type="file" onchange="myFunction(this)" class="custom-file-input" name="images[]"
                                multiple>
                            <label class="custom-file-label" id="file_lable">Choose file</label>
                        </div>
                        <div class=" col-md-6">
                            <div class="row">
                                <div class="col-12 " id="lastimages">
                                    @foreach ($car->Images as $image)
                               
                                        <span class="position-relative span">
                                            <img class="m-1 images"  src="{{'/images/'. $image->image_link }}" alt="image" height="80px">
                                            <input type="hidden" class="inpuut"  name="{{'image'.$image->id}}" value="{{$image->image_link}}">
                                            <a class="position-absolute text-danger delet link1"  id="{{$loop->index}}" onclick="deleted(this.id)" style=" left:10px;" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg></a>
                                            <a class="position-absolute  text-danger recovery link1" hidden id="{{$loop->index}}" onclick="reovread(this.id)" style=" left:10px;" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                            </svg></a>
                                        </span>
                           
                                        
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState"> Car type</label>
                                <select id="inputState" class="form-control" name="type_car">
                                    <option>Choose...</option>
                                    <option @if ($car->type_car == 'Sport') selected @endif>Sport</option>
                                    <option @if ($car->type_car == 'SUV') selected @endif>SUV</option>
                                    <option @if ($car->type_car == 'Confort') selected @endif>Confort</option>
                                    <option @if ($car->type_car == 'Normal') selected @endif>Normal</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Gear type</label>
                                <select id="inputState" class="form-control" name="gear_type">
                                    <option>Choose...</option>
                                    <option @if ($car->gear_type == 'Auto') selected @endif>Auto</option>
                                    <option @if ($car->gear_type == 'Manual') selected @endif>Manual</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Number seates</label>
                                <select id="inputState" class="form-control" name="Seat_number">
                                    <option>Choose...</option>
                                    <option @if ($car->Seat_number == '2') selected @endif>2</option>
                                    <option @if ($car->Seat_number == '3') selected @endif>3</option>
                                    <option @if ($car->Seat_number == '4') selected @endif>4</option>
                                    <option @if ($car->Seat_number == '5') selected @endif>5</option>
                                    <option @if ($car->Seat_number == '6') selected @endif>6</option>
                                    <option @if ($car->Seat_number == '7') selected @endif>7</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="label" for="discr">Car Discription</label>
                            <textarea class="form-control" style="max-height: 120px" name="car_description" id="discr"
                                cols="30" rows="10">{{ $car->car_description }}</textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Number balisat</label>
                                <select id="inputState" class="form-control" name="Number_balisat">
                                    <option>Choose...</option>
                                    <option @if ($car->Number_balisat == '1') selected @endif>1</option>
                                    <option @if ($car->Number_balisat == '2') selected @endif>2</option>
                                    <option @if ($car->Number_balisat == '3') selected @endif>3</option>
                                    <option @if ($car->Number_balisat == '4') selected @endif>4</option>
                                    <option @if ($car->Number_balisat == '5') selected @endif>4+</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Number Doors</label>
                                <select id="inputState" class="form-control" name="Door_number">
                                    <option>Choose...</option>
                                    <option @if ($car->Door_number == '2') selected @endif>2</option>
                                    <option @if ($car->Door_number == '3') selected @endif>3</option>
                                    <option @if ($car->Door_number == '4') selected @endif>4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Number passangers</label>
                                <select id="inputState" class="form-control" name="Number_perso">
                                    <option selected>Choose...</option>
                                    <option @if ($car->Number_perso == '2') selected @endif>2</option>
                                    <option @if ($car->Number_perso == '4') selected @endif>4</option>
                                    <option @if ($car->Number_perso == '5') selected @endif>5</option>
                                    <option @if ($car->Number_perso == '6') selected @endif>6+</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Speet to 100Km</label>
                                <input type="number" value="{{ $car->speedTo100km }}" name="speedTo100km">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Hors power</label>
                                <input type="number" value="{{ $car->hors_power }}" name="hors_power">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Engin Model</label>
                                <input type="text" value="{{ $car->motor_model }}" name="motor_model">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Price One day</label>
                                <input type="number" value="{{ $car->Price_one_day }}" name="Price_one_day">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Car price</label>
                                <input type="number" value="{{ $car->car_price }}" name="car_price">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Distance Fee</label>
                                <input type="text" value="{{ $car->Distance_fee }}" name="Distance_fee">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right p-2 px-2" style="padding-right: 2rem !important;
                                    padding-left: 2rem !important;">Update</button>
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

let images =document.querySelectorAll(".images");
let delets =document.querySelectorAll(".delet");
let recovery =document.querySelectorAll(".recovery");
let images_inputes=document.querySelectorAll(".inpuut");

function deleted(clickedid){
    images[clickedid].classList.add('makeBlur');
    delets[clickedid].setAttribute("hidden", true);
    recovery[clickedid].removeAttribute("hidden");
    images_inputes[clickedid].setAttribute("value","");
}
function reovread(clickedid){
    images[clickedid].classList.remove('makeBlur');
    delets[clickedid].removeAttribute("hidden");
    recovery[clickedid].setAttribute("hidden",true);
    let val=images[clickedid].getAttribute("src".toString())
    images_inputes[clickedid].setAttribute("value", val.substring(8));
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
