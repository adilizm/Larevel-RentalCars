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
                <div><h1 class="titel m-2">New Employee</h1></div>
                <form style="margin-top: 2rem;" action="{{ route('employer.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Fonction</label>
                            <select class="custom-select custom-select-md" name="Fonction">
                                <option selected >admin</option>
                                <option>manager</option>
                                <option>worker</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control" id="inputEmail" placeholder="Exampel@Company.com" name="email">
                        </div>
                        <div class="form-group  col-md-6 ">
                            <label class="label" for="password">Password</label>
                            <input class="form-control"  name="password" id="password" ></input>
                        </div>
                    </div>

                   
                    <button type="submit" class="btn btn-primary float-right p-2 px-2" style="padding-right: 2rem !important;
                                                padding-left: 2rem !important;">Add</button>
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
