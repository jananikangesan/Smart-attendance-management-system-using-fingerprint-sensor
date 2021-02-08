@extends('layouts.admin')
@section('pagetitle','semester')
@section('content')
<link href="{{ asset('css/semester.css') }}" rel="stylesheet">
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="item d-flex align-items-center">
                <div class="con">
                    <div class="cardz">
                        <div class="face face1">
                            <div class="content">
                                <div class="icon">
                                    <i class="fa">{{ $semester }}</i>
                                </div>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="content align-items-center">
                                <div class="content">
                                    <form action="{{ url('/seme-update') }}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="semester" class="col-lg-12 col-form-label text-center">
                                                <h1>{{ __('SEMESTER') }}</h1>
                                                <hr />
                                            </label>
                                            <div class="col-lg-12">
                                                <select id="semester"
                                                    class="form-control @error('semester') is-invalid @enderror"
                                                    name="semester">
                                                    <option>Select Semester</option>
                                                    <option value="1"
                                                        {{ ($semester == 1 )? 'selected':'' }}>
                                                        Semester 1</option>
                                                    <option value="2"
                                                        {{ ($semester == 2 )? 'selected':'' }}>
                                                        semester 2</option>
                                                </select>
                                                @error('semester')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="content">
                                            <button type="submit" class="btn btn-info btn-lg">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
