@extends('lecturer_dashboard.lecturer')
@section('lecturercontent')
    <!--SECTION START-->
    <div class="udb">
        <div class="udb-sec udb-time">
            <h4><img src="images/icon/db5.png" alt="" /> COURSES </h4>
            {{--<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                to using 'Content here, content here', making it look like readable English.</p>--}}
            <div class="tour_head1 udb-time-line days">
                <ul>
                    <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <div class="sdb-cl-tim">
                            <div class="sdb-cl-day">
                                <h5>3S</h5>
                            </div>
                            <div class="sdb-cl-class">
                                @if(isset($courses))
                                <ul>
                                    @foreach ($courses as $course)

                                    <li>
                                        <div class="sdb-cl-class-tim tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Corse Code">
                                            <span>{{ $course -> course_code}}</span>
                                        </div>
                                        <div class="sdb-cl-class-name tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Course Name">
                                            <h5>{{ $course -> course_name}}
                                            <span>
                                                <form action="{{ url('/see') }}">
                                                    <input type="hidden" name="course" value="{{ $course -> course_code}}">
                                                    <input style="background-color: coral; color:white;" type="submit" value="get attendance">
                                                </form>
                                            
                                            </span></h5>
                                            {{--<span class="sdn-hall-na">Apj Hall 112</span>--}}
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                                @else
                                <ul>
                                    <li>
                                        <div class="sdb-cl-class-tim tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Message">
                                            <span>you haven't take a lectere in this semester for 1S</span>
                                        </div>
                                    </li>
                                </ul>

                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <div class="sdb-cl-tim">
                            <div class="sdb-cl-day">
                                <h5>3M</h5>
                            </div>
                            <div class="sdb-cl-class">
                                @if(isset($courses))
                                <ul>
                                    @foreach ($courses as $course)

                                    <li>
                                        <div class="sdb-cl-class-tim tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Corse Code">
                                            <span>{{ $course -> course_code}}</span>
                                        </div>
                                        <div class="sdb-cl-class-name tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Course Name">
                                            <h5>{{ $course -> course_name}}
                                            <span>
                                                <form action="{{ url('/see') }}">
                                                    <input type="hidden" name="course" value="{{ $course -> course_code}}">
                                                    <input style="background-color: coral; color:white;" type="submit" value="get attendance">
                                                </form>
                                            
                                            </span></h5>
                                            {{--<span class="sdn-hall-na">Apj Hall 112</span>--}}
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                                @else
                                <ul>
                                    <li>
                                        <div class="sdb-cl-class-tim tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Message">
                                            <span>you haven't take a lectere in this semester for 1S</span>
                                        </div>
                                    </li>
                                </ul>

                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <div class="sdb-cl-tim">
                            <div class="sdb-cl-day">
                                <h5>3G</h5>
                            </div>
                            <div class="sdb-cl-class">
                                @if(isset($courses))
                                <ul>
                                    @foreach ($courses as $course)

                                    <li>
                                        <div class="sdb-cl-class-tim tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Corse Code">
                                            <span>{{ $course -> course_code}}</span>
                                        </div>
                                        <div class="sdb-cl-class-name tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Course Name">
                                            <h5>{{ $course -> course_name}}
                                            <span>
                                                <form action="{{ url('/see') }}">
                                                    <input type="hidden" name="course" value="{{ $course -> course_code}}">
                                                    <input style="background-color: coral; color:white;" type="submit" value="get attendance">
                                                </form>
                                            
                                            </span></h5>
                                            {{--<span class="sdn-hall-na">Apj Hall 112</span>--}}
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                                @else
                                <ul>
                                    <li>
                                        <div class="sdb-cl-class-tim tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Message">
                                            <span>you haven't take a lectere in this semester for 1S</span>
                                        </div>
                                    </li>
                                </ul>

                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--SECTION END-->
@endsection