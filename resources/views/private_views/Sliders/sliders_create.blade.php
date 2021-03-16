@extends('layouts.private_layouts.master')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container m-auto mt-2 ">
                <div class="my-4">
                    <h1>Sliders Managment</h1>
                </div>
                <form class="m-2" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label for="titel">Titel</label>
                        <input type="text" class="form-control" value="" id="titel" name="Titel">
                    </div>

                    <div class="form-group ">
                        <label class="label" for="discr">Car Discription</label>
                        <textarea class="form-control" style="max-height: 120px" name="Discription" id="discr" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" onchange="myFunction(this)" class="custom-file-input" name="Slide_link">
                            <label class="custom-file-label" id="file_lable">Choose file</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary m-2 float-right px-2" value="Add">
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
