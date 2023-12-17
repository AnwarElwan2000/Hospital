<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">

    @include('Admin.css')
    <style>
        #form_style {
            background: black;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                                more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->

        @include('Admin.sidebar')

        <!-- partial -->

        @include('Admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper mb-5">
            <div class="container" align="center" style="padding-top:100px;">
                <h1 class="mb-5">Update Doctors</h1>

                @if (session()->has('message'))
                    <div class="alert alert-success mt-3 w-50">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <form action="{{ url('edit_doctor', $doctors->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group w-50">
                        <label>Add Doctor</label>
                        <input type="text" id="form_style" value="{{ $doctors->name }}" class="form-control"
                            name="name">
                    </div>

                    <div class="form-group w-50">
                        <label>Phone Number</label>
                        <input type="number" id="form_style" value="{{ $doctors->Phone }}" class="form-control"
                            name="phone">
                    </div>

                    <div class="form-group w-50">
                        <label>Speciality</label>
                        <input type="text" id="form_style" value="{{ $doctors->Speciality }}" class="form-control"
                            name="speciality">
                    </div>

                    <div class="form-group w-50">
                        <label>Room Number</label>
                        <input type="text" value="{{ $doctors->Room }}" id="form_style" class="form-control"
                            name="room">
                    </div>

                    <div class="form-group w-50">
                        <label>Old Image</label>
                        <img src="Doctor_Image/{{ $doctors->Image }}" alt="">
                    </div>

                    <div class="form-group w-50">
                        <label>Doctor Image</label>
                        <input type="file" id="doctor_file" name="doctor_img" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->

        @include('Admin.script')
</body>

</html>
