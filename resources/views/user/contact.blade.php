
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>

    @include('layouts.links')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<style>
    .custom-bg {
        background-color: var(--teal);
        border: 1px solid var(--teal);

    }
</style>

<title>Reside Me _ contactus</title>

<body class="bg-light">

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark">
        </div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. In, dolorem delectus!<br>
            Error, deleniti est rerum, cum quisquam autem ipsum molestias, <br>
            odio nisi maiores ad blanditiis quam natus quasi! Veniam, illum!</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white ronded shadow p-4">
                    <iframe class="w-100 rounded mb-4S" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3377.5295951066378!2d74.19896347543325!3d32.16299082392641!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391f2a1b7a50fc9b%3A0x202625f2cca04e32!2sGovernment%20College%2C%20Gujranwala!5e0!3m2!1sen!2s!4v1720677886636!5m2!1sen!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <h5 class="">Address</h5>
                    <a href="https://maps.app.goo.gl/t3KJhv2xsngSkszL8" target="_blank" class="d-line-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> Govt. Post Graduate College Gujranwala,satellite town
                    </a>
                    <h5>CALL US</h5>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel: +923127557097" class="d-inline-block mb-2 text-decoration-none text-dark">+923127557097</a>

                    <br>
                    <i class="bi bi-telephone-fill"></i>
                    <a href="tel: +923127557097" class="d-inline-block text-decoration-none text-dark">+923127557097</a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: aqshaqsh01234@gmail.com" class="d-line-block text-decoration-none text-dark ">
                        <i class="bi bi-envelope-fill"></i> aqshaqsh1234@gmail.com
                    </a>

                    <h5 class="mt-4">Follow US</h5>
                    <a href="#" class="d-inline-block mb-3 text-dark fs-6 me-2">
                        <i class="bi bi-twitter"></i></a>
                    <a href="#" class="d-inline-block mb-3 text-dark fs-6 me-2">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-6 ">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white ronded shadow p-4 ">
                    <form action="" class="">
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500; ">Name</label>
                            <input type="text" class="form-control shadow-none">

                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500; ">Email</label>
                            <input type="email" class="form-control shadow-none">

                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500; ">Subject</label>
                            <input type="text" class="form-control shadow-none">

                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500; ">Message</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize:none;"></textarea>

                        </div>
                        <button type="submit" class="btn custom-bg text-dark  mt-3">Send</button>
                        <div class="container">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        
        <!-- Other home content goes here -->

        <h3>Submit Your Feedback</h3>

        <!-- Feedback submission form -->
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="message">Your Feedback:</label>
                <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mt-2">Submit Feedback</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

                    </form>
                </div>
            </div>

        </div>
    </div>


    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
@endsection