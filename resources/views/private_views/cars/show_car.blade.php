@extends('layouts\private_layouts\master')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="card mb-4 mt-3">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Cars list
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead id="hee">
                                    <tr id="nnnn">
                                        <th>Tools</th>
                                        <th>Car Model</th>
                                        <th>Car brand</th>
                                        <th>car_description </th>
                                        <th>Price_one_day </th>
                                        <th>car_price </th>
                                        <th>type_fule </th>
                                        <th>type_car </th>
                                        <th>plaka </th>
                                        <th>speedTo100km </th>
                                        <th>Number_perso </th>
                                        <th>Number_balisat </th>
                                        <th>Door_number </th>
                                        <th>Seat_number </th>
                                        <th>gear_type </th>
                                        <th>motor_model </th>
                                        <th>hors_power </th>
                                        <th>Distance_fee </th>
                                        <th>Images</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $car)
                                        <tr>

                                            <td>
                                                <div class="d-flex flex-column">
                                                    <form action="{{ route('car.destroy', $car->id) }}" method="POST">
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

                                                    <a href="#" class="btn btn-info btn-sm "><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                            <path
                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                        </svg></a>
                                                    <a href="{{ route('car.edit', $car->id) }}"
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
                                            <td>{{ $car->model }}</td>
                                            <td>{{ $car->brand->brand_name }}</td>
                                            <td>{{ $car->car_description }}</td>
                                            <td>{{ $car->Price_one_day }}</td>
                                            <td>{{ $car->car_price }}</td>
                                            <td>{{ $car->type_fule }}</td>
                                            <td>{{ $car->type_car }}</td>
                                            <td>{{ $car->plaka }}</td>
                                            <td>{{ $car->speedTo100km }}</td>
                                            <td>{{ $car->Number_perso }}</td>
                                            <td>{{ $car->Number_balisat }}</td>
                                            <td>{{ $car->Door_number }}</td>
                                            <td>{{ $car->Seat_number }}</td>
                                            <td>{{ $car->gear_type }}</td>
                                            <td>{{ $car->motor_model }}</td>
                                            <td>{{ $car->hors_power }}</td>
                                            <td>{{ $car->Distance_fee }}</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            @foreach ($car->Images as $image)
                                                                <img src="{{ '/images/' . $image->image_link }}" alt=""
                                                                    height="25px">
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
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
