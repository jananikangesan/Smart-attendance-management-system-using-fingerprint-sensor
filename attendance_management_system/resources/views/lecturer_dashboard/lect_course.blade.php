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
                            @foreach($levels as $level)
                            <div class="sdb-cl-day">
                            <h5>{{$level->course_level}} </h5>
                            </div>
                            <div class="sdb-cl-class">
                                
                                <ul>

                                   @php
                                    $i=0;   
                                   @endphp
                                    @foreach ($courses as $course)
                                      @if($course->course_level ==$level->course_level)
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
                                    @php
                                    $i=$i+1;   
                                   @endphp
                                    @endif
                                    @endforeach

                                   
                                <ul>
                                    <li>
                                        <div class="sdb-cl-class-tim tooltipped" data-position="top" data-delay="50"
                                            data-tooltip="Message">
                                            @php
                                            if($i==0) {
                                                echo "<span> you haven't take a lectere in this semester for {$level->course_level}</span>";  
                                            } 
                                           @endphp
                                          
                                        </div>
                                    </li>
                                </ul>  
                                </ul> 
                            </div>
                            @endforeach
                        </div>
                    </li>
                    
             
                </ul>
            </div>
        </div>
    </div>
    <!--SECTION END-->
@endsection