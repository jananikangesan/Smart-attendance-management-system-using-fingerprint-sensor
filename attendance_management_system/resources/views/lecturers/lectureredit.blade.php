
@extends('layouts.admin')
@section('pagetitle','Lecturer')
@section('content')

<style>
    .a{
        float: center;
        padding-top: 2px;
         padding-left: 30%;
         font-weight: bold;
         font-family: 'Times New Roman', Times, serif
         
      
    }
    .vl{
    border-left: 3px solid black;
    height: 310px;
    position: absolute ;
    left:43%;
    margin-left:-1px;
    top:-1;
    }
    .card-header{
        font-size:40px;
        background-color:lightgray;
        float: center;
        padding-left: 5%;
        font-family: 'Times New Roman', Times, serif
        
    }
    .card-body{
        padding-top: 30px;
    }
    .row-content{
        padding-top:40px; 
        float: center;
    }
    .card{
        border-color:rgb(203, 212, 229); 
        
    }
  
}

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('LECTURER UPDATE') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('lecturer_update', ['id' => $lecturer->lect_id]) }}">
                        @method('PATCH') 
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row d-lg-none">
                                    <div class="col text-center">
                                        <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-12 d-none d-lg-block text-center">
                                        <img src="{{url('/image/uojlogo.png')}}" alt="image" height="200px" width="200px">
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-lg-12 d-none d-lg-block">
                                        <h1 class="text-center display-3">UOJ</h1>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-lg-12 d-none d-lg-block">
                                        <h4 class="text-center h4font">JAFFNA</h4>
                                    </div>                       
                                </div>
                            </div>
                            <div class="col-lg-1 d-none d-lg-block">
                                <hr class="vl">
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group row">
                                    <label for="lect_title" class="col-lg-4 col-form-label text-lg-right">{{ __('Title') }}</label>
                                    <div class="col-lg-6">
                                        <select id="lect_title" class="form-control @error('lect_title') is-invalid @enderror" name="lect_title">
                                            <option value="Mr." {{($lecturer->lect_title == "Mr.")? 'selected':''}}>Mr</option>
                                            <option value="Mrs." {{($lecturer->lect_title == "Mrs.")? 'selected':''}}>Mrs</option>
                                            <option value="Miss." {{($lecturer->lect_title == "Miss.")? 'selected':''}}>Miss</option>
                                            <option value="Dr." {{($lecturer->lect_title == "Dr.")? 'selected':''}}>Dr</option>
                                            <option value="Prof." {{($lecturer->lect_title == "Prof.")? 'selected':''}}>Prof</option>
                                            <option value="Rev." {{($lecturer->lect_title == "Rev.")? 'selected':''}}>Rev</option>
                                        </select>
                                        @error('lect_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="lect_name" class="col-lg-4 col-form-label text-lg-right">{{ __('lecturer Name') }}</label>
                                    <div class="col-lg-6">
                                        <input id="lect_name" type="text" class="form-control @error('lect_name') is-invalid @enderror" name="lect_name" value="{{ $lecturer->lect_name }}" required autocomplete="lect_name">
                                        @error('lect_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lect_email" class="col-lg-4 col-form-label text-lg-right">{{ __('Email Address') }}</label>
                                    <div class="col-lg-6">
                                        <input id="lect_email" type="text" class="form-control @error('lect_email') is-invalid @enderror" name="lect_email" value="{{ $lecturer->lect_email }}" required autocomplete="lect_email">
                                        @error('lect_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="position[]" class="col-lg-4 col-form-label text-lg-right">{{ __('Position') }}</label>
                                    <div class="col-lg-6">
                                        @php
                                            $positions = explode("," , ($lecturer ->position))
                                        @endphp
                                        <select id="position" class="form-control @error('position') is-invalid @enderror" name="position[]" multiple="multiple">
                                            <option value="HOD" 
                                                @if(in_array('HOD', $positions))
                                                    selected="selected"
                                                @endif
                                            > {{ __('HOD') }}</option>
                                            <option value="lecturer"
                                                @if(in_array('lecturer', $positions))
                                                    selected="selected"
                                                @endif
                                            > {{ __('lecturer') }} </option>
                                            <option value="assistentlecturer"
                                                @if(in_array('assistentlecturer', $positions))
                                                    selected="selected"
                                                @endif
                                            > {{ __('assistentlecturer') }} </option>
                                        </select>
                                        @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-lg-7 offset-lg-4">
                                        <a class="btn btn-info btn-close" href="{{ route('lecturer_view') }}">Cancel</a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
