@extends('lecturer_dashboard.lecturer')
@section('lecturercontent')
<div class="udb">

<div class="udb-sec udb-prof">
    <h4><img src="{{ asset('image/prof2.png')}}" alt="" /> My Profile</h4>
    <div class="sdb-tabl-com sdb-pro-table">
        @if(isset($lecturer))
        <table class="responsive-table bordered">
            <tbody>
            
                @foreach ($lecturer as $lect)
                <tr>
                    <td>Lecturer Name</td>
                    <td>:</td>
                    <td>{{ $lect -> lect_title }}{{ $lect -> lect_name }}</td>
                </tr>
                <tr>
                    <td>Eamil</td>
                    <td>:</td>
                    <td>{{ $lect -> lect_email }}</td>
                </tr>
                {{--<tr>
                    <td>Position</td>
                    <td>:</td>
                    <td>{{ $lect -> position }}</td>
                </tr>
                <tr>
                    <td>Date of birth</td>
                    <td>:</td>
                    <td>03 Jun 1990</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>8800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A.</td>
                </tr>--}}
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><span class="db-done">Active</span> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="sdb-bot-edit">
        {{--<a href="{{ route('edit-profile') }}" class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit my profile</a>
            <a href="{{ route('edit-profile') }}" class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit" onclick="event.preventDefault(); document.getElementById('edit-form').submit();">
                <i class="fa fa-pencil" aria-hidden="true"></i> Edit my profile--}}
                <form id="edit-form" action="{{ route('edit-profile') }}" method="POST" class="d-none">
                @csrf
                    <input type="hidden" name="lect_id" id="lect_id" value="{{ $lect -> lect_id }}">

                    <button class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit my profile</a></button>
                </form>
            </a>
        </div>
        @endif

        @if(isset($editlecturer))
        @foreach ($editlecturer as $lect1)
        <form action="{{ route('update-profile', ['id' => $lect1->lect_id]) }}" method="POST">
        @csrf
            <table class="responsive-table bordered">
                <tbody>
                {{--<tr>
                        <td>Title</td>
                        <td>:</td>
                        <td style="text-align: center; padding: 0px;">
                            <select id="lect_title" name="lect_title" style="font-size:15px; margin: 0px; color:#000080">
                                <option value="Mr." {{($lect1 -> lect_title == "Mr.")? 'selected':''}}>Mr</option>
                                <option value="Mrs." {{($$lect1 -> lect_title == "Mrs.")? 'selected':''}}>Mrs</option>
                                <option value="Miss." {{($$lect1 -> lect_title == "Miss.")? 'selected':''}}>Miss</option>
                                <option value="Dr." {{($$lect1 -> lect_title == "Dr.")? 'selected':''}}>Dr</option>
                                <option value="Prof." {{($$lect1 -> lect_title == "Prof.")? 'selected':''}}>Prof</option>
                                <option value="Rev." {{($$lect1 -> lect_title == "Rev.")? 'selected':''}}>Rev</option>
                            </select>
                            <input type="text" name="lect_title" id="lect_title" value="{{ $lect1 -> lect_title }}" style="border: none; font-size:15px; margin: 0px; color:#000080">
                        </td>
                    </tr>--}}
                    <tr>
                        <td>Lecturer Name</td>
                        <td>:</td>
                        <td style="text-align: center; padding: 0px;">
                            <input type="text" name="lect_name" id="lect_name" value="{{ $lect1 -> lect_name }}" style="border: none; font-size:15px; margin: 0px; color:#000080">
                        </td>
                    </tr>
                    <tr>
                        <td>Eamil</td>
                        <td>:</td>
                        <td style="text-align: center; padding: 0px;">
                            <input type="text" name="lect_email" id="lect_email" value="{{ $lect1 -> lect_email }}" style="border: none; font-size:15px; margin: 0px; color:#000080">
                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach
            <div class="sdb-bot-edit">
                <button type="submit" class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i>
                    {{ __('update profile') }}
                </button>
        </div>
        </form>
        
        @endif
        
    </div>
</div>
</div>
@endsection