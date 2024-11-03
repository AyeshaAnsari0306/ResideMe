<!DOCTYPE html>
<html>
    <head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    </head>
    <title>Reside Me</title>
    <body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#"><b>Reside Me</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('user.rooms') }}">Rooms</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="{{url('/facilities')}}">Facilitiess</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="{{url('/contact')}}">Contact us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link me-2" href="{{url('/about')}}">About</a>
                    </li>
                </ul>
                    <div class="d-flex">
                        <!-- Button trigger modal -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="#" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
    </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>       
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center" >
                            <i class="bi bi-person fs-3 me-1"></i>User Login</h5>
                            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control shadow-none">
                            
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control shadow-none">
                            
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb">
                                <button type="submit" class="btn btn-dark shadow-none">login</button>
                                <a href="javascript: void(0)" class="text-secondary text-deoration-none ">Forget Password ?</a>
                            
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="registermodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form>       
                        <div class="modal-header">
                            <h5 class="modal-title d-flex align-items-center" >
                            <i class="bi bi-person-add fs-3 me-1"></i>User register</h5>
                            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                                Note:your details must match with your id 
                            </span>
                            <div class="container-fluid">
                                <div  class="row">
                                    <div class="col-md-6 ps-0 md-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-6 p-0 md-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control shadow-none">
                                    
                                    </div>
                                    <div class="col-md-6 ps-0 md-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-6 p-0 md-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-6 ps-0 md-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-6 p-0 md-3">
                                        <label class="form-label">Picture</label>
                                        <input type="file" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-6 ps-0 md-3">
                                        <label class="form-label">Pincode</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-6 p-0 md-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-12 p-0 md-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control shadow-none" rows="1" ></textarea>
                                    </div>
                                    <div class="col-md-6 ps-0 md-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control shadow-none">
                                    </div>
                                    <div class="col-md-6 p-0 md-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control shadow-none">
                                    </div>

                                </div>
                            </div>

                            <div class="text-center mt-3">
                            <button type="submit" class="btn btn-dark shadow-none">register</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>