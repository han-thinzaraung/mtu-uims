@extends('layouts.app')

@section('content')
<div class="">
<section id="header">
        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow fixed-top">
            <div class="container-fluid col-md-10">
                <!-- Navbar Brand (Logo) -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('dist/img/login/Logo.png')}}" alt="Logo" height="40">
                </a>
    
                <!-- Navbar Toggler Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link font-style" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-style" href="#login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-style" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-style" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-style" href="#contact">Contact Us</a>
                        </li>
                    </ul>
                    <!-- <form class="d-flex">
                        <button class="btn btn-outline-dark mx-2 rounded-pill font-style" type="button">Contact Us</button>
                    </form> -->
                </div>
            </div>
        </nav>
    </section>
    
    <!-- End Header Section -->

    <!-- Start Home Section -->
    <section id="home" class="bg-light">
        <div class="relative-container">
            <img src="{{ asset('dist/img/login/background_white.jpg') }}" alt="Bagan" class="responsive-image" />
            <div class="text-overlay">
                <p class="text-style">Welcome To MTU Information Management System </p>
            </div>
        </div>
        <div class="container-fluid col-md-10 mt-3 p-3">
            <div class="row section-theme">
                <div class="col-md-7 order-md-2 p-4 mt-3">
                    <div class="card rounded-4 border-0 shadow">
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="0"
                                    class="active"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('dist/img/login/img1.jpg') }}" alt="" class="d-block w-100 h-auto carousel-image rounded-4" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('dist/img/login/img1.jpg') }}" alt="" class="d-block w-100 h-auto carousel-image rounded-4" />
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#demo"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-md-5 order-md-1 mt-4 p-4">
                    <div>
                        <h4 class="text-dark text-center">MTU UNIVERSITY INFORMATION MANAGEMENT SYSTEM </h4>
                        <p class='text-dark py-3 text-center mb-3'>MTU University Information Management System is a
                            web-based university information management system for computerization of all the
                            information and activities of Mandalay Techonological University.</p>
                    </div>
                    <div class="floating-images">
                        <img src="{{ asset('dist/img/login/floating1.jpg') }}" alt="Floating Image 1" />
                        <img src="{{ asset('dist/img/login/floating2.jpg') }}" alt="Floating Image 1" />
                        <img src="{{ asset('dist/img/login/floating3.jpg') }}" alt="Floating Image 2" />
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Home Section -->
    <!-- Start Login Section -->
    <section id="login">
        <div class="container-fluid col-md-10 mt-3">
            <div class="row my-5 py-3 justify-content-between">
                <!-- Image Column  -->
                <div class="col-md-6 d-none d-md-block mt-5"> <!-- Hidden on mobile screens (col-12) -->
                    <img src="{{ asset('dist/img/login/login1.jpg') }}" alt="Login Image" class="img-fluid login-image rounded-4">
                </div>
                <!-- Login Form Column -->
                <div class="col-md-6">
                    <form class="login-form px-5 rounded-4 ms-auto" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2 class="m-4 font-style text-center">LOGIN</h2>
                        <!-- <div class="form-group my-3">
                            <label for="name" class="py-2">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div> -->
                        <div class="form-group my-3">
                            <label for="email" class="py-2">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-3">
                            <label for="password" class="py-2">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center my-3">
                            <button type="submit" class="btn btn-outline-dark btn-block"
                                style="width: 200px;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login Section -->
      <!-- Start Features Section -->
      <section id="features" class="bg-light">
        <div class="container-fluid col-md-10 mx-auto">
            <div class="text-center mt-3">
                <h2 class="font-style py-3">FEATURES</h2>
                <p class="texts text-center font-style">Features of MTU University Information Management System</p>
            </div>
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-md-5">
                    <div class="row m-2">
                        <div class="col-md-2 text-bg-info text-light rounded-4 d-flex align-items-center icon-card">
                            <svg class="bi bi-app-indicator" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z">
                                </path>
                                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-dark">Administrator Role</h5>
                            <p class="texts">He or She can create,view,update and delete users, assign agents and can
                                create,view,update and delete university news.</p>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-2 text-bg-warning text-light rounded-4 d-flex align-items-center icon-card">
                            <svg class="bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.854 7.146a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L2.5 8.207l1.646 1.647a.5.5 0 0 0 .708-.708l-2-2zm13-1a.5.5 0 0 0-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M8 3a4.995 4.995 0 0 0-4.192 2.273.5.5 0 0 1-.837-.546A6 6 0 0 1 14 8a.5.5 0 0 1-1.001 0 5 5 0 0 0-5-5zM2.5 7.5A.5.5 0 0 1 3 8a5 5 0 0 0 9.192 2.727.5.5 0 1 1 .837.546A6 6 0 0 1 2 8a.5.5 0 0 1 .501-.5z">
                                </path>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-dark card_text">Agent Role</h5>
                            <p class="texts">He or She can create,view and update assigned users and can create,view and
                                update university news.</p>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-2 text-bg-danger text-light rounded-4 d-flex align-items-center icon-card">
                            <svg class="bi bi-briefcase" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6h-1v6a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-6H0v6z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v2.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 6.884V4.5zM1.5 4a.5.5 0 0 0-.5.5v1.616l6.871 1.832a.5.5 0 0 0 .258 0L15 6.116V4.5a.5.5 0 0 0-.5-.5h-13zM5 2.5A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z">
                                </path>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-dark card_text">Student Role</h5>
                            <p class="texts">He or She can view student or teacher lists, view his or her academic
                                results and view university news.</p>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-2 text-bg-primary text-light rounded-4 d-flex align-items-center icon-card">
                            <svg class="bi bi-collection" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z">
                                </path>
                            </svg>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-dark card_text">Teacher Role</h5>
                            <p class="texts">He or She can view student or teacher lists, view students' academic
                                results and view university news.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <img src="{{ asset('dist/img/login/feature1.jpg') }}" class="img-fluid rounded-5" />
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <img src="{{ asset('dist/img/login/feature1.jpg') }}" class="rounded-5" />
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <img src="{{ asset('dist/img/login/feature1.jpg') }}" class="rounded-5" />
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <img src="{{ asset('dist/img/login/feature1.jpg') }}" class="rounded-5" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Section -->
    <!-- Start About Section -->
    <section id="about">
        <div class="container-fluid col-md-10 mx-auto">
            <div>
                <div>
                    <h2 class="font-style py-3 text-center mt-3">ABOUT MTU </h2>
                    <p class='texts py-3 text-center mb-3'>Mandalay Technological University (formerly, the Mandalay
                        Institute of Technology - MIT), in Patheingyi, Mandalay, is a senior prestigious engineering
                        university in Myanmar. The university offers undergraduate, and postgraduate programmes in
                        engineering disciplines to students and is one of the most selective universities in the
                        country.</p>
                </div>
                <div class="floating-images">
                    <img src="{{ asset('dist/img/login/Logo.png') }}" alt="Floating Image 1" />
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-md-6">
                    <div>
                        <h4 class="font-style text-center mt-3">Vision </h4>
                        <p class='texts py-3 mb-3'>It is envisaged that MTU will become a highly-prestigious
                            technological centre of excellence in engineering education, research and the application of
                            knowledge to benefit society globally and train students of high caliber to become
                            highly-qualified engineers, specialists with the ability to create knowledge and solve
                            complex real-world problems and researchers who can discover and innovate new things, all
                            for the good of society, mankind and environment.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <h4 class="font-style text-center mt-3">Mission</h4>
                        <p class='texts py-3 mb-3'>To educate and train students systematically to become engineers,
                            specialists and researchers who –
                            Commit to the innovative and ethical application of science and technology in addressing the
                            most pressing societal needs;
                            Have received twenty-first century leadership qualities, perspectives, and skills;
                            Can develop and disseminate transformational new knowledge and technologies that further the
                            well-being and sustainability of society;
                            Have the will and the ability to work for the good of the society, mankind and the
                            environment;
                            Are conscious of civic duties and professional ethics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <!-- Start Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <h2 class=" text-center mt-3">GET IN TOUCH</h2>
                    <p class='texts py-3 text-center mb-3'>If you have any question, please feel free to contact us.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid col-md-10 mx-auto">
            <div class="row bg-white g-3  p-4">
                <div class="col-md-6 my-3">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5713.824256532253!2d96.185965!3d21.972412!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb6e538bf6418b%3A0x9c9718b6ec4e04f8!2sMandalay%20Technological%20University!5e1!3m2!1sen!2smm!4v1715085457722!5m2!1sen!2smm">
                        </iframe>
                    </div>
                </div>
                <div class="col-md-6 mt-3 g-3  p-4">
                    <h4 class="p-3">Contact Info</h4>
                    <p class="text-secondary"><i class="fas fa-home px-2"></i>Mandalay Technological University</p>
                    <p class="text-secondary"><i class="fas fa-map-marker-alt px-2"></i>Patheingyi Township, Mandalay,
                        Myanmar</p>
                    <p class="text-secondary"><i class="fas fa-phone px-2"></i>Phone : +95-9-2001498</p>
                    <p class="text-secondary"><i class="fas fa-envelope px-2"></i>Email : mturector@mtu.edu.mm</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
    <!-- Start Footer Section -->
    <section id="footer" class="bg-light mt-3">
        <div class="container-fluid col-md-10 p-3 mt-3 text-center">
            <i class="fab fa-facebook px-2"></i>
            <i class="fab fa-facebook-messenger px-2"></i>
            <i class="fab fa-instagram px-2"></i>
            <i class="fab fa-pinterest px-2"></i>
            <i class="fab fa-twitter px-2"></i>
            <p class="text-center py-3 texts">
                Copyright © 2024 All rights reserved | This template is made by HTZA, VI.BE.CEIT-1 on May 2024.
            </p>
        </div>
    </section>
</div>
@endsection
