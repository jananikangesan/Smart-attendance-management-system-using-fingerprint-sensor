@extends('layouts.admin')
@section('pagetitle', 'Attandance/level3/3S')
@section('content')
<div class="container-fluid"> 
    <div class="row bg-white has-shadow pt-3">
        {{--<div class="col-lg-12">
            <section class="landing">
                <hr />
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#weeklyModal">
                            3S Weekly Report
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="weeklyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Weekly Report</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/weeklyreport') }}" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="fromdate">From:</label>
                                                    <input type="date" class="form-control" name="fromdate"
                                                        id="fromdate" placeholder="From">
                                                </div>
                                                <div class="col">
                                                    <label for="todate">To:</label>
                                                    <input type="date" class="form-control" name="todate" id="todate"
                                                        placeholder="To">
                                                </div>
                                            </div>
                                            <div class="form-row justify-content-end p-3">
                                                <button class="btn btn-info" type="submit">Get Report</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <a class="btn btn-info" href="{{url('/report3s')}}" role="button">3S final report</a>
                    </div>
                </div>
                <hr />
            </section>
        </div>--}}

        <div class="col-lg-12">
            <div class="row card-deck">
            @if(isset($s3_courses))
            @foreach($s3_courses as $s3_course)
            <div class="col-lg-2 col-md-4 col-4">
                <div class="card text-white bg-dark" style="border-radius: 5%;">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/attendance') }}">
                        @csrf
                            <div class="form-group row">
                                <input id="s3_course" type="text" class="d-none form-control" name="s3_course" value="{{ $s3_course->course_code }}" required autocomplete="s3_course">
                                    <button type="submit" class="btn btn-dark btn-sm btn-block text-center buttonfont">
                                    {{$s3_course->course_code}}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            </div>
        </div>

        <div class="col-lg-12">
            @yield('levelcontent')
        </div>
    </div>
</div>    

@endsection