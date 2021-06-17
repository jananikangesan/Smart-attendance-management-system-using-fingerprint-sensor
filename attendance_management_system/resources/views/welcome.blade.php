@extends('layouts.app')
@section('content')
        <!-- SLIDER -->
        <section>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item slider1 active">
                    <img src="{{ asset('image/slider/4.jpg') }}" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Welcome to <span>University</span></h2>
                        <p>To be a leading centre of excellence in teaching, learning, research and scholarship</p>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('image/slider/2.jpg') }}" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Smart <span>Attendance</span></h2>
                        <p>Smart attendance management system deals with the maintenance of the student's attendance
                            details. It generates the attendance of the student on basis of presence in class</p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-chevron-left slider-arr-l"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-chevron-right slider-arr-r"></i>
            </a>
        </div>
    </section>

    <section class="wed-rights">
        <div class="container">
            <div class="row" style="height:25px">
            </div>
        </div>
    </section>

    <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
                            <h2>About <span> System</span></h2>
                            <p>Smart attendance management system that is mark attendance of students by using finger print sensor and keeps the information such as attendance of students’ level wise with course wise, students’ details, lecturers’ details and course details.</p>
                        </div>
                    </div>
                    <div class="ed-about-sec1">
                        <div class="ed-advan">
                            <ul>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/1.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>FingerPrint</h4>
                                        <p>Fingerprint attendance System aims to efficient the attendance taking procedure of an Universities using biometric technology.
                                           The finger print attendance taking procedure is extremely efficient compared to the traditional sign sheet procedures.
                                           It reduse the fault signature</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/2.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>System</h4>
                                        <p>Smart attendance System is a desktop-based application. It developed to obtain the attendance of student and stone and maintain the attendances</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-ad-img">
                                        <img src="images/adv/3.png" alt="">
                                    </div>
                                    <div class="ed-ad-dec">
                                        <h4>Departments</h4>
                                        <p>Each departments have each attendance system. Department administrator maintain the system.</p>
                                        <a href="#">Read more</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ed-about-sec1">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

@endsection