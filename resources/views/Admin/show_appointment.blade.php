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

        <div style="margin-top: 150px;">
            <table class="text-center" cellpadding="5px;" cellspacing="0">
                <thead class="bg-light">
                    <tr>
                        <th class="text-dark" scope="col">Customer Name</th>
                        <th class="text-dark" scope="col">Email</th>
                        <th class="text-dark" scope="col">Phone</th>
                        <th class="text-dark" scope="col">Doctor Name</th>
                        <th class="text-dark" scope="col">Date</th>
                        <th class="text-dark" scope="col">Message</th>
                        <th class="text-dark" scope="col">Status</th>
                        <th class="text-success" scope="col">Approved</th>
                        <th class="text-danger" scope="col">Cancel</th>
                        <th class="text-primary" scope="col">Send Mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $appointments)
                        <tr>
                            <th class="text-light" scope="row">{{ $appointments->name }}</th>
                            <td class="text-light">{{ $appointments->email }}</td>
                            <td class="text-light">{{ $appointments->phone }}</td>
                            <td class="text-light">{{ $appointments->doctor }}</td>
                            <td class="text-light">{{ $appointments->date }}</td>
                            <td class="text-light">{{ $appointments->message }}</td>
                            <td class="text-light">{{ $appointments->status }}</td>
                            <td class="text-light"><a href="{{ url('approved', $appointments->id) }}"
                                    class="btn btn-outline-success">Approved</a></td>
                            <td class="text-light"><a href="{{ url('canceled', $appointments->id) }}"
                                    class="btn btn-outline-danger">Canceled</a></td>
                            <td class="text-light"><a href="{{ url('email_view', $appointments->id) }}"
                                    class="btn btn-outline-primary">Send Mail</a></td>
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
