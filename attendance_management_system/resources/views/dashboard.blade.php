@extends('layouts.admin')
@section('pagetitle','dashboard')
@section('content')
        <!-- Dashboard Counts Section-->
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
                <div class="row bg-white has-shadow">
                    <!-- Item -->
                    <div class="col-xl-4 col-lg-4 col-sm-12">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-violet"><i class="fa fa-user"></i></div>
                            <div class="title"><span>Student</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                </div>
                            </div>
                            <div class="number"><strong>{{ $students_count }}</strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-4 col-lg-4 col-sm-12">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-red"><i class="fa fa-user-o"></i></div>
                            <div class="title"><span>Lecturers</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                </div>
                            </div>
                            <div class="number"><strong>{{ $lecturers_count }}</strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-4 col-lg-4 col-sm-12">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-green"><i class="fa fa-book"></i></div>
                            <div class="title"><span>Courses</span>
                                <div class="progress">
                                    <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40"
                                        aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                                </div>
                            </div>
                            <div class="number"><strong>{{ $courses_count }}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Dashboard Header Section    -->
        <section class="dashboard-header d-none">
            <div class="container-fluid">
                <div class="row">
                    <!-- Statistics -->
                    <div class="statistics col-lg-3 col-12">
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                            <div class="text"><strong>234</strong><br><small>Applications</small></div>
                        </div>
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                            <div class="text"><strong>152</strong><br><small>Interviews</small></div>
                        </div>
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                            <div class="text"><strong>147</strong><br><small>Forwards</small></div>
                        </div>
                    </div>
                    <!-- Line Chart            -->
                    <div class="chart col-lg-6 col-12">
                        <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                            <canvas id="lineCahrt"></canvas>
                        </div>
                    </div>
                    <div class="chart col-lg-3 col-12">
                        <!-- Bar Chart   -->
                        <div class="bar-chart has-shadow bg-white">
                            <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server
                                    Uptime</small></div>
                            <canvas id="barChartHome"></canvas>
                        </div>
                        <!-- Numbers-->
                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                            <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                            <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tables">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard1"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">1S</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($onescourses as $onescourse)
                                                <tr>
                                                    {{-- <td>{{ $onescourse->course_id }}</td>--}}
                                                    <td>{{ $onescourse->course_code }}</td>
                                                    <td>{{ $onescourse->course_name }}</td>
                                                    <td>{{ $onescourse->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard2"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">1G</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($onegcourses as $onegcourse)
                                                <tr>
                                                    {{-- <td>{{ $onegcourse->course_id }}</td>--}}
                                                    <td>{{ $onegcourse->course_code }}</td>
                                                    <td>{{ $onegcourse->course_name }}</td>
                                                    <td>{{ $onegcourse->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard3"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">2S</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($twoscourses as $twoscourse)
                                                <tr>
                                                    {{-- <td>{{ $twoscourse->course_id }}</td>--}}
                                                    <td>{{ $twoscourse->course_code }}</td>
                                                    <td>{{ $twoscourse->course_name }}</td>
                                                    <td>{{ $twoscourse->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard4"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">2G</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($twogcourses as $twogcourse)
                                                <tr>
                                                    {{-- <td>{{ $twogcourse->course_id }}</td>--}}
                                                    <td>{{ $twogcourse->course_code }}</td>
                                                    <td>{{ $twogcourse->course_name }}</td>
                                                    <td>{{ $twogcourse->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard3"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">3S</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($threescourses as $threescourse)
                                                <tr>
                                                    {{-- <td>{{ $threescourse->course_id }}</td>--}}
                                                    <td>{{ $threescourse->course_code }}</td>
                                                    <td>{{ $threescourse->course_name }}</td>
                                                    <td>{{ $threescourse->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard3"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">3M</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($threemcourses as $threemcourse)
                                                <tr>
                                                    {{-- <td>{{ $threemcourse->course_id }}</td>--}}
                                                    <td>{{ $threemcourse->course_code }}</td>
                                                    <td>{{ $threemcourse->course_name }}</td>
                                                    <td>{{ $threemcourse->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard3"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">3G</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($threegcourses as $threegcourse)
                                                <tr>
                                                    {{-- <td>{{ $threegcourse->course_id }}</td>--}}
                                                    <td>{{ $threegcourse->course_code }}</td>
                                                    <td>{{ $threegcourse->course_name }}</td>
                                                    <td>{{ $threegcourse->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard3"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">4S</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fourscourses  as $fourscourse)
                                                <tr>
                                                    {{-- <td>{{ $threegcourse->course_id }}</td>--}}
                                                    <td>{{ $fourscourse ->course_code }}</td>
                                                    <td>{{ $fourscourse ->course_name }}</td>
                                                    <td>{{ $fourscourse ->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-close">
                                <div class="dropdown">
                                    <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="dropdown-toggle"><i
                                            class="fa fa-ellipsis-v"></i></button>
                                    <div aria-labelledby="closeCard3"
                                        class="dropdown-menu dropdown-menu-right has-shadow"><a href="#"
                                            class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a
                                            href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">4M</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                {{-- <th>Course ID</th> --}}
                                                <th>Course Code</th>
                                                <th>Course Name</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fourmcourses  as $fourmcourse )
                                                <tr>
                                                    {{-- <td>{{ $threegcourse->course_id }}</td>--}}
                                                    <td>{{ $fourmcourse ->course_code }}</td>
                                                    <td>{{ $fourmcourse ->course_name }}</td>
                                                    <td>{{ $fourmcourse ->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
