<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('Admin.css')
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

        <div class="container mb-5" style="margin-top: 120px; margin-left:100px; width:1000px;">
            <table class="table mt-5 mb-5">
                <thead class="bg-light">
                    <tr>
                        <th class="text-dark" scope="col">Doctor Name</th>
                        <th class="text-dark" scope="col">Phone</th>
                        <th class="text-dark" scope="col">Speciality</th>
                        <th class="text-dark" scope="col">Room No</th>
                        <th class="text-dark" scope="col">Image</th>
                        <th class="text-danger" scope="col">Delete</th>
                        <th class="text-primary" scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <th class="text-light" scope="row">{{ $doctor->name }}</th>
                            <td class="text-light">{{ $doctor->Phone }}</td>
                            <td class="text-light">{{ $doctor->Speciality }}</td>
                            <td class="text-light">{{ $doctor->Room }}</td>
                            <td class="text-light"><img style="width: 70px; height:70px;"
                                    src="Doctor_Image/{{ $doctor->Image }}" alt=""></td>
                            <td class="text-light"><a onclick="return confirm('Are you sure you want to delete Dr ?')"
                                    href="{{ url('delete_doctor', $doctor->id) }}"
                                    class="btn btn-outline-danger">Delete</a></td>
                            <td class="text-light"><a href="{{ url('update_doctor', $doctor->id) }}"
                                    class="btn btn-outline-primary">Update</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



        <!-- container-scroller -->
        <!-- plugins:js -->

        @include('Admin.script')
</body>

</html>
